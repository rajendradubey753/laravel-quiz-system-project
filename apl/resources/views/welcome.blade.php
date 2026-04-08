<html>
    <head>
        <title> Quiz System Welcome Page</title>
        @vite('resources/css/app.css')
    </head>

    <body>
        
        <!-- Add your welcome page content here -->
         <x-user-navbar></x-user-navbar>
         <div class=" flex  items-center  bg-gray-100 flex-col min-h-screen" >
             @if(session('message-success'))
              <div>
             <p class=" text-green-500 font-bold">{{session('message-success')}}</p>
               </div>
                @endif
            <h1 class="text-4xl font-bold mb-4 text-green-700 pt-5">Check Your Skills</h1>
            <div class="w-full max-w-md">

            <!-- <from action ="serch-quiz" method="get"> -->
            <div class ="relative">
            <form action ="serch-quiz" method="get">
                
           <input class="w-full px-4 py-3 text-gray-700 border border-gray-300 rounded-2xl shadow "
            type="text" name="search" placeholder="Search quiz....">
            <button class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor">
                <path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg></button>
             </div>
              </form>

         </div>

         <div class="w-3/4 mt-10">

    <!-- Header (ONLY ONCE) -->
     <h1 class=" text-center my-2 text-2xl font-bold mb-4 ">

                <span class="  text-green-700 ">Categories List </span>
     </h1>
    <div class=" grid grid-cols-4 gap-10 bg-gray-300 p-2 font-bold rounded">
        
        <div>S. No</div>
        <div>Name</div>
         <div class="text-left" >Quiz Count</div>
          <div class="text-center">Action</div>
       
        <div class="text-center"></div>
    </div>

    <!-- Data -->
     
    @foreach ($categories as $key=>$category)
        <div class="grid grid-cols-4  gap-10 bg-white p-2 mt-2 rounded shadow">
            <div>{{ $key + 1 }}</div>
            
            <div>{{ $category->name }}</div>
            <div>{{ $category->quizzes->count() }}</div>
           

            <div class="flex gap-4 justify-center items-center  ">
                <div class ="flex ">

            


              <a  href="user-quiz-list/{{$category->id}}/{{str_replace(' ','-',$category->name)}}" > 

                
            <div  " text-2xl  text-red-500 cursor-pointer ">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px">
                    <path d="M607.5-372.5Q660-425 660-500t-52.5-127.5Q555-680 480-680t-127.5 52.5Q300-575 300-500t52.5 127.5Q405-320 480-320t127.5-52.5Zm-204-51Q372-455 372-500t31.5-76.5Q435-608 480-608t76.5 31.5Q588-545 588-500t-31.5 76.5Q525-392 480-392t-76.5-31.5ZM214-281.5Q94-363 40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200q-146 0-266-81.5ZM480-500Zm207.5 160.5Q782-399 832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280q113 0 207.5-59.5Z"/></svg>
        
                </svg>
            </div>
            
              </a>

              </div>
        </div>

      </div>

        
    @endforeach

</div>
         </div>

       <x-footer-user></x-footer-user>
    </body>
</html> 
