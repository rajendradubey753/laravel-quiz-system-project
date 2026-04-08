<html>
    <head>
        <title>Admin Add Quiz page</title>
        @vite('resources/css/app.css')
    </head>

    <body>
        
        
        <x-navbar name="{{ $name }}"> </x-navbar>
        
        
            <div class ="bg-green-800 text-white pl-5 "> </div>

        
             <!-- <div  class= "bg-white p-8 rounded shadow-md w-96" > -->
                <div class="flex items-center   pt-5 bg-gray-100 flex-col min-h-screen" >
                    <div  class= "bg-white p-8 rounded shadow-md w-96" >
               <!-- <h1 class="text-2xl font-bold mb-4">Add Quiz</h1> -->
                @if(!Session('quizDetails'))
                 <h1 class="text-2xl font-bold mb-4">Add Quiz</h1>
        
               
                      <form action ="/add-quiz" method = "get" class="space-y-4  "   >
                            
                  
                   <div>
                        
                         <!-- <input type="text"  placeholder=" Enter Quiz Name" name = "category" class="w-full px-4 py-2  border-gray-300 rounded-xl  focus:outline-none "> -->
                          <label for="name" class="block text-sm font-medium text-gray-700"> Enter Quiz Name</label>
                          <input type="text"  placeholder=" Enter Quiz Name" required name = "quiz" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm    focus:ring-indigo-500 focus:border-indigo-500 ">
                          
                    </div>

                    <div>
                        <select type="text" name = "category_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm    focus:ring-indigo-500 focus:border-indigo-500 ">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        
                          


                    </div>


                        <button type="submit" class="w-full bg-indigo-500 rounded-2xl px-4 py-2 text-white hover:bg-indigo-500">Add </button>
                       
                </form >
                </div>
                @else
                <span class=" font-semibold text-green-500">Quiz: {{ Session('quizDetails')->name }}</span>
                <p class="text-lg font-semibold">Total MCQs: {{ $totalmcqs }}

                @if($totalmcqs >0)

                    <a href="/show-quiz/{{Session('quizDetails')->id}}" class="text-blue-500 hover:text-blue-700" >Show MCQs</a>
                    <!-- <span class="text-red-500"> (Maximum 5 MCQs allowed)</span> -->
                @endif
                </p>
                <h1 class="text-2xl font-bold mb-4">Add MCQs</h1>

                <form action="/add-mcq" method="get" class="space-y-4  "   >
                    <div>
                        @csrf
                        <!-- <label for="question" class="block text-sm font-medium text-gray-700"> </label> -->
                        <textarea type="text"  placeholder=" Enter your question" name = "question" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm    focus:ring-indigo-500 focus:border-indigo-500 "></textarea>
                        @error('question')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror


                    </div>

                    <div>
                        <!-- <label for="option1" class="block text-sm font-medium text-gray-700"> </label> -->
                        <input type="text"  placeholder=" Enter First Option " name = "option 1" 
                          class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm    focus:ring-indigo-500 focus:border-indigo-500 ">

                          @error('option_1')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <!-- <label for="option1" class="block text-sm font-medium text-gray-700"> </label> -->
                        <input type="text"  placeholder=" Enter Second Option " name = "option 2" 
                          class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm    focus:ring-indigo-500 focus:border-indigo-500 ">
                          @error('option_2')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <!-- <label for="option1" class="block text-sm font-medium text-gray-700"> </label> -->
                        <input type="text"  placeholder=" Enter Third Option " name = "option 3" 
                          class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm    focus:ring-indigo-500 focus:border-indigo-500 ">
                          @error('option_3')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <!-- <label for="option1" class="block text-sm font-medium text-gray-700"> </label> -->
                        <input  type="text"  placeholder=" Enter Fourth Option " name = "option 4" 
                          class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm    focus:ring-indigo-500 focus:border-indigo-500 ">
                          @error('option_4')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                         <select name = "correct_ans" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm    focus:ring-indigo-500 focus:border-indigo-500 ">
                            <option value="">Select Right Answer</option>
                            <option value="option1">Option1</option>
                            <option value="option2">Option2</option>
                            <option value="option3">Option3</option>
                            <option value="option4">Option4</option>
                         </select>
                            @error('correct_ans')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                    </div>
                          
                        
                        <button type="submit" name="submit" value="add-more" class="w-full bg-indigo-500 rounded-2xl px-4 py-2 text-white hover:bg-indigo-500">Add More</button>
                        <button type="submit" name="submit" value="Add and Submit" class="w-full bg-indigo-500 rounded-2xl px-4 py-2 text-white hover:bg-indigo-500">Add and Submit</button>
                        <a class= "w-full bg-gray-500 block text-center rounded-2xl px-4 py-2 text-white hover:bg-gray-500" href="/end-quiz">Finish Quiz</a>
                        




                </form>
                @endif
            </div>
         </div>
       
       
       
    </body>                      
</html>