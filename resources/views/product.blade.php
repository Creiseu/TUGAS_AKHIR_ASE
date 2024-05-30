@extends('main-product')
   
@section('content')
    
<div class='grid grid-cols-1 md:grid-cols-6 gap-4 mt-[50px]'>
<!-- {products.data.filter(product => product.category === 'men').map((product) => ( -->
    @forelse ($products as $product)
        <div key={product.id} class='shadow-2xl p-4 rounded-md'>
            <img src="{{ asset('/storage/products/'.$product->image) }}" width="250" height="250" class='mx-auto mb-4' />
            <span class='font-[MyCustomFont-Regular] block'>{{ $product->name }}</span>
            <br />
            <span class='font-[MyCustomFont-Regular] text-[12px] bg-black bg-opacity-10 rounded-sm'>{{ $product->tag }}</span>
            <br />
            <div class='mt-[20px] font-[MyCustomFont-Regular] text-orange-600 text-[20px]'>
                <span>Rp. <span>{{ $product->price }}</span></span>
            </div>
            <!-- <a
                href=''
                class='mt-[10px] bg-black rounded-md text-white pl-[20px] pr-[20px] pt-[3px] pb-[3px] mb-[10px] block mx-auto'
            >Add To Cart</a> -->
            <p class="btn-holder"><button class="mt-[10px] bg-black rounded-md text-white pl-[20px] pr-[20px] pt-[3px] pb-[3px] mb-[10px] block mx-auto add-to-cart" data-product-id="{{ $product->id }}">Add to cart</button></p>
        </div>
    @empty
    @endforelse
</div>
@endsection

@section('scripts')

<script type="text/javascript">
    $(".add-to-cart").click(function (e) {
        e.preventDefault();

        var productId = $(this).data("product-id");
        var productQuantity = $(this).siblings(".product-quantity").val();
        var cartItemId = $(this).data("cart-item-id");

        $.ajax({
            url: "{{ route('add-to-cart') }}",
            method: "POST",
            data: {
                _token: '{{ csrf_token() }}', 
                product_id: productId,
                quantity: productQuantity,
                cart_item_id: cartItemId
            },
            success: function (response) {
                $('#cart-quantity').text(response.cartCount);
                 alert('Cart Updated');
                console.log(response);
            },
            error: function (xhr, status, error) {
                // Handle errors (e.g., display an error message)
                console.error(xhr.responseText);
            }
        });
    });
</script>


@endsection