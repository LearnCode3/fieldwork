<x-layout>
    <x-header>
        MY ATTENDANCE
    </x-header>
    <div class="rounded-lg shadow-sm border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-lg font-medium text-gray-600">Recent Students</h3>

            <button class="bg-blue-600 hover:bg-blue-700 transform hover:scale-105 transition-all duration-300 py-2 px-3 rounded-md shadow-md cursor-pointer text-white" type="submit">Attendance</button>
        </div>
        <div class="overflow-x-auto">

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            S/N
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            FULL NAME
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            UNIVERSITY
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            COMPANY
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ARRIVE
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            DEPART
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            STATUS
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                
                        <tr class="hover:bg-gray-50 even:bg-amber-500">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                1
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                Christopher Mwakalinga Mwakalinga
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    {{-- <div class="h-2 w-2 bg-green-400 rounded-full mr-2"></div> --}}
                                    <span class="text-sm text-gray-900">Mwalimu Nyerere Memorial Academy</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                Collins
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                12/12/12
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                12/12/12
                            </td>

                            {{-- <span class="bg-green-200 text-center text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300"> --}}

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-g-900 text-center">
                                <span
                                    class="bg-red-200 text-center text-red-600 font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300 whitespace-nowrap text-sm">
                                    Complete
                                </span>
                            </td>
                        </tr>

                </tbody>
            </table>
            {{-- pagenation --}}
            {{-- <div class=" relative p-4">
                        <span class="">{{ $currentStudentLists->links() }}</span>
                    </div> --}}

        </div>
    </div>

</x-layout>
