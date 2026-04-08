<!DOCTYPE html>
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

                <span class="  text-blue-500 ">Category Name: {{ $category }} <a  class="text-red-500 text-sm"  href="/add-quiz">Back</a> </span>
     </h1>
    <div class=" grid grid-cols-3  bg-gray-300 p-2 font-bold rounded  ">
        
        <div>Quiz ID</div>
        <div class ="text-left ">Name</div>
        <div class="text-center">Action</div>
        
       
    </div>

    <!-- Data -->
    @foreach ($quizdata as $item)
        <div class=" grid grid-cols-3  gap-4 bg-white p-4 mt-2 rounded shadow">
            <div >{{ $item->id }}</div>
            <div >{{ $item->name }}</div>
            
            <div class="flex justify-center">
            <a href="/show-quiz/{{$item->id}}/{{$item->name}}" >  
                
            <div class= "  text-red-500 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px">
                    <path d="M607.5-372.5Q660-425 660-500t-52.5-127.5Q555-680 480-680t-127.5 52.5Q300-575 300-500t52.5 127.5Q405-320 480-320t127.5-52.5Zm-204-51Q372-455 372-500t31.5-76.5Q435-608 480-608t76.5 31.5Q588-545 588-500t-31.5 76.5Q525-392 480-392t-76.5-31.5ZM214-281.5Q94-363 40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200q-146 0-266-81.5ZM480-500Zm207.5 160.5Q782-399 832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280q113 0 207.5-59.5Z"/></svg>
        
                </svg>
            </div>
            
              </a>
              
        </div>
        </div>
    @endforeach

</div>

           
             
    
    
        </div>

    </body>
</html>