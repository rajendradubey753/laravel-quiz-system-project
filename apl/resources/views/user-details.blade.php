<html>
    <head>
        <title>user Details Page</title>
        @vite('resources/css/app.css')
    </head>

    <body>
        
        <!-- Add your welcome page content here -->
         <x-user-navbar></x-user-navbar>
         <div class=" flex  items-center  bg-gray-100 flex-col min-h-screen" >
            <h1 class="text-4xl font-bold mb-4 text-green-700 pt-5">Attempted Quiz</h1>
         
            
            <div class ="relative">
           

         </div>

         <div class="w-3/4 mt-10">

    <!-- Header (ONLY ONCE) -->
    

                
     
    <div class=" grid grid-cols-4 gap-4 bg-gray-300 p-3 font-bold rounded text-center items-center">
        
        <div>S. No</div>
        <div>Name</div>
         
          <div>status</div>
       
        
    </div>

    <!-- Data -->
     
    @foreach ($quizRecord as $key=>$record)
        <div class="grid grid-cols-4  gap-4 bg-white p-3 mt-2 rounded shadow text-center item-center">
            <div>{{ $key + 1 }}</div>
            
            <div class="whitespace-nowrap ">{{ $record->name }}</div>
            <div >{{ $record->status }}</div>
             @if($record->status==2)
                        <span class="text-green-500">Completed</span>
                        @else
                        <span class="text-orange-500">Not Completed</span>

                        @endif
           

            

      </div>

        
    @endforeach

</div>
         </div>

       <x-footer-user></x-footer-user>
    </body>
</html> 

