<x-admin_layout>

    <div class="flex justify-center items-center min-h-screen">
        <div class="ml-48 bg-white p-8 rounded shadow-md w-full sm:w-96">
            <h1 class="text-black text-3xl font-semibold mb-4 text-center">Edit Admin</h1>
            <a href="/admin/admins/{{ $admin->id }}/edit" class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Return to default</a>
            <br>
            <br>
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="/admin/admins/{{ $admin->id }}">
    
                @csrf
                @method('PATCH')

                <input type="hidden" name="id" value="{{ $admin->id }}">

                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Role</label>
                    <select class="text-black p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="role" id="role">
                        <option selected="" disabled="">Admin</option>

                    </select>
                </div>

                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Admin Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter Name"
                        class="text-black p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $admin->name }}" required>
                        
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-4">
                    <label for="username" class="block text-gray-700">Admin Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter Username"
                        class="text-black p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $admin->username }}" required>
                    
                    @error('username')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Admin Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter Email"
                        class="text-black p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $admin->email }}" required>
                
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-4">
                    <label for="phone" class="block text-gray-700">Admin Phone Number</label>
                    <input type="tel" id="phone" name="phone" placeholder="Enter Phone"
                        class="text-black p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $admin->phone }}" required>
                    
                    @error('phone')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
    
                </div>
    
                <div class="mb-4">
                    <label for="address" class="block text-gray-700">Admin Address</label>
                    <textarea id="address" name="address" rows="3" placeholder="Enter Address"
                        class="text-black p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>{{ $admin->address }}</textarea>
                    
                    @error('address')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
    
                
                </div>
    
                <div class="text-center">
                    <button type="submit"
                        class="w-full bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        Update Admin    
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-admin_layout>