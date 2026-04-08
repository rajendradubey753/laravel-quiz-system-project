<html>
    <head>
        <title>Admin Categories page</title>
        @vite('resources/css/app.css')
    </head>

    <body>
        
        <!-- Add your admin dashboard content here -->
        <x-navbar name="{{ $name }}"> </x-navbar>
        
           
        
            
        <div class="flex items-center   pt-5 bg-gray-100 flex-col min-h-screen" >

        
             <!-- <div  class= "bg-white p-8 rounded shadow-md w-96" >
               
                     
            </div> -->
                  <div class="w-3/4 mt-10">

    <!-- Header (ONLY ONCE) -->
     <h1 class="  text-2xl font-bold mb-4 ">

                <span class="  text-blue-500 ">Quiz Name: {{ $quizName }} <a  class="text-red-500 text-sm"  href="/add-quiz">Back</a> </span>
     </h1>
    <div class=" grid grid-cols-2 gap-25  bg-gray-300 p-2 font-bold rounded">
        
        <div>MCQ ID</div>
        <div class="text-left">Question</div>
       
    </div>

    <!-- Data -->
    @foreach ($mcqs as $mcq)
        <div class=" grid grid-cols-2  gap-25 bg-white p-2 mt-2 rounded shadow items-center">
            <div > {{ $mcq->id }}</div>
            <div>{{ $mcq->Question}}</div>
            
        </div>
    @endforeach

</div>

           
             
    
    
        </div>

    </body>
</html>