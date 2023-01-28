<div>
    <table>
        <tbody>
            @each('components.cards.product', $products, 'product', 'components.cards.empty' )
            @forelse ($products as $product)
                <x-cards.product :product ="$product"/>
                @if($product->price < 100) @break @endif
            @empty
                <x-cards.empty/>
            @endforelse
        </tbody>
    </table>
    {{ info(now()) }}
    {{ products->links() }}
</div>
