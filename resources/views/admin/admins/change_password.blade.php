<x-admin_layout>

    <div class="flex justify-center items-center min-h-screen">
        <div class="ml-48 bg-white p-8 rounded shadow-md w-full sm:w-96">
            <h1 class="text-black text-3xl font-semibold mb-4 text-center">Change Password</h1>
            <form method="POST" action="/admin/password/update">
    
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

</x-admin_layout>