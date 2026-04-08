<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Quiz;
use App\Models\Mcq;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\Record;
use App\Models\MCQ_Record;
use App\Mail\VerifyUser;
use Illuminate\Support\Facades\Crypt;
use App\Mail\UserForgotPassword;






class UserController extends Controller
{
    //
    function welcome(){
       $categories=Category::withCount('quizzes')->get  ();
        return view('welcome',[
            'categories'=>$categories
        ]);

    }
    function userQuizList($id, $category){
       

              $quizdata = Quiz:: withCount('Mcq')-> where('category_id', $id)->get();
            
            return view('user-quiz-list', [ "quizdata"=>$quizdata, "category"=>$category]);
        }

        function usersignup(Request $request){
            $validation = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6 |confirmed',
            ]);

            // Create a new user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            

             $link = Crypt::encryptString($user->email);
              $link = url('/verify-user/'.$link);
            Mail::to($user->email)->send(new VerifyUser($link));







            if ($user) {
                Session::put('user', $user);
                if (Session::has('quiz-url')) {
                    $quizUrl = Session::get('quiz-url');
                    Session::forget('quiz-url');
                    return redirect($url)->with('message-success',"User registered successfully, Please check email to verify account ");
                   }else{
                     return redirect('/')->with('message-success',"User registered successfully, Please check email to verify account ");
                      }
                    
                }
                

            
            
        }
        function startQuiz($id, $name){
           $quizCount= Mcq::where('quiz_id', $id)->count();
           $mcqs= Mcq::where('quiz_id', $id)->get();
            Session:: put ('firstMCQ',$mcqs[0]);
           
           

           $quizName= $name;

            
             return view('start-quiz',[
                'quizCount'=>$quizCount,
                'quizName'=>$quizName
             ]);
        }

        function userLogout(){
            Session::forget('user');
            return redirect('/');
        }

        function userSignupQuiz(){
            Session::put('quiz-url', url()->previous());
            return view('user-signup');
        }
        function userLogin(Request $request){
            $validation = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $user = User::where('email', $request->email)->first();

            if ($user && password_verify($request->password, $user->password)) {
                Session::put('user', $user);
                if (Session::has('quiz-url')) {
                    $quizUrl = Session::get('quiz-url');
                    Session::forget('quiz-url');
                    return redirect($quizUrl);
                }
                return redirect('/');
            } else {
                return back()->withErrors(['user' => 'Invalid email or password']);
            }
        }
        function userLoginQuiz(){
            Session::put('quiz-url', url()->previous());
            return view('user-login');
        }

        function mcq($id,$name){
            $record =new Record();
            $record->user_id=Session::get('user')->id;
            $record->quiz_id=Session::get('firstMCQ')->quiz_id;
            $record->status=1;
            if($record->save()){

            
            
            $currentQuiz=[];
            $currentQuiz['totalMcq']= MCQ::where('quiz_id',Session::get('firstMCQ')->quiz_id)->count();
            $currentQuiz['currentMcq']=1;
            $currentQuiz['quizName']=$name;
            $currentQuiz['quizId']=Session::get('firstMCQ')->quiz_id;
            $currentQuiz['recordId']=$record->id;
            Session::put('currentQuiz',$currentQuiz);
             $mcqData=MCQ::find($id);
            

            return view('mcq-page',['quizName'=>$name,'mcqData'=>$mcqData]);
            }else{
                return "Something went Wrong";
            }

        }
        function submitAndNext(Request $request ,$id){
            

            $currentQuiz=Session::get('currentQuiz');
            $currentQuiz['currentMcq']+=1;
            $mcqData=MCQ::where([
                ['id','>',$id],
                ['quiz_id','=',$currentQuiz['quizId']]
            ])->first();
             $isExist= MCQ_Record::where([
                    ['record_id','=',$currentQuiz['recordId']],
                     ['mcq_id','=',$request->id],
                     ])->count();
            
           

                 if($isExist<1){
            $mcq_record=new MCQ_Record;
            $mcq_record->record_id=$currentQuiz['recordId'];
            $mcq_record->user_id=Session::get('user')->id;
            $mcq_record->mcq_id=$request->id;
            $mcq_record->select_answer=$request->option;
           
               if( $request->option==MCQ::find($request->id)->correct_ans)
            
                
                {
                    $mcq_record->is_correct=1;



                }else{
                    $mcq_record->is_correct=0;
                }
                if(!$mcq_record->save()){
                    return "something went wrog";
                }
                 }


            Session::put('currentQuiz',$currentQuiz);
            if($mcqData){
                return view('mcq-page',['quizName'=>$currentQuiz['quizName'],'mcqData'=>$mcqData]);

            }
            else{
                $resultData=MCQ_record::withMCQ()->where('record_id',$currentQuiz['recordId'])->get();
                 $correctAnswers=MCQ_record::where([ ['record_id','=',$currentQuiz['recordId']],
                     ['is_correct','=',1],

                 ])->count();
                  $record = Record::find($currentQuiz['recordId']);
                   if($record){
                $record->status=2;
                  $record->update();
   }

                // return view('quiz-resilt',['resultData'=>$resultData]);
                return view('quiz-resilt',['resultData'=>$resultData,'correctAnswers'=>$correctAnswers]);
            }
            
            


        }
        function userDetails(){
            $quizRecord = Record::WithQuiz()->where('user_id',Session::get('user')->id)->get();
             return view('user-details',['quizRecord'=>$quizRecord]);
             }

             function serchQuiz(Request $request){
                  $quizData = Quiz::withCount('Mcq')->where('name','Like','%'.$request->search.'%')->get();
             return view('quiz-serch',['quizdata'=>$quizData,'quiz'=>$request->search]);
              }


               function verifyUser($email){
             echo $orgEmail = Crypt::decryptString($email);
             $user= User::where('email',$orgEmail)->first();
               if($user){
                 $user->active=2;

             if($user->save())
                  {
               return redirect('/')->with('message-success',"User verified successfully");

                   }
                  }

                 }
                 function userForgotPassword(Request $request){

                 $link = Crypt::encryptString($request->email);
                $link = url('/user-forgot-password/'.$link);
                   Mail::to($request->email)->send(new UserForgotPassword($link));
                      return redirect('/')->with('message-success',"Please check email to set new password");
                      }


                      function userResetForgotPassword($email){
                     $orgEmail = Crypt::decryptString($email);
                    return view('user-set-forgot-password',['email'=>$orgEmail]);
                    }

                    function userSetForgotPassword(Request $request){

               $validate = $request->validate([
                      'email'=>'required | email |',
                      'password'=>'required | min:3 | confirmed',
                      ]);

                      $user= User::where('email',$request->email)->first();
                       if($user){
                      $user->password=Hash::make($request->password);
                            if( $user->save()){
                             return redirect('user-login')->with('message-success',"New password is set, Please login with new Password");
                          }
                                  } 

                                  }



        
     
}
