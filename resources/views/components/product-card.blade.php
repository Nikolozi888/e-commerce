    <div class="bg-white w-80 rounded-2xl overflow-hidden shadow-md">
        <img src="{{ asset('images/all_image/' . $product->thumbnail) }}" alt="Product Image" class="w-full">
        <div class="p-4">
            <h2 class="text-gray-800 font-semibold text-lg">{{ $product->title }}</h2>
            <p class="text-gray-600 mt-2">{{ $product->excerpt }}</p>
            <div class="mt-4 flex justify-between items-center">
                <span class="text-black font-bold text-xl">Price: {{ $product->price }} ₾</span>
                <a href="/products/{{ $product->slug }}" class="block text-blue-500 hover:text-blue-600 mt-4">Read More</a>
            </div>
            
            @admin

            <button class="text-blue-500 border border-blue-500 rounded-full py-1 px-2 transition duration-300 ease-in-out hover:bg-blue-500 hover:text-white">
                {{ $product->status }}
            </button>
            

            @endadmin

        </div>
    </div>