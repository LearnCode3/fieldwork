<x-layout>
    <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
        <div>
            <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                <span class="sr-only">Action button</span>
                Action
                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdownAction" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownActionButton">
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Reward</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Promote</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Activate account</a>
                    </li>
                </ul>
                <div class="py-1">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete User</a>
                </div>
            </div>
        </div>
        {{-- <label for="table-search" class="sr-only">Search</label> --}}
        <div class="relative ">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="text" id="table-search-users" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for users">
        </div>
    </div>
    <div class="relative overflow-x-auto sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        University
                    </th>
                    <th scope="col" class="px-6 py-3">
                        level
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Course
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Year
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Reg
                    </th>
                    <th scope="col" class="px-6 py-3">
                        location
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Company
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Department
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Start
                    </th>
                    <th scope="col" class="px-6 py-3">
                        End
                    </th>

                </tr>
            </thead>
            <tbody >
                @forelse ($studentDetails as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <th scope="row" class="flex items-center pr-9 py-4 text-gray-900 whitespace-nowrap dark:text-white">

                            <img class="w-10 h-10 rounded-full" src="{{ $item->profile->profileImage ? asset('storage/' . $item->profile->profileImage) : asset('storage/profile_images/default.jpg') }}" alt="">

                            <div class="ps-3">
                                <div class="text-base font-semibold">{{ $item->name }}</div>
                                <div class="font-normal text-gray-500">{{ $item->email }}</div>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            {{ $item->profile->phoneNumber ?? 'N/A' }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="{{ $item->status_class }} text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300 ">{{ $item->status }}</div>
                                <div class=" text-center text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300 ">
                                    @if(\Carbon\Carbon::parse($item->profile->fieldEnd)->gte(today()))
                                    <span class="bg-green-200 text-center text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">
                                        Live
                                    </span>
                                    @else
                                     <span class="bg-red-200 text-center text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300">
                                        Complete
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->profile->university ?? 'N/A' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->profile->level ?? 'N/A' }}
                        </td>
                        <td class="px-6 py-4">
                        {{ $item->profile->course ?? 'N/A' }}
                        <td class="px-6 py-4">
                        {{ $item->profile->year ?? 'N/A' }}
                        <td class="px-6 py-4">
                            {{ $item->profile->regno ?? 'N/A' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->profile->location ?? 'N/A' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->profile->company ?? 'N/A' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->profile->department ?? 'N/A' }}
                        </td>
                        <td class="">
                            {{\Carbon\Carbon::parse( $item->profile->fieldStart)->format('d-m-Y') ?? 'N/A'}}
                        </td>
                        <td class="">
                            {{ \Carbon\Carbon::parse($item->profile->fieldEnd)->format('d-m-Y') ?? 'N/A' }}
                        </td>
                    </tr>


                @empty
                    <tr>
                        <td colspan="13" class="text-center  p-2 ">
                            <p class=" text-gray-500 text-base">No data available</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layout>
