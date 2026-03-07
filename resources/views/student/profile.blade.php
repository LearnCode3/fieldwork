<x-layout>
    <div class="rounded-lg shadow-sm border border-gray-200 p-5 bg-white">
        <h2 class="text-zinc-500 mb-5 text-xl">Profile Details</h2>
        <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="space-y-5 block">

                <div class="flex items-center gap-4">


                    @auth
                    @if(isset(Auth::user()->profile->profileImage))
                        <img src="{{ Auth::user()->profile->profileImage ? 'storage/' . Auth::user()->profile->profileImage : 'storage/profile_images/default.jpg' }}"
                            alt="user-avatar" class="block w-24 h-24 rounded-full object-cover">
                    @endif
                    @endauth
                    {{-- <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="user-avatar" class="block rounded-lg w-24 h-24" id="uploadedAvatar"> --}}

                    <div class="mt-3 space-x-3" >
                        <label for="upload"
                            class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium cursor-pointer hover:bg-blue-700 mb-2">
                            <span class="hidden sm:inline">Upload new photo</span>
                            <input type="file" class="" name="profileImage" for="upload">
                            <i class="bx bx-upload block sm:hidden"></i>
                        </label>

                        <p class="text-xs text-gray-500 mt-3">Allowed JPG, JPEG or PNG. Max size of 5MB</p>
                        @error('profileImage')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <x-divider>Personal Information</x-divider>
                <div class="mb-6 max-sm:pr-3">
                    <label for="phoneNumber" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                        number</label>
                    <input type="text" name="phoneNumber" value="{{ old('phoneNumber', $profile->phoneNumber ?? '') }}"
                        class="@error('phoneNumber') border-red-500 @enderror outline-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="1234567890" />
                    @error('phoneNumber')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <x-divider>UNIVERSITY INFORMATION</x-divider>
                <div class="grid gap-6 mb-6 md:grid-cols-2 max-sm:pr-3">
                    <div>
                        <label for="university"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">University / College /
                            Institute (full name)</label>
                        <input type="text" name="university" value="{{ old('university', $profile->university ?? '') }}"
                            class="@error('university') border-red-500 @enderror outline-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Enter university name" />
                        @error('university')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Level of
                            Study</label>
                        <input type="text" name="level" value="{{ old('level', $profile->level ?? '') }}"
                            class="@error('level') border-red-500 @enderror outline-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Bachelor/ Diploma/ Certificate" />
                        @error('level')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="course" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Course
                            (full name)</label>
                        <input type="text" name="course" value="{{ old('course', $profile->course ?? '') }}"
                            class="@error('course') border-red-500 @enderror outline-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Course" />
                        @error('course')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year of
                            Study</label>
                        <input type="text" name="year" value="{{ old('year', $profile->year ?? '') }}"
                            class="@error('year') border-red-500 @enderror outline-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="1,2,3,4" />
                        @error('year')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="registrationNo"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Admission no / Registration
                            no</label>
                        <input type="text" name="regno" value="{{ old('regno', $profile->regno ?? '') }}"
                            class="@error('regno') border-red-500 @enderror outline-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="12345... University/ College/ Institute" />
                        @error('regno')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="location"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">University location</label>
                        <input type="text" name="location" value="{{ old('location', $profile->location ?? '') }}"
                            class="@error('location') border-red-500 @enderror outline-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Dar es salaam, Arusha" />
                        @error('location')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <x-divider>FIELD INFORMATION</x-divider>
                <div class="grid gap-6 md:grid-cols-2 max-sm:pr-3">
                    <div class="mb-2">
                        <label for="company"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company</label>
                        <input type="text" name="company" value="{{ old('company', $profile->company ?? '') }}"
                            class="@error('company') border-red-500 @enderror outline-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="TAA" />
                        @error('company')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="department"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Department</label>
                        <input type="text" name="department" value="{{ old('department', $profile->department ?? '') }}"
                            class="@error('department') border-red-500 @enderror outline-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Office e.g ICT" />
                        @error('department')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="FieldStart" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Field
                            Start</label>
                        <input type="date" name="fieldStart"
                            value="{{ old('fieldStart', $profile->fieldStart ?? '') }}"
                            class="@error('fieldStart') border-red-500 @enderror outline-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        @error('fieldStart')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="fieldEnd" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Field
                            End</label>
                        <input type="date" name="fieldEnd" value="{{ old('fieldEnd', $profile->fieldEnd ?? '') }}"
                            class="@error('fieldEnd') border-red-500 @enderror outline-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        @error('fieldEnd')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="w-full"> <!-- Ensure the container is full width -->
                    <button type="submit"
                        class="w-full cursor-pointer text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-3 mt-5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        {{ $profile ? 'Update' : 'Submit' }}
                    </button>
                </div>
            </div>

        </form>
    </div>
</x-layout>
