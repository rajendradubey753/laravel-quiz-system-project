<!-- <h1>hello welcome  {{ $name }}</h1> -->
 <html>
    <head>
        <title>Admin Dashboard</title>
        @vite('resources/css/app.css')
    </head>

    <body class="bg-gray-100 min-h-screen">
        
        <!-- Add your admin dashboard content here -->
        <x-navbar name="{{ $name }}"> </x-navbar>
        <div class="container mx-auto py-8">
                <!-- <div class="bg-white p-8 rounded shadow-md w-96 mx-auto mb-8"> -->

            </div>
                

    <!-- Header (ONLY ONCE) -->
     <h1 class="  text-2xl font-bold mb-4 ">

                <span class="  text-blue-500 ">User List </span>
     </h1>
    <div class=" grid grid-cols-3 gap-4 bg-gray-300 p-2 font-bold rounded text-center">
        
        <div>S. No</div>
        <div>Name</div>
        <div>Email</div>
        
    </div>

    <!-- Data -->
     
    @foreach ($users as $user)
        <div class="grid grid-cols-3  gap-4 bg-white p-2 mt-2 rounded shadow items-center text-center  {{ $loop->even ? 'bg-gray-100' : '' }}">
            
             <div>{{ $loop->iteration }}</div>
            <div>{{ $user->name }}</div>
            
             <div>{{ $user->email }}</div>
            </div>

        
    @endforeach

</div>

{{ $users->links() }}
           
         </div>

      </div>
    </body>
</html>
