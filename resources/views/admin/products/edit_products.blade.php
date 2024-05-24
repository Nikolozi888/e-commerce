<x-admin_layout>
    <div class="flex-1 p-10">
        <h2 class="text-2xl font-semibold mb-5">Edit Products</h2>
        <a href="/admin/products/{{ $product->id }}/edit" class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Return to default</a>
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

        <form class="mb-8" method="POST" action="/admin/products/{{ $product->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <input type="hidden" name="id" value="{{ $product->id }}">

            <div class="mb-4">
                <label for="category_id" class="block text-yellow-300 font-bold mb-2">Category</label>
                <select class="text-black w-48 p-1 rounded-lg" name="category_id" id="category_id">
                    <option selected="" disabled="">Select Category</option>
                    @foreach (\App\Models\Category::all() as $category)
                        <option class="text-black" value="{{ $category->id }}"
                            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}
                            >{{ ucwords( $category->name) }}</option>
                    @endforeach

                </select>
            </div>

            <div class="mb-4">
                <label for="status" class="block text-yellow-300 font-bold mb-2">Status</label>
                <select class="text-black w-48 p-1 rounded-lg" name="status" id="status">
                    <option class="text-black" value="{{ $product['status'] }}">{{ $product['status'] }}</option>
                    <option class="text-black" value="show">Show</option>
                    <option class="text-black" value="hidden">Hidden</option>
                </select>
            </div>
            
            <div class="mb-4">
                <label for="slug" class="block text-yellow-300 font-bold mb-2">Slug</label>
                <input type="text" id="slug" name="slug" placeholder="Enter Slug"
                    class="appearance-none border rounded w-96 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $product->slug }}">
            </div>
            <div class="mb-4">
                <label for="title" class="block text-yellow-300 font-bold mb-2">Title</label>
                <input type="text" id="title" name="title" placeholder="Enter Title"
                    class="appearance-none border rounded w-96 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $product->title }}">
            </div>
            <div class="mb-4">
                <label for="thumbnail" class="block text-yellow-300 font-bold mb-2">Thumbnail</label>
                <input type="file" id="thumbnail" name="thumbnail"
                    class="appearance-none border rounded w-96 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ asset('images/all_image/' . $product->thumbnail) }}">
                
                <br>
                <br>

                <img src="{{ asset('images/all_image/' . $product->thumbnail) }}" alt="Product Image" class="rounded-xl max-w-md">

            </div>
                <br>
            <div class="mb-4">
                <label for="excerpt" class="block text-yellow-300 font-bold mb-2">Excerpt</label>
                <textarea id="excerpt" name="excerpt" placeholder="Enter Excerpt"
                    class="resize-none border rounded w-96 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $product->excerpt }}</textarea>
            </div>
            <div class="mb-4">
                <label for="body" class="block text-yellow-300 font-bold mb-2">Body</label>
                <textarea id="body" name="body" placeholder="Enter Body"
                    class="resize-none border rounded w-96 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $product->body }}</textarea>
            </div>
            <div class="mb-4">
                <label for="body" class="block text-yellow-300 font-bold mb-2">Price</label>
                <input type="number" min="0" id="price" name="price" placeholder="Enter Price"
                class="resize-none border rounded w-96 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $product->price }}">
            </div>
            <div class="mb-4">
                <label for="body" class="block text-yellow-300 font-bold mb-2">Quantity</label>
                <input type="number" min="0" id="quantity" name="quantity" placeholder="Enter Quantity"
                    class="resize-none border rounded w-96 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $product->quantity }}">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update Product
                </button>
            </div>
        </form>
    </div>
</x-admin_layout>