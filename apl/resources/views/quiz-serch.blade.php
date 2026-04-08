<!DOCTYPE html>
<html>
    <head>
        <title>Admin Categories page</title>
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
     <h1 class="  text-2xl font-bold mb-4  text-center justify -center ">

                <span class="  text-blue-500  ">Search : {{ $quiz }}  </span>
     </h1>
    <div class=" grid grid-cols-4  bg-gray-300 p-2 font-bold rounded  ">
        
        <div>Quiz ID</div>
        <div class ="text-left ">Name</div>
        <div class="text-center">Mcq Count</div>
        <div class="text-center">Action</div>
        
        
       
    </div>

    <!-- Data -->
    @foreach ($quizdata as $item)
        <div class=" grid grid-cols-4  gap-4 bg-white p-4 mt-2 rounded shadow">
            <div >{{ $item->id }}</div>
            <div >{{ $item->name }}</div>
            <div class="text-center" >{{$item->mcq_count}}</div>
            
            
            <div class ="text-center" >
                
                    <a href="/start-quiz/{{ $item->id }}/{{ $item->name }}"
                    class="text-red-500 font-bold "   > 
                        Attempt Quiz
                        </a>

              
        </div>
        </div>
    @endforeach

</div>

           
             
    
    
        </div>

    </body>
</html>