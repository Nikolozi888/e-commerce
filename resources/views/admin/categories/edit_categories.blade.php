<x-admin_layout>
    <div class="flex-1 p-10">
        <h2 class="text-2xl font-semibold mb-5">Edit Category</h2>
        <a href="/admin/categories/{{ $category->id }}/edit" class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Return to default</a>
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

        <form class="mb-8" action="/admin/categories/{{ $category->id }}" method="POST">
            @csrf
            @method('PATCH')

            <input type="hidden" name="id" value="{{ $category->id }}">
            
            <div class="mb-4">
                <label for="title" class="block text-yellow-300 font-bold mb-2">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter New Category Name"
                class="appearance-none border rounded w-96 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $category->name }}">
            </div>

            <div class="mb-4">
                <label for="slug" class="block text-yellow-300 font-bold mb-2">Slug</label>
                <input type="text" id="slug" name="slug" placeholder="Enter New Category Slug"
                    class="appearance-none border rounded w-96 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $category->slug }}">
            </div>
            
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update Category
                </button>
            </div>
        </form>
    </div>
</x-admin_layout>