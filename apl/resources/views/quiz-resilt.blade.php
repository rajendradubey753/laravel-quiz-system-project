<html>
    <head>
        <title>Welcome Page</title>
        @vite('resources/css/app.css')
    </head>

    <body>
        
        <!-- Add your welcome page content here -->
         <x-user-navbar></x-user-navbar>
         <div class=" flex  items-center  bg-gray-100 flex-col min-h-screen" >
            <h1 class="text-4xl font-bold mb-4 text-green-700 pt-5">Quiz Result </h1>
            <div class="w-full max-w-md">
         </div>

         <div class="w-3/4 mt-10">

    <!-- Header (ONLY ONCE) -->
     <h1 class=" text-center my-2 text-2xl font-bold mb-4 ">

                <span class="  text-green-700 ">
                    {{$correctAnswers  }} out of {{count($resultData)}} Correct </span>
     </h1>
    <div class=" grid grid-cols-3 gap-10 bg-gray-300 p-3 font-bold rounded">
        
        <div>S. No</div>
        <div>Question</div>
         <div  >Result</div>
       
    </div>

    <!-- Data -->
     
    @foreach ($resultData as $key=>$item)
        <div class="grid grid-cols-3  gap-10 bg-white p-3 mt-2 rounded shadow items-center">
            <div>{{ $key + 1 }}</div>
           
            <div>{{ $item->question}}</div>

            @if($item->is_correct)
             <div class="text-green-500">Correct</div>
             @else
             <div class="text-red-500">Incorrect</div>
             @endif

            
        </div>

      

        
    @endforeach

</div>
         </div>

       <x-footer-user></x-footer-user>
    </body>
</html> 
