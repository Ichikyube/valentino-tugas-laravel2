<x-app-layout>
    <section class="bg-white dark:bg-gray-900">
        <div class="relative h-full max-w-screen-xl px-4 py-8 mx-auto bg-yellow-50 lg:py-16 lg:px-6">
            <div class="max-w-screen-sm mx-auto mb-8 text-center lg:mb-16">
                <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 lg:text-4xl dark:text-white">Our Menu</h2>
                <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">We use an agile approach to test assumptions and connect with the needs of your audience early and often.</p>
            </div>
            <div class="grid gap-8 lg:grid-cols-2">
                @each('components.cards.product', $products, 'product', 'components.cards.empty' )
                @forelse ($products as $product)
                    <x-cards.product :product ="$product"/>
                    @if($product->price < 100) @break @endif
                @empty
                    <x-cards.empty/>
                @endforelse

            </div>
        </div>
    </section>
</x-app-layout>





