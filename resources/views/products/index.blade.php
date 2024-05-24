<x-layout>
    <div>
        <div class="container mx-auto px-4 py-6">
            <h2 class="text-xl font-semibold mb-4">Categories</h2>
            <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <!-- Category Card -->
                <li class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition duration-300">
                        <div class="justify-between items-center m-5">
                            @foreach ($categories as $category)
                                <a href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}"
                                    class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                                    style="font-size: 10px">{{ $category->name }}</a>
                            @endforeach
                        </div>
                </li>
                <!-- End Category Card -->
                <!-- Repeat Category Cards as needed -->
            </ul>
        </div>
        <div class="w-80 h-16 ml-24 relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="/">
    
                <input type="text" name="search" placeholder="Find something"
                       class="bg-transparent placeholder-black font-semibold text-lg"
                       value="{{ request('search') }}">
            </form>
        </div>
        <!-- Search -->
        
    
        <main class="container mx-auto px-4 py-6">
            <!-- Featured Products -->
            <section class="mb-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Product Card -->
                        @if ($products->count() > 0)

                            @foreach ($products as $product)

                                @if ($product['status'] == 'show')
                                    <x-product-card :product="$product" />
                                @endif
                        
                            @endforeach
                    

                            {{ $products->links() }}

                            @else
                            <h2 class="text-xl font-semibold mb-4">No Product yet, Check back later</h2>
                        @endif
                    <!-- End Product Card -->
                </div>
                
            </section>
            <!-- End Featured Products -->
        </main>
    </div>

    @include('components.about')
    <br>
    <br>
    @include('components.contact')
    <br>
    <br>

</x-layout>