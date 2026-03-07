<x-layout>
    {{-- 

        This page show all Tasks of Students , only admin/ supervisor can see
    
    --}}
    
    <x-header>
        <p class="font-bold text-lg">ALL STUDENTS TASKS</p>
    </x-header>

    

    @if(isset($all_task) && $all_task->isNotEmpty())
    @foreach ( $all_task as $allTask )

        <ol class="relative border-s border-gray-200 dark:border-gray-700">
            <li class="mb-10 ms-6">
                <span class=" absolute flex items-center justify-center w-12 h-12 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                    @if(isset($allTask->user->profile->profileImage))
                        <img class="rounded-full shadow-lg" src="{{ asset('storage/'.$allTask->user->profile->profileImage) }}" alt=""/>
                    @else
                        <img class="rounded-full shadow-lg" src="{{ asset('storage/profile_images/default.jpg') }}" alt=""/>
                    @endif
                </span>
                <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-xs dark:bg-gray-700 dark:border-gray-600">
                    <div class="items-center justify-between mb-3 sm:flex">
                        <time class="mb-1 text-xs font-normal text-gray-500 sm:order-last sm:mb-0 bg-gray-50 me-2 px-2.5 py-0.5 rounded-sm">
                            <span class="p-2">Posted:</span>
                            <span>{{\Carbon\Carbon::parse($allTask->create_at )->format('d-M-y') ?? 'N/A' }}</span>
                            <span>| Due Date:</span>
                            <span>
                            {{\Carbon\Carbon::parse($allTask->task_date)->format('d-M-y') ?? 'N/A' }}
                            </span>
                        </time>
                        <div class="ml-3 text-lg font-normal text-gray-500 dark:text-gray-300">
                            <a href="{{ route('students.tasks',$allTask->user->id) }}">
                                <span class="font-medium pr-3">{{$allTask->user->name ?? 'N/A'}} </span>
                            </a>
                            <span href="#" class="bg-gray-100 text-gray-800 text-sm font-normal me-2 px-2.5 py-0.5 rounded-sm dark:bg-gray-600 dark:text-gray-300">
                                {{ $allTask->user->profile->university ?? 'N/A' }}
                            </span>
                            <span href="#" class="bg-gray-100 text-gray-800 text-sm font-normal me-2 px-2.5 py-0.5 rounded-sm dark:bg-gray-600 dark:text-gray-300">
                                {{ $allTask->user->profile->course ?? 'N/A' }}
                            </span>
                            <span href="#" class="bg-gray-100 text-gray-800 text-sm font-normal me-2 px-2.5 py-0.5 rounded-sm dark:bg-gray-600 dark:text-gray-300">
                                {{$allTask->user->profile->level ?? 'N/A'}}
                            </span>
                            <span href="#" class="bg-gray-100 text-gray-800 text-sm font-normal me-2 px-2.5 py-0.5 rounded-sm dark:bg-gray-600 dark:text-gray-300">
                                {{ $allTask->week ?? 'N/A'}}
                            </span>
                        </div>
                    </div>
                    <div class="p-3 text-lg font-normal text-gray-500 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-600 dark:border-gray-500 dark:text-gray-300">
                        {{ $allTask->task ?? 'N/A'}}
                    </div>
                </div>
            </li>

        </ol>



    @endforeach
    {{-- pagenation --}}
    <div class=" bottom-3 relative">
        <span class="">{{ $all_task->links() }}</span>
    </div>
    @else
    <p class="text-3xl text-gray-600 text-center flex flex-col items-center justify-center h-full">
        No Tasks Found.  <span class="text-lg text-gray-500">No Task Submitted by Students</span>
    </p>
    @endif
</x-layout>
