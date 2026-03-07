<!-- Sidebar -->
<div id="sidebar"
    class="w-60 shadow-sm border-r border-gray-200 bg-white text-white p-4 flex flex-col space-y-4 fixed inset-0 transform -translate-x-full lg:translate-x-0 lg:static transition-all duration-300 z-20 lg:z-auto">
    <!-- Logo and Header Section -->
    <x-logo />

    <!-- Sidebar Navigation -->
    <ul class="space-y-4">
        <!-- Main Navigation Links -->
        @can('super')
            <li>
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center py-2 px-4 rounded-md font-semibold text-gray-600 hover:bg-gray-100 hover:text-zinc-800">
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 6h18M3 14h18M3 18h18"></path>
                    </svg> --}}

                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-gray-600" viewBox="0 0 24 24"
                        fill="currentColor">
                        <path
                            d="M14 21C13.4477 21 13 20.5523 13 20V12C13 11.4477 13.4477 11 14 11H20C20.5523 11 21 11.4477 21 12V20C21 20.5523 20.5523 21 20 21H14ZM4 13C3.44772 13 3 12.5523 3 12V4C3 3.44772 3.44772 3 4 3H10C10.5523 3 11 3.44772 11 4V12C11 12.5523 10.5523 13 10 13H4ZM9 11V5H5V11H9ZM4 21C3.44772 21 3 20.5523 3 20V16C3 15.4477 3.44772 15 4 15H10C10.5523 15 11 15.4477 11 16V20C11 20.5523 10.5523 21 10 21H4ZM5 19H9V17H5V19ZM15 19H19V13H15V19ZM13 4C13 3.44772 13.4477 3 14 3H20C20.5523 3 21 3.44772 21 4V8C21 8.55228 20.5523 9 20 9H14C13.4477 9 13 8.55228 13 8V4ZM15 5V7H19V5H15Z">
                        </path>
                    </svg>

                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('profile.index') }}"
                    class="flex items-center py-2 px-4 rounded-md font-semibold text-gray-600 hover:bg-gray-100 hover:text-gray-950">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-gray-600" viewBox="0 0 24 24"
                        fill="currentColor">
                        <path
                            d="M4 11.3333L0 9L12 2L24 9V17.5H22V10.1667L20 11.3333V18.0113L19.7774 18.2864C17.9457 20.5499 15.1418 22 12 22C8.85817 22 6.05429 20.5499 4.22263 18.2864L4 18.0113V11.3333ZM6 12.5V17.2917C7.46721 18.954 9.61112 20 12 20C14.3889 20 16.5328 18.954 18 17.2917V12.5L12 16L6 12.5ZM3.96927 9L12 13.6846L20.0307 9L12 4.31541L3.96927 9Z">
                        </path>
                    </svg>
                    <span>Students</span>
                </a>
            </li>

            <li>
                <a href="{{ route('user.all_user') }}"
                    class="flex items-center py-2 px-4 rounded-md font-semibold text-gray-600 hover:bg-gray-100 hover:text-gray-950">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-gray-600" viewBox="0 0 24 24"
                        fill="currentColor">
                        <path
                            d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H18C18 18.6863 15.3137 16 12 16C8.68629 16 6 18.6863 6 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11Z">
                        </path>
                    </svg>
                    <span>Users</span>
                </a>
            </li>
            <li>
                <a href="{{ route('task.index') }}"
                    class="flex items-center py-2 px-4 rounded-md font-semibold text-gray-600 hover:bg-gray-100 hover:text-gray-950">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-gray-600" viewBox="0 0 24 24"
                        fill="currentColor">
                        <path
                            d="M8.00008 6V9H5.00008V6H8.00008ZM3.00008 4V11H10.0001V4H3.00008ZM13.0001 4H21.0001V6H13.0001V4ZM13.0001 11H21.0001V13H13.0001V11ZM13.0001 18H21.0001V20H13.0001V18ZM10.7072 16.2071L9.29297 14.7929L6.00008 18.0858L4.20718 16.2929L2.79297 17.7071L6.00008 20.9142L10.7072 16.2071Z">
                        </path>
                    </svg>
                    <span>Tasks</span>
                </a>
            </li>
            {{-- attendance link for supervisor --}}
            <li>
                <a href="#"
                    class="flex items-center py-2 px-4 rounded-md font-semibold text-gray-600 hover:bg-gray-100 hover:text-gray-950">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-gray-600" viewBox="0 0 24 24"
                        fill="currentColor">
                        <path
                            d="M8.00008 6V9H5.00008V6H8.00008ZM3.00008 4V11H10.0001V4H3.00008ZM13.0001 4H21.0001V6H13.0001V4ZM13.0001 11H21.0001V13H13.0001V11ZM13.0001 18H21.0001V20H13.0001V18ZM10.7072 16.2071L9.29297 14.7929L6.00008 18.0858L4.20718 16.2929L2.79297 17.7071L6.00008 20.9142L10.7072 16.2071Z">
                        </path>
                    </svg>
                    <span>Attendance</span>
                </a>
            </li>
        @endcan
        @can('student')
            <li>
                <a href="{{ route('profile.show') }}"
                    class="flex items-center py-2 px-4 rounded-md font-semibold text-gray-600 hover:bg-gray-100 hover:text-gray-950">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-gray-600" viewBox="0 0 24 24"
                        fill="currentColor">
                        <path
                            d="M3 6H21V18H3V6ZM2 4C1.44772 4 1 4.44772 1 5V19C1 19.5523 1.44772 20 2 20H22C22.5523 20 23 19.5523 23 19V5C23 4.44772 22.5523 4 22 4H2ZM13 9H19V11H13V9ZM18 13H13V15H18V13ZM6 13H7V16H9V11H6V13ZM9 8H7V10H9V8Z">
                        </path>
                    </svg>
                    <span>Profile</span>
                </a>
            </li>

            <li>
                
                <a href="{{ route('task.showTask') }}"
                    class="flex items-center py-2 px-4 rounded-md font-semibold text-gray-600 hover:bg-gray-100 hover:text-gray-950">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-gray-600" viewBox="0 0 24 24"
                        fill="currentColor">
                        <path
                            d="M8.00008 6V9H5.00008V6H8.00008ZM3.00008 4V11H10.0001V4H3.00008ZM13.0001 4H21.0001V6H13.0001V4ZM13.0001 11H21.0001V13H13.0001V11ZM13.0001 18H21.0001V20H13.0001V18ZM10.7072 16.2071L9.29297 14.7929L6.00008 18.0858L4.20718 16.2929L2.79297 17.7071L6.00008 20.9142L10.7072 16.2071Z">
                        </path>
                    </svg>
                    <span>My Task</span>
                </a>
            </li>
            {{-- attendance link for students --}}
            <li>
                <a href="{{ route('student.attendance') }}"
                    class="flex items-center py-2 px-4 rounded-md font-semibold text-gray-600 hover:bg-gray-100 hover:text-gray-950">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 text-gray-600" viewBox="0 0 24 24"
                        fill="currentColor">
                        <path
                            d="M8.00008 6V9H5.00008V6H8.00008ZM3.00008 4V11H10.0001V4H3.00008ZM13.0001 4H21.0001V6H13.0001V4ZM13.0001 11H21.0001V13H13.0001V11ZM13.0001 18H21.0001V20H13.0001V18ZM10.7072 16.2071L9.29297 14.7929L6.00008 18.0858L4.20718 16.2929L2.79297 17.7071L6.00008 20.9142L10.7072 16.2071Z">
                        </path>
                    </svg>
                    <span>Attendance</span>
                </a>
            </li>
        @endcan

        {{-- <li>
                <div class="flex items-center py-2 px-4 rounded-md font-semibold text-gray-600 hover:bg-gray-200 hover:text-gray-950 cursor-pointer" id="moreOptionsToggle">
                    <svg id="dropdownIcon" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 9l6 6 6-6"></path>
                    </svg>
                    <span>More Options</span>
                </div>

                <!-- Collapsed Items -->
                <ul id="moreOptions" class="space-y-2 pl-6 mt-2 hidden">
                    <li>
                        <a href="#" class="flex items-center rounded-md py-2 px-4 font-semibold text-gray-600 hover:bg-gray-200 hover:text-gray-950">
                            <span>Notifications</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center rounded-md py-2 px-4 font-semibold text-gray-600 hover:bg-gray-200 hover:text-gray-950">
                            <span>Support</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center rounded-md py-2 px-4 font-semibold text-gray-600 hover:bg-gray-200 hover:text-gray-950">
                            <span>Billing</span>
                        </a>
                    </li>
                </ul>
            </li> --}}
    </ul>


    <div class="profile">
        <!-- Profile Section (Initially Positioned at the Bottom of Sidebar) -->
        <div id="userProfile"
            class="absolute bottom-0 left-0 p-3 rounded-md cursor-pointer hover:bg-gray-100 transition-all duration-200">

            @auth
                <div class="flex items-center space-x-4">
                    <!-- Left image -->
                    @if (isset(Auth::user()->profile->profileImage))
                        <img src="{{ asset('storage/' . Auth::user()->profile->profileImage) }}" alt="User"
                            class="w-10 h-10 rounded-full object-cover">
                    @else
                        <img src="{{ asset('storage/profile_images/default.jpg') }}" alt="User"
                            class="w-10 h-10 rounded-full object-cover">
                    @endif
                    <!-- User Info -->
                    <div class="flex-1">
                        <div class="font-semibold text-sm text-zinc-700">{{ Auth::user()->name }}</div>
                        <div class="text-xs text-gray-400">Admin</div>
                    </div>
                    <!-- Settings Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400 hover:text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l4 4"></path>
                    </svg>
                </div>
            @endauth

        </div>

        <!-- Profile Popup (Initially Hidden) -->
        <div id="profilePopup"
            class="hidden absolute left-0 bg-zinc-50 border-1 border-zinc-200  text-white p-4 rounded-md w-60 mt-2 shadow-lg z-20">
            <!-- User Info Row -->
            <div class="flex items-center space-x-4">
                @auth
                    @if (isset(Auth::user()->profile->profileImage))
                        <img src="{{ asset('storage/' . AUTH::user()->profile->profileImage) }}" alt="User"
                            class="w-10 h-10 rounded-full object-cover">
                    @else
                        <img src="{{ asset('storage/profile_images/default.jpg') }}" alt="User"
                            class="w-10 h-10 rounded-full object-cover">
                    @endif
                    <div>
                        <div class="font-semibold text-zinc-800 text-sm">{{ Auth::user()->name }}</div>
                        <div class="text-xs text-zinc-500">{{ Auth::user()->email }}</div>
                    </div>
                @endauth


            </div>

            <!-- Divider -->
            <div class="my-2 border-t border-zinc-200"></div>

            <!-- Settings and Logout -->
            <div class="flex items-center space-x-4 py-2 hover:bg-gray-200 hover:rounded-sm cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600 hover:text-white" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l4 4"></path>
                </svg>
                <span class="text-sm text-gray-600">Settings</span>
            </div>

            <!-- Divider -->
            <div class="my-2 border-t border-zinc-200"></div>
            <div class="flex items-center w-full space-x-4 py-2 hover:bg-gray-200 cursor-pointer hover:rounded-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600 hover:text-white" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l5-5-5-5"></path>
                </svg>
                @auth
                    <form action="{{ route('logout') }}" method="post" class=" cursor-pointer flex">
                        @csrf
                        <input type="submit" class="text-sm text-gray-600" value="Logout" />
                    </form>
                @endauth
            </div>
        </div>
    </div>
</div>
