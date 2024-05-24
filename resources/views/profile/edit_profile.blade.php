<x-layout>

    <div class="container mx-auto py-8">
        <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden shadow-2xl">
            <div class="px-6 py-4">
                <div class="text-xl font-bold text-gray-800 mb-2">User Profile Edit</div>
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
                <form method="POST" action="/profile">

                    @csrf
                    @method('PATCH')

                    <input type="hidden" name="id" value="{{ $user->id }}">

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                        <input class="p-2 mt-1 block w-72 rounded-md border-gray-300 shadow-md focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                        type="text" name="name" id="name" value="{{ $user->name }}">
                    </div>
    
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Username:</label>
                        <input class="p-2 mt-1 block w-72 rounded-md border-gray-300 shadow-md focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                        type="text" name="username" id="username" value="{{ $user->username }}">
                    </div>
    
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                        <input class="p-2 mt-1 block w-72 rounded-md border-gray-300 shadow-md focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                        type="text" name="email" id="email" value="{{ $user->email }}">
                    </div>
    
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Phone:</label>
                        <input class="p-2 mt-1 block w-72 rounded-md border-gray-300 shadow-md focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                        type="text" name="phone" id="phone" value="{{ $user->phone }}">
                    </div>
    
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Address:</label>
                        <input class="p-2 mt-1 block w-72 rounded-md border-gray-300 shadow-md focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                        type="text" name="address" id="address" value="{{ $user->address }}">
                    </div>
    
                    <!-- Logout Button -->
                    <div class="flex justify-end">
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                            Update
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</x-layout>