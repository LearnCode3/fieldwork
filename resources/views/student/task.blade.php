<x-layout>

        <x-header>
            MY TASKS
        </x-header>

        <div class="flex items-center justify-between">
            <!-- Button to Open Modal -->
            <button id="openModal" class="px-3 py-2 mb-5 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition cursor-pointer">
                Enter New Task
            </button>

            {{-- <button class="px-3 py-2 mb-5 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700 transition">
                Export Excel
            </button> --}}
        </div>


        <!-- Modal Overlay -->
        <div id="overlay" class="fixed inset-0 bg-[#111827]/5 bg-opacity-50 opacity-0.5 hidden transition-opacity duration-300"></div>


         <!-- Right-Side Modal -->
         <x-task-form-modal/>

@if (isset($taskuser) && $taskuser->isNotEmpty())
    @foreach ( $taskuser as  $taskusers)
    <div class="max-w-7xl py-8 mx-auto bg-white text-gray-800 rounded-lg shadow-sm border border-gray-200 px-5 mb-3">
        <ul class="space-y-12">

            <li class="flex items-start space-x-3">
                <p rel="noopener noreferrer" class="flex items-center h-8 text-sm hover:underline">{{ $taskusers->task_date }}</p>
                <div class="flex-1 space-y-2">
                    <div class="flex items-center justify-between space-x-4 text-gray-400">
                        <p rel="noopener noreferrer" class="inline-flex items-center px-3 py-1 my-1 space-x-2 text-sm border rounded-full group border-gray-700">
                            <span aria-hidden="true" class="h-1.5 w-1.5 rounded-full bg-blue-400"></span>
                            <span class="group-hover:underline text-gray-800">{{$taskusers->week}}</span>
                        </p>
                        <span class="text-xs whitespace-nowrap">

                           <div class="relative inline-block group">
                                <button class="px-4 py-2 text-white rounded-md transition ">
                                    <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M12 6h.01M12 12h.01M12 18h.01"/>
                                    </svg>
                                </button>

                                <!-- Dropdown -->
                                <div class="text-center absolute left-0 mt-1 w-25 bg-white border border-gray-200 rounded-md shadow-md opacity-10 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-10">
                                  <ul class="text-sm text-gray-700">
                                    <li>

                                    </li>
                                    <li>
                                      <a href="{{ route('taskedit',$taskusers->id) }}" class="block px-4 py-2 text-indigo-600 hover:bg-blue-100">Edit</a>
                                    </li>
                                    <li>

                                        <form action="{{ route('task.delete',$taskusers->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-center w-full px-4 py-2 text-red-600 hover:bg-red-100" type="submit">Delete</button>
                                        </form>
                                      {{-- <a href="" class="block px-4 py-2 text-red-600 hover:bg-red-100">Delete</a> --}}
                                    </li>
                                  </ul>
                                </div>
                              </div>
                        </span>
                    </div>
                    <div class="space-y-2">
                        <p>{{ $taskusers->task}}</p>
                    </div>
                </div>
            </li>

        </ul>
    </div>

    @endforeach

    <div class="z-0">
        {{ $taskuser->links() }}
    </div>

@else

    <div class="flex items-center justify-center h-80">
        <p>No Task Yet, submit you Task here...</p>
    </div>

@endif

</x-layout>
