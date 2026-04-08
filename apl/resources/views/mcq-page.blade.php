<!DOCTYPE html>
<html>
    <head>
        <title>MCQ Categories page</title>
        @vite('resources/css/app.css')
    </head>

    <body class="flex flex-col min-h-screen">
        
        <!-- Add your admin dashboard content here -->
        <x-user-navbar > </x-user-navbar>
        
           
        
            
        <div class=" flex-grow flex items-center   pt-5 bg-gray-100 flex-col min-h-screen" >

        
             <!-- <div  class= "bg-white p-8 rounded shadow-md w-96" >
               
                     
            </div> -->
                  <div class="w-3/4 mt-10">

    <!-- Header (ONLY ONCE) -->
     <h1 class="  text-2xl font-bold mb-4  text-center justify -center ">

                <span class="  text-blue-500  "> {{$quizName}} </span>
     </h1>
     <h2 class="  text-2xl font-bold mb-4  text-center justify -center ">
        <!-- class="  text-2xl font-bold mb-4  text-center justify -center "> -->

                <span class="  text-blue-500  "> Question No. {{session('currentQuiz')['totalMcq']}} </span>
     </h2>
      <h2 class="  text-2xl font-bold mb-4  text-center justify -center ">
        <!-- class="  text-2xl font-bold mb-4  text-center justify -center "> -->

                <span class="  text-blue-500  ">  {{session('currentQuiz')['currentMcq']}} of {{session('currentQuiz')['totalMcq']}} </span>
     </h2>
     <div class="mt-2 p-4 bg-white shadow-2xl rounded-xl w-140">
        <!-- @if($mcqData) -->
        <h3 class=" text-green-700 font-bold text-xl mb-1">{{$mcqData->Question}}</h3>
        <form action="/submit-next/{{$mcqData->id}}" class="space-y-4" method = "post">
            @csrf
            <input type="hidden" name="id" value="{{$mcqData->id}}">

            <label for="option_1"class="flex border p-3 mt-2 rounded-2xl shadow-2xl hover:bg-blue-50 cursor-pointer">
                <input id="option_1" class ="form-radio text-amber-300 " type="radio" value="option1" name="option">
                <span class ="text-green-700 pl-2">     {{$mcqData->option_1}}</span>
            </label>
            <label for="option_2"class="flex border p-3 mt-2 rounded-2xl shadow-2xl hover:bg-blue-50 cursor-pointer">
                <input id="option_2" class ="form-radio text-amber-300 " type="radio"value="option2" name="option">
                <span class ="text-green-700 pl-2"> {{$mcqData->option_2}}</span>
            </label>
            <label for="option_3"class="flex border p-3 mt-2 rounded-2xl shadow-2xl hover:bg-blue-50 cursor-pointer">
                <input id="option_3" class ="form-radio text-amber-300 " type="radio"  value="option3"name="option">
                <span class ="text-green-700 pl-2"> {{$mcqData->option_3}}</span>
            </label>
            <label for="option_4"class="flex border p-3 mt-2 rounded-2xl shadow-2xl hover:bg-blue-50 cursor-pointer">
                <input id="option_4" class ="form-radio text-amber-300 " type="radio"value="option4"name="option">
                <span class ="text-green-700 pl-2"> {{$mcqData->option_4}}</span>
            </label>
           <button type="submit" class="w-full bg-indigo-500 rounded-2xl px-4 py-2 text-white hover:bg-indigo-500">Submit Answer and Next </button>
         

        </form>
        <!-- @else
        <h3 class="text-blue-700 font-bold text-xl mb-1">Quiz Finished!</h3>
        <a href="{{ route('result-page') }}" class="text-white bg-blue-500 px-4 py-2 rounded">View Results</a>
        @endif -->
     </div>
     
       
     
     
     
     

           
             
    
    
        </div>
        <div class=" w-full">
             <x-footer-user></x-footer-user>
        </div>
       

    </body>
</html>