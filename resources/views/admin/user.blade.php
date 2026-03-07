<x-layout>
    <div class="flex items-center justify-center">
        <div class="bg-white rounded-lg pt-6 pb-6 px-5 w-full max-w-6xl">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
                <div class="mb-5">
                    <h2 class="text-lg font-semibold text-gray-900">Users</h2>
                    <p class="text-sm text-gray-500 mt-3">A list of all registered users in the system, including
                        supervisors and students, with options to banning, or deleting them</p>
                </div>
                <button id="openModal"
                    class="mt-4 sm:mt-0 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-md">
                    Add Supervisor
                </button>
            </div>

            <!-- Table -->

            <div>
                <table class="min-w-full divide-y divide-gray-200 text-sm" id="userTable">
                    <thead class="">
                        <tr>
                            <th class="px-6 py-3"><input type="checkbox" id="selectAll" class="w-4 h-4"></th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sn</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Join </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
                            <th class="px-6 py-3 text-right"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <!-- Sample Rows -->
                        @foreach ($all_users as $users)
                            <tr class="group relative">
                                <td class="px-6 py-4"><input type="checkbox" class="w-4 h-4 rowCheckbox"></td>
                                <td class="px-6 py-4 text-gray-900">{{ $all_users->firstItem() + $loop->index }}</td>
                                <td class="px-6 py-4 text-gray-900">{{ $users->name }}</td>
                                <td class="px-6 py-4 text-gray-900">{{ $users->email }}</td>
                                <td class="px-6 py-4 text-gray-500">{{ date_format($users->created_at, 'd, M Y') }}</td>

                                <td class="px-6 py-4">

                                        @if ($users->banned == 1)
                                            <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-700">Banned</span>
                                        @else
                                            <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700">Active</span>
                                        @endif

                                    </span></td>
                                <td class="px-6 py-4 text-gray-500">{{ $users->role == 1 ? 'Suprevisor' : 'Student' }}</td>
                                <td class="px-6 py-4 text-right">
                                    <div class="relative inline-block">
                                        <button class="p-2 hover:bg-gray-100 rounded-full ">
                                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 6h.01M12 12h.01M12 18h.01" />
                                            </svg>
                                        </button>
                                        @if (!$users->role)
                                        <div
                                            class="hidden group-hover:block absolute right-0 mt-2 w-28 bg-white border border-gray-200 rounded-md shadow-lg z-10">
                                            <form action="{{ route('user.delete',$users->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-400/10 block w-full text-left px-4 py-2 text-sm text-red-700 hover:bg-gray-50">
                                                    Delete
                                                </button>
                                            </form>
                                                <form action="{{ route('user.banned',$users->id) }}" method="POST">
                                                    @csrf
                                                        @if ($users->banned)
                                                            <button type="submit" class="bg-green-400/10 block w-full text-left px-4 py-2 text-sm text-green-700 hover:bg-gray-50">
                                                                Active
                                                            </button>
                                                        @else
                                                            <button type="submit" class="bg-yellow-400/10 block w-full text-left px-4 py-2 text-sm text-yellow-700 hover:bg-gray-50">
                                                                Ban
                                                            </button>
                                                        @endif

                                                    </button>
                                                </form>

                                            </div>
                                            @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            {{-- pagenation --}}
            <div class=" bottom-3 relative mt-10">
                {{ $all_users->links() }}
            </div>
        </div>

        <!-- Modal -->
        <div id="userModal"
            class="fixed inset-0 hidden bg-black/20 backdrop-blur flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Add New Supervisor</h3>
                <form class="space-y-4" action="{{ route('admin.addsupervisor') }}" method="POST">
                    @csrf
                    <input type="text" name="user_name" placeholder="Name" class="w-full outline-0 border-1 border-gray-400 rounded p-2">
                    <input type="email" name="email" placeholder="Email" class="w-full outline-0 border-1 border-gray-400 rounded p-2">
                    <input type="password" name="password" placeholder="password" class="w-full outline-0 border-1 border-gray-400 rounded p-2">
                    <div class="flex justify-end space-x-2 pt-4">
                        <button type="button" id="closeModal"
                            class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Cancel</button>
                        <input type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700" value="Save">
                    </div>
                </form>
            </div>
        </div>

        <script>
            const modal = document.getElementById('userModal');
            document.getElementById('openModal').addEventListener('click', () => modal.classList.remove('hidden'));
            document.getElementById('closeModal').addEventListener('click', () => modal.classList.add('hidden'));

            document.getElementById('selectAll').addEventListener('change', function() {
                const checkboxes = document.querySelectorAll('.rowCheckbox');
                checkboxes.forEach(cb => cb.checked = this.checked);
            });
        </script>
    </div>
</x-layout>
