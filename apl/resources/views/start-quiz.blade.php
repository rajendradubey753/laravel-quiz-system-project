<!DOCTYPE html>
<html>
    <head>
        <title>{{str_replace('-',' ',$quizName)}}</title>
        @vite('resources/css/app.css')
    </head>

    <body>
        
        <!-- Add your admin dashboard content here -->
        <x-user-navbar > </x-user-navbar>
        
           
        
            
        <div class="flex items-center   pt-5 bg-gray-100 flex-col min-h-screen" >

        
             <!-- <div  class= "bg-white p-8 rounded shadow-md w-96" >
               
                     
            </div> -->
                  <div class="w-3/4 mt-10">

    <!-- Header (ONLY ONCE) -->
     <h1 class="  text-4xl font-bold mb-4  text-center justify -center ">

                <span class="  text-blue-500  "> {{str_replace('-',' ',$quizName)}}  </span>
     </h1>
     <h2 class="text-lg text-gray-800 mb-6 text-center justify -center">
        This Quiz contain {{$quizCount}} Question and No Limit to Attempts this Quiz.  </h2>

        <h1 class="text-xl font-bold text-center text-blue-800"> Good Luck!  </h1>
       
     
     @if(session('user'))
     <div>
             <p class=" text-green-500 font-bold">{{session('message-success')}}</p>
               </div>
                
     <div class="flex justify-center"> 
        <a type="submit" href="/mcq/{{session('firstMCQ')->id.'/'.$quizName}}" 
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 my-5 rounded md mx-auto text-center">
            Start Quiz
            
        </a>
         
        </div>
        @else
        
       
        <div class="flex justify-center">  
        <a type="submit" href="/user-signup-quiz" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-6    mx-auto">
            Signup for Start Quiz
        </a>
        </div>

        <div class="flex justify-center">
            <a type = "submit" href="/user-login" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-6    mx-auto">
                Login for Start Quiz
            </a>
        </div>
        @endif
     
     

           
             
    
    
        </div>

    </body>
</html>