<x-layout>

    <div class="container mx-auto py-8">
        <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden shadow-2xl">
            <div class="px-6 py-4">
                <div class="text-xl font-bold text-gray-800 mb-2">User Password Change</div>
            </div>
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="px-6 py-4">
                <!-- Profile Information -->
                <form method="POST" action="/user/password/update">

                    @csrf
    
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="block text-gray-700">Old Password</label>
                    <input type="password" name="old_password" class="text-black p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('old_password') is-invalid @enderror" id="old_password" autocomplete="off">

                    @error('old_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="block text-gray-700">New Password</label>
                    <input type="password" name="new_password" class="text-black p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('new_password') is-invalid @enderror" id="new_password" autocomplete="off">

                    @error('new_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="block text-gray-700">Confirm New Password</label>
                    <input type="password" name="new_password_confirmation" class="text-black p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="new_password_confirmation" autocomplete="off">

                </div>
    
                <div class="text-center">
                    <button type="submit"
                        class="w-full bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50">Register</button>
                </div>

                </form>

            </div>
        </div>
    </div>

</x-layout>