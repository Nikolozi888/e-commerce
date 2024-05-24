<x-layout>

    <div class="container mx-auto py-8">
        <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden shadow-2xl">
            <div class="px-6 py-4">
                <div class="text-xl font-bold text-gray-800 mb-2">User Profile</div>
                <div class="text-gray-600">Welcome, {{ auth()->user()->name }}!</div>
            </div>
            <div class="px-6 py-4">
                <!-- Profile Information -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                    <span class="text-gray-800">{{ auth()->user()->name }}</span>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                    <span class="text-gray-800">{{ auth()->user()->email }}</span>
                </div>

                <div class="">
                    <label class="block text-blue-700 text-lg font-bold mb-2 underline">
                        <a href="/profile/edit">Edit Profile</a>
                    </label>
                </div>

                <div class="">
                    <label class="block text-yellow-600 text-lg font-bold mb-2 hover:underline">
                        <a href="/user/password/edit">Change Password</a>
                    </label>
                </div>

                <!-- Logout Button -->
                <div class="flex justify-end">
                    <form action="/logout" method="POST">
                        @csrf

                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                            Logout
                        </button>
                    </form>
                </div>

                @admin

                    <br>

                    <div class="mb-4">
                        <a class="text-blue-700 text-lg font-bold" href="/admin/dashboard">Admin Dashboard</a>
                    </div>

                @endadmin

            </div>
        </div>
    </div>

</x-layout>