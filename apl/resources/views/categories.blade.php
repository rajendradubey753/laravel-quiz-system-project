<html>
    <head>
        <title>Admin Categories page</title>
        @vite('resources/css/app.css')
    </head>

    <body>
        
        <!-- Add your admin dashboard content here -->
        <x-navbar name="{{ $name }}"> </x-navbar>
        @if (session('category'))
        <div class ="bg-green-800 text-white pl-5 "> {{ session('category') }} </div>
        @endif
           
        
            
        <div class="flex items-center   pt-5 bg-gray-100 flex-col min-h-screen" >

        
             <div  class= "bg-white p-8 rounded shadow-md w-96" >
               <h1 class="text-2xl font-bold mb-4">Add Category</h1>
        
               <form action ="/add-category" method = "post" class="space-y-4  "   >
                  @csrf
                   <div>
                        <label for="name" class="block text-sm font-medium text-gray-700"> Add Category</label>
                          <input type="text"  placeholder=" Enter Category Name" name = "category" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm    focus:ring-indigo-500 focus:border-indigo-500 ">
                           @error('category')
                           <div class="text-red-500"> {{ $message }} </div>
                            @enderror
                    </div>
                
          
                   
                        <button type="submit" class="w-full bg-indigo-500 rounded-2xl px-4 py-2 text-white hover:bg-indigo-500">Add </button>
                   


                </form >   
                     
            </div>
                  <div class="w-3/4 mt-10">

    <!-- Header (ONLY ONCE) -->
     <h1 class="  text-2xl font-bold mb-4 ">

                <span class="  text-blue-500 ">Categories List </span>
     </h1>
    <div class=" grid grid-cols-4 gap-10 bg-gray-300 p-2 font-bold rounded">
        
        <div>S. No</div>
        <div>Name</div>
        <div>Creator</div>
        <div>Action</div>
    </div>

    <!-- Data -->
     
    @foreach ($categories as $index => $category)
        <div class="grid grid-cols-4  gap-10 bg-white p-2 mt-2 rounded shadow">
            <div>{{ $index + 1 }}</div>
            <div>{{ $category->name }}</div>
            <div>{{ $category->creator }}</div>

            <div clas="flex gap-4 justify-center items-center  ">
                <div class ="flex ">

            <a href="category/delete/{{ $category->id }}" >
                
            <div class= "  text-red-500 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" >
                    <path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/>
                </svg>
            </div>
            
              </a>


              <a href="quiz-list/{{$category->id}}/{{$category->name}}" >  
                
            <div class= "  text-red-500 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M607.5-372.5Q660-425 660-500t-52.5-127.5Q555-680 480-680t-127.5 52.5Q300-575 300-500t52.5 127.5Q405-320 480-320t127.5-52.5Zm-204-51Q372-455 372-500t31.5-76.5Q435-608 480-608t76.5 31.5Q588-545 588-500t-31.5 76.5Q525-392 480-392t-76.5-31.5ZM214-281.5Q94-363 40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200q-146 0-266-81.5ZM480-500Zm207.5 160.5Q782-399 832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280q113 0 207.5-59.5Z"/></svg>
        
                </svg>
            </div>
            
              </a>
              </div>
        </div>

      </div>

        
    @endforeach

</div>

           
             
    
    
        </div>

    </body>
</html>