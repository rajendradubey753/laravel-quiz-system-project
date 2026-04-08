 <nav class= "bg-white shadow-md px -4 py-3">
            <div class="flex justify-between items-center"> 
                <div class="text-xl font-bold text-green-700 hover:text-gray-600 cursor-pointer">
                    Quiz System
        
                </div>
                <div class="space-x-4">
                    <a  class="text-green-700 hover:text-gray-800" href="/" >Home</a>
                    <a  class="text-green-700 hover:text-gray-800" href="/" >Categories</a>
                    @if(session('user'))

                    <a class="text-green-700 hover:text-gray-800" href="/user-details">Welcome, {{ session('user')->name }}</a>
                    <a class="text-green-700 hover:text-gray-800" href="/user-logout">Logout</a>
                    @else
                    <a class="text-green-700 hover:text-gray-800" href="/user-login">Login </a>
                    <a class="text-green-700 hover:text-gray-800" href="/user-signup">Signup</a>
                    @endif
                    <a class="text-green-700 hover:text-gray-800" href="/admin-logout">Blog</a>

                    

                </div>
                


            </div>



        