<x-admin_layout>

    <div class="flex justify-center items-center min-h-screen">
        <div class="ml-48 bg-white p-8 rounded shadow-md w-full sm:w-96">
            <h1 class="text-black text-3xl font-semibold mb-4 text-center">Add Admin</h1>
            <form method="POST" action="/admin/admins">
    
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Role</label>
                    <select class="text-black p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="role" id="role">
                        <option selected="" disabled="">Admin</option>

                    </select>
                </div>

                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Admin Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter Name"
                        class="text-black p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('name') }}" required>
                        
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-4">
                    <label for="username" class="block text-gray-700">Admin Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter Username"
                        class="text-black p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('username') }}" required>
                    
                    @error('username')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Admin Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter Email"
                        class="text-black p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('email') }}" required>
                
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Admin Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter Password"
                        class="text-black p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
    
                </div>
    
                <div class="mb-4">
                    <label for="phone" class="block text-gray-700">Admin Phone Number</label>
                    <input type="tel" id="phone" name="phone" placeholder="Enter Phone"
                        class="text-black p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('phone') }}" required>
                    
                    @error('phone')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
    
                </div>
    
                <div class="mb-4">
                    <label for="address" class="block text-gray-700">Admin Address</label>
                    <textarea id="address" name="address" rows="3" placeholder="Enter Address"
                        class="text-black p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>{{ old('address') }}</textarea>
                    
                    @error('address')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
    
                
                </div>
    
                <div class="text-center">
                    <button type="submit"
                        class="w-full bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50">Register</button>
                </div>
            </form>
        </div>
    </div>

</x-admin_layout>