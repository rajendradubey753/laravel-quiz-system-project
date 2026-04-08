<html>
<head>
    <title> User Signup</title>
    @vite('resources/css/app.css')
</head>
<body>
     <x-user-navbar></x-user-navbar>

<div class= "bg bg-gray-100 flex items-center justify-center h-screen">
    <!-- <x-user-navbar></x-user-navbar> -->
    <div  class= "bg-white p-8 rounded shadow-md w-96">
        <h1 class="text-2xl font-semibold mb-4 text-center">User Signup</h1>
        @error('user')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
        <form action ="/user-signup" method = "post" class="space-y-4  "   >
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">User Name</label>
                <input type="text" id="name" name="name" placeholder=" Enter User Name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm    focus:ring-indigo-500 focus:border-indigo-500 ">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
          
            </div>
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">User Email</label>
                <input type="text" id="email" name="email" placeholder=" Enter User email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm    focus:ring-indigo-500 focus:border-indigo-500 ">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
          
                
          
            </div>
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="name" name="password" placeholder=" Enter User password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm    focus:ring-indigo-500 focus:border-indigo-500 ">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
          
            </div>
            
                
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" id="password" name="password_confirmation" placeholder=" Confirm User  Password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm  focus:border-indigo-500   focus:ring-indigo-500  ">
                
            </div>
        
        <div class="mt-4">
            
                <button type="submit" class="w-full bg-indigo-500 rounded-2xl px-4 py-2 text-white hover:bg-indigo-500">Signup </button>
         </div>
        </form >      
            
    </div>
</div>
    



 </body>
 </html>