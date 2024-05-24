<x-layout>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <article
            class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
            <div class="py-6 px-5 lg:flex">
                <div class="flex-1 lg:mr-8">
                    <img src="{{ asset('images/all_image/' . $product->thumbnail) }}" alt="Product Image" class="rounded-xl">
                </div>

                <div class="flex-1 flex flex-col justify-between">
                    <header class="mt-8 lg:mt-0">
                        <div>
                            @admin
                                <a href="/admin/products">Back to Products</a>
                                
                                @else
                                <a href="/">Back to Products</a>
                            @endadmin
                        </div>
                        <a href="/?category={{ $product->category->slug }}"
                            class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                            style="font-size: 10px">{{ $product->category->name }}</a>

                        <div class="mt-4">
                            <h1 class="text-3xl">
                                {{ $product->title }}
                            </h1>

                            <span class="mt-2 block text-gray-400 text-xs">
                                    Published <time>{{ $product->created_at->diffForHumans() }}</time>
                                </span>
                        </div>
                    </header>

                    <div class="text-xl mt-2 space-y-4">
                            {!! $product->body !!}
                    </div>

                    <footer class="flex justify-between items-center mt-8">
                        <div class="flex items-center text-sm">
                            <div class="ml-3">
                                    <h5 class="font-bold text-xl">Price: {{ $product->price }} ₾</h5>
                                    @if ($product->quantity > 0)
                                        <h5 class="font-bold text-lg text-blue-500">Quantity: {{ $product->quantity }}</h5>
                                    @else
                                        <h5 class="font-bold text-lg text-blue-700">This product is out of stock</h5>
                                    @endif
                            </div>
                        </div>
                    </footer>
                </div>
            </div>

        </article>

    </main>
</x-layout>