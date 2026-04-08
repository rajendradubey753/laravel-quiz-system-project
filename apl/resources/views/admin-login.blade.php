<html>
<head>
    <title>Admin Login</title>
    @vite('resources/css/app.css')
</head>
<body  class= "bg bg-gray-100 flex items-center justify-center h-screen">
    <div  class= "bg-white p-8 rounded shadow-md w-96">
        <h1 class="text-2xl font-bold mb-4">Admin Login</h1>
        @error('user')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
        <form action ="/admin-login" method = "post" class="space-y-4  "   >
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Admin Name</label>
                <input type="text" id="name" name="name" placeholder=" Enter Admin Name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm    focus:ring-indigo-500 focus:border-indigo-500 ">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
          
            </div>
            
                
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" placeholder=" Enter Password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm  focus:border-indigo-500   focus:ring-indigo-500  ">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        
        <div class="mt-4">
            
                <button type="submit" class="w-full bg-indigo-500 rounded-2xl px-4 py-2 text-white hover:bg-indigo-500">Login </button>
         </div>
        </form >      
            
    </div>
    



 </body>
 </html>