       <!-- Right-Side Modal -->
    <div id="modal"
        class="over-flow max-sm:w-70 max-sm:pt-10 w-96 fixed inset-y-0 right-0 z-10  bg-white shadow-lg p-6 transform transition-all duration-300 translate-x-full opacity-0"
    >
        <!-- Modal Header -->
        <div class="flex justify-between items-center border-b border-gray-200 pb-3 mt-5">
            <h2 class="text-xl font-bold text-gray-800/30">New Task</h2>
            <button class="closeModal text-gray-500 hover:text-gray-700 text-xl">✕</button>
        </div>

        <!-- Modal Content -->
        <form class="mt-5 space-y-4" action="{{route('task.store')}}" method="POST">
            @csrf
            <!-- Date Picker -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Due Date</label>
                <input type="date" name="task_date"
                    class="@error('task_date') border-red-500 @enderror mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 outline-0 border-1"
                />
                @error('task_date')
                    <span class="text-red-500 text-sm">{{$message}}</span>
                @enderror
            </div>

            <!-- Task Type (Dropdown) -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Task Type</label>
                <select name="week"
                    class="@error('week') border-red-500 @enderror mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 outline-0"

                >
                    <option value="" selected disabled>Select task type</option>
                    <option value="Week 1">Week 1</option>
                    <option value="Week 2">Week 2</option>
                    <option value="Week 3">Week 3</option>
                    <option value="Week 4">Week 4</option>
                    <option value="Week 5">Week 5</option>
                    <option value="Week 6">Week 6</option>
                    <option value="Week 7">Week 7</option>
                    <option value="Week 8">Week 8</option>
                    <option value="Week 9">Week 9</option>
                    <option value="Week 10">Week 10</option>
                </select>
                @error('week')
                    <span class="text-red-500 text-sm">{{$message}}</span>
                @enderror
            </div>

            <!-- Task Description -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Description</label>
                <textarea rows="10" placeholder="Enter task details" name="task"
                    class="@error('task') border-red-500 @enderror mt-1 block w-full border-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 outline-0"

                ></textarea>
                @error('task')
                    <span class="text-sm text-red-500">{{$message}}</span>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex justify-end space-x-2">
                <button
                    class="px-4 py-2 bg-red-500 rounded-md text-white hover:bg-red-600 transition closeModal"
                    type="button"
                >
                    Cancel
                </button>
                <button
                    class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition"
                    type="submit"
                >
                    Save Task
                </button>
            </div>
        </form>
    </div>
