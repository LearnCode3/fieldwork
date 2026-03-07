<x-app>

<div class="flex items-center justify-center h-screen bg-gray-100">
    <div class="text-center">
        <h1 class="text-9xl font-bold text-gray-800">404</h1>
        <p class="text-2xl font-semibold text-gray-600 mt-4">Oops! Page not found</p>
        <p class="text-gray-500 mt-2">The page you're looking for doesn't exist.</p>
        {{-- Go back to the previous page --}}

              @if (Auth::check())
                @if (Auth::user()->role == 1)
                    <a href="{{ route("admin.dashboard") }}" class="mt-6 inline-block px-6 py-3 text-white bg-blue-600 rounded-lg shadow hover:bg-blue-700">
                        Back to Dashboard
                    </a>
                @elseif (Auth::user()->role == 0)
                    <a href="{{ route('task.showTask') }}" class="mt-6 inline-block px-6 py-3 text-white bg-blue-600 rounded-lg shadow hover:bg-blue-700">
                        Back to My Tasks
                    </a>
                @endif
              @else
                    <a href="{{ route('login') }}" class="mt-6 inline-block px-6 py-3 text-white bg-blue-600 rounded-lg shadow hover:bg-blue-700">
                            Back to login
                    </a>
              @endif
    </div>
</div>


</x-app>


