<x-admin_layout>
    <div class="flex-1 p-10">
        <h2 class="text-2xl font-semibold mb-5">All Products</h2>
        <div class="flex items-center justify-between">
            <a href="/admin/products/create"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Add Product
            </a>
        </div>
        <br>
        <section class="mb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Product Card -->
                    @if ($products->count() > 0)
                        @foreach ($products as $product)
                            <x-product-card-admin :product="$product" />
                        @endforeach

                        @else
                        <h2 class="text-xl font-semibold mb-4">No Product yet, Check back later</h2>
                    @endif
                <!-- End Product Card -->
            </div>
        </section>
    </div>
</x-admin_layout>