<x-layout>

    <!-- Dashboard Content -->
    <main class="flex-1 overflow-y-auto p-4 lg:p-6">
        <!-- Overview Section -->
        <div class="mb-8">
            <h2 class="text-lg font-medium text-gray-600 mb-4">Overview</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <h3 class="text-sm font-medium text-gray-500 mb-2">All Students</h3>
                    <p class="text-3xl font-semibold text-gray-900">{{ $user }}</p>
                    <p class="text-sm text-green-600 mt-2">Students of all Years</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <h3 class="text-sm font-medium text-gray-500 mb-2">Current Students</h3>
                    <p class="text-3xl font-semibold text-gray-900">{{ $currentyear }}</p>
                    <p class="text-sm text-green-600 mt-2">Students of Current Year</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <h3 class="text-sm font-medium text-gray-500 mb-2">Active Students</h3>
                    <p class="text-3xl font-semibold text-gray-900">{{ $activeStudent }}</p>
                    <p class="text-sm text-green-600 mt-2">Active for Current Year</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <h3 class="text-sm font-medium text-gray-500 mb-2">Inactive Students</h3>
                    <p class="text-3xl font-semibold text-gray-900">{{$inactiveStudent}}</p>
                    <p class="text-sm text-green-600 mt-2">Number of Complete Field</p>
                </div>
            </div>
        </div>

        <!-- Recent Orders -->
        <div class="rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                <h3 class="text-lg font-medium text-gray-600">Recent Students</h3>

                <h3 class="text-lg font-medium text-center px-3 py-1 rounded text-gray-600">
                    @php
                        $year = now()->year
                    @endphp
                    {{  $year }}
                </h3>
            </div>
            <div class="overflow-x-auto">
                @if ($currentStudentLists->isEmpty())
                    <p class="text-center text-gray-500 p-5">No Students found for this Year</p>
                @else
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    S/N
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    FULL NAME
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    PHONE
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    UNIVERSITY
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ISSUE DATE
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    EXPIRY DATE
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    COMPANY
                                </th>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ACTIVE
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($currentStudentLists as $info)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $currentStudentLists->firstItem() + $loop->index }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $info->name ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $info->profile->phoneNumber ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            {{-- <div class="h-2 w-2 bg-green-400 rounded-full mr-2"></div> --}}
                                            <span
                                                class="text-sm text-gray-900">{{ $info->profile->university ?? 'N/A' }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ \Carbon\Carbon::parse($info->profile->fieldStart)->format('d, M Y') ?? 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ \Carbon\Carbon::parse($info->profile->fieldEnd)->format('d, M Y') ?? 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $info->profile->company ?? 'N/A' }}</td>
                                    @if (\Carbon\Carbon::parse($info->profile->fieldEnd)->gte(today()))
                                        {{-- <span class="bg-green-200 text-center text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300"> --}}

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-g-900 text-center">
                                            <span
                                                class="bg-green-200 text-center text-green-600 font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300 whitespace-nowrap text-sm">
                                                Active
                                            </span>
                                        </td>
                                    @else
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-g-900 text-center">
                                            <span
                                                class="bg-red-200 text-center text-red-600 font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300 whitespace-nowrap text-sm">
                                                Complete
                                            </span>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{-- pagenation --}}
                    <div class=" relative p-4">
                        <span class="">{{ $currentStudentLists->links() }}</span>
                    </div>
                @endif
            </div>
        </div>
    </main>
</x-layout>
