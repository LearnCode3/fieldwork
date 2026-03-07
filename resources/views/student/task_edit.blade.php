<x-layout>

    <x-header>EDIT TASK</x-header>

    <form action="{{ route('taskUpdate',$task->id) }}" method="POST" class="space-y-4">
        @csrf

        @method('PUT')

        <!-- Date Input -->
        <div>
            <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
            <input type="date" name="task_date" id="task_date"
                   value="{{old('task_date',$task->task_date)}}"
                   class="outline-0 py-2 px-4 mt-1 block w-full @error('task_date') border-red-500 @else border-gray-300 @enderror rounded-md border " />
            @error('task_date')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Select Option -->
        <div>
            <label for="week" class="block text-sm font-medium text-gray-700">Select Week</label>
            <select name="week" id="options"
                    class="outline-0 py-2 px-2 border mt-1 block w-full @error('week') border-red-500 @else border-gray-300 @enderror rounded-md focus:border-blue-500 focus:ring focus:ring-blue-200">
                <option value=""selected disabled>-- Select an option --</option>
                <option value="{{$task->week}}" class="text-blue-800 font-bold">{{$task->week}}</option>
                <option value="week 1" >Week 1</option>
                <option value="Week 2" >Week 2</option>
                <option value="Week 3" >Week 3</option>
                <option value="Week 4" >Week 4</option>
                <option value="Week 5" >Week 5</option>
                <option value="Week 6" >Week 6</option>
                <option value="Week 7" >Week 7</option>
                <option value="Week 8" >Week 8</option>
                <option value="Week 9" >Week 9</option>
                <option value="Week 10">Week 10</option>
            </select>
            @error('week')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Textarea -->
        <div>
            <label for="textarea" class="block text-sm font-medium text-gray-700">My Task</label>
            <textarea name="task" id="task" rows="6"
                      class="outline-0 py-5 px-5 mt-2 block w-full border @error('textarea') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm ">{{ old('task',$task->task)}}</textarea>
            @error('task')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <button type="submit" class="justify-center mt-2 w-full inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Update Task
            </button>
        </div>
    </form>

</x-layout>
