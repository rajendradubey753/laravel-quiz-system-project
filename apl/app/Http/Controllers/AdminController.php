<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Quiz;
use App\Models\Mcq;
use App\Models\User;

class AdminController extends Controller
{
    

    function login (Request $request){
        
        $validation = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

       $admin = admin::where([
        ['name', "=", $request->name],
        ['password', "=", $request->password],

        ])->first();

        if(!$admin){

         $validation = $request->validate([
            "user"=>"required",
        ],[
            "user.required"=>"user does not exist"
        ]);

     }
        Session::put('admin', $admin);
       return redirect('dashboard');

    


        //  return view('admin',["name"=>$admin->name]); 
    }

    function dashboard(Request $request){
        $admin = Session::get('admin');
        if($admin){
            $users= User::orderBy('id','desc')->paginate(10);
             return view('admin',["name"=>$admin->name,'users'=>$users]);

           
        }
        else{
            return redirect('admin-login');
        }
       
    }
    function categories(){
        

       $categories = Category::get();
        $admin = Session::get('admin');
        if($admin){
            return view ('categories',["name"=>$admin->name, "categories"=>$categories]);
        }
        else{
            return redirect('admin-login');
        }
       
    }
    function logout(Request $request){
        Session::forget('admin');
        return redirect('admin-login');
    }

    function addCategory(Request $request){
        $validation = $request->validate([
            'category' => "required | min:2 | max:20 | unique:categories,name"
        ]);
         $admin = Session::get('admin');
         $category = new Category();
            $category->name = $request->category;
           $category->creator= $admin->name;
           
            if($category->save()){
             Session::flash('category', "Success:category  " .$request->category ."  added successfully");

            }


        return redirect('admin-categories');
       
    }
    function deleteCategory($id){
        $category = Category::find($id);
        if($category){
            $category->delete();
            Session::flash('category', "Success:category  " .$category->name ."  deleted successfully");
        }
        return redirect('admin-categories');
    }
    function addQuiz(){
        // return Session::get('quizDetails');
        $admin = Session::get('admin');
        $categories= Category::get();
        $totalmcqs =0;
        if($admin){
            $quizName =request('quiz');

            $category_id =request('category_id');
            if($quizName && $category_id && !Session::has('quizDetails')){
                $quiz = new Quiz();
                $quiz->name = $quizName;
                $quiz->category_id = $category_id;
                if($quiz->save()){
                    Session::put('quizDetails', $quiz);
                }
                  

                 
            
            }else{
                $quiz = Session::get('quizDetails');
                $totalmcqs = $quiz&& Mcq::where('quiz_id', $quiz->id)->count();

            }
             
            return view ('add-quiz',["name"=>$admin->name, "categories"=>$categories, "totalmcqs"=>$totalmcqs   ]);
              
        }else{
            return redirect('admin-login');
         }
       
    }
    function addMcq(Request $request){
        $request ->validate([
            "question" => "required | min:5 | max:500",
            "option_1" => "required",
            "option_2" => "required",
            "option_3" => "required",
            "option_4" => "required",
            "correct_ans" => "required",
        ]);
        $mcq = new Mcq();
        $quiz = Session::get('quizDetails');
        $admin = Session::get('admin');
        $mcq->question = $request->question;
        $mcq->option_1 = $request->option_1;
        $mcq->option_2 = $request->option_2;
        $mcq->option_3 = $request->option_3;
        $mcq->option_4 = $request->option_4;

        $mcq->correct_ans= $request->correct_ans;
        $mcq->admin_id = $admin->id;

        $mcq->quiz_id = $quiz->id;
        $mcq->category_id = $quiz->category_id;
        if($mcq->save()){
            if($request->submit=="add-more"){
                
                return redirect(url()->previous());
            }
               else{
                Session::forget('quizDetails');
                
                return redirect("/admin-categories");
            }
             

  
        }


    }
    function endQuiz(){
      Session::forget('quizDetails');
        return redirect("/admin-categories");
  




     }

     function showQuiz($id, $quizName){
        // $quiz = Session::get('quizDetails');
        $admin = Session::get('admin');
        //  $mcqs = Mcq::where('quiz_id', $id)->get();
        if(!$admin){
            return redirect("/admin-login");
        }

              $mcqs = Mcq::where('quiz_id', $id)->get();

            //   dd($mcqs);
            
            return view('show-quiz', ["name"=>$admin->name, "mcqs"=>$mcqs, "quizName"=>$quizName]);
        }
            
     function quizList($id, $category){
        $admin = Session::get('admin');
    
        if($admin){

             $quizdata = Quiz::where('category_id', $id)->get();
            
            return view('quiz-list', ["name"=>$admin->name, "quizdata"=>$quizdata, "category"=>$category]);
        }
        else{
            return redirect("/admin-login");
        }
     }




}