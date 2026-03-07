<x-app>
    
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <form class="space-y-5" action="{{ route('auth.register') }}" method="POST">
                @csrf
                <h5 class="text-xl font-medium text-gray-900 dark:text-white text-center">REGISTER</h5>
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="@error('name') border-red-500 @enderror outline-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="fullname" />
                    @error('name')
                        <span class="text-red-500 text-sm">{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="@error('email') border-red-500 @enderror outline-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="email@example.com" />
                    @error('email')
                        <span class="text-red-500 text-sm">{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" class="@error('password') border-red-500 @enderror outline-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                    @error('password')
                        <span class="text-red-500 text-sm">{{$message}}</span>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password" placeholder="••••••••" class="@error('password') border-red-500 @enderror outline-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                    @error('password')
                        <span class="text-red-500 text-sm">{{$message}}</span>
                    @enderror
                </div>

                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Register
                </button>
                <div class="text-sm font-medium text-gray-500 dark:text-gray-300 text-center">
                    Already have an account? <a href="{{ route('login') }}" class="text-blue-700 hover:underline dark:text-blue-500">
                        Login</a>
                </div>
            </form>
        </div>
    </div>

    </x-app>
