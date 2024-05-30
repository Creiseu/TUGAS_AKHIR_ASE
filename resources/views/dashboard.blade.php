<div>
    <!-- @extends('main-product') -->
    <div
        style="background-image: url('back/wow.jpg');
        background-size: cover;
        height: 620px;">
        <nav x-data="{ open:  }" class="bg-transparent border-gray-100 animate-slide-down">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto flex justify-between items-center h-16">
                <div class="text-white flex items-center">
                    <!-- Left side links -->
                    <div class="hidden hover:border-black sm:-my-px sm:ms-3 sm:flex">
                        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            Men
                        </a>
                    </div>
                    <div class="hidden hover:border-black sm:-my-px sm:ms-3 sm:flex">
                        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            Women
                        </a>
                    </div>
                    <div class="hidden hover:border-black sm:-my-px sm:ms-3 sm:flex">
                        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            Kids
                        </a>
                    </div>
                    <div class="hidden hover:border-black sm:-my-px sm:ms-3 sm:flex">
                        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            New & Featured
                        </a>
                    </div>
                    <div class="hidden hover:border-black sm:-my-px sm:ms-3 sm:flex">
                        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            Gift
                        </a>
                    </div>
                </div>

                <!-- Right side content -->
                <div class="text-white flex items-center">
                    <div class="hidden hover:border-black sm:-my-px sm:ms-3 sm:flex ml-auto">

                        <div class="col-12">
                            <div class="dropdown" >
                                <a class="btn btn-outline-dark" href="{{ route('cart.index') }}">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge text-bg-danger" id="cart-quantity">0</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <x-app-layout></x-app-layout>
                </div>
            </div>

            <div class='animate-slide-down'>
                <div>
                    <div class="font-semibold text-center box-content h-[200px] w-[1270px] ml-14 mt-[180px] text-white text-[60px]">
                        Trusted Hiking Gear For Your Adventures
                    </div>
                    <a href="">
                        <svg width="60px" height="60px" class="ml-[650px] mt-[130px] animate-bounce" viewBox="0 0 20.00 20.00" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>arrow_down [#338]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke-width="0.0002" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-220.000000, -6684.000000)" fill="#ffffff"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M164.292308,6524.36583 L164.292308,6524.36583 C163.902564,6524.77071 163.902564,6525.42619 164.292308,6525.83004 L172.555873,6534.39267 C173.33636,6535.20244 174.602528,6535.20244 175.383014,6534.39267 L183.70754,6525.76791 C184.093286,6525.36716 184.098283,6524.71997 183.717533,6524.31405 C183.328789,6523.89985 182.68821,6523.89467 182.29347,6524.30266 L174.676479,6532.19636 C174.285736,6532.60124 173.653152,6532.60124 173.262409,6532.19636 L165.705379,6524.36583 C165.315635,6523.96094 164.683051,6523.96094 164.292308,6524.36583" id="arrow_down-[#338]"> </path> </g> </g> </g> </g></svg>
                    </a>
                </div>
                <div class="text-right text-white font-mono -mt-[240px] mr-[130px]">
                    <span class='bg-black'>- Bringing You Closer To Nature</span>
                </div>
            </div>
            <!-- Responsive Navigation Menu -->

        </nav>
    </div>
    <div>
        <div class='mt-[15px] mb-[20px]'>
            <p class='text-center font-bold text-[40px] font-["MyCustomFont-Bold"]'>- CATEGORY -</p>
            <p class='text-center text-[15px] font-["MyCustomFont-Regular"] -mt-[15px]'>Discover comfortable and functional hiking apparel that keeps you protected and lets you move freely on the trails</p>
        </div>
        <div class='flex'>
            <div class='flex flex-wrap'>  <a href="" style="
                background-image: url('back/men.jpeg');
                width: 250px;
                height: 400px;
                background-size: 300px;
                border-radius: 10px;
                font-size: 40px;
                text-decoration: none
                " class='ml-[20px] mt-[20px] flex items-center justify-center font-["MyCustomFont-Bold"] text-white text-[40px] grayscale hover:grayscale-0'>
                    Men
                </a>
                <div class='grid-rows'>
                <a href="" style="
                    background-image: url('back/woman.jpeg');
                    width: 300px;
                    height: 200px;
                    background-size: 300px;
                    border-radius: 10px;
                    font-size: 40px;
                    text-decoration: none
                " class='ml-[10px] mt-[20px] flex items-center justify-center font-["MyCustomFont-Bold"] text-white text-[40px] grayscale hover:grayscale-0'>
                    Women
                </a>
                <a href="" style="
                    background-image: url('back/kid3.jpg');
                    width: 300px;
                    height: 180px;
                    background-size: 300px;
                    border-radius: 10px;
                    font-size: 40px;
                    text-decoration: none
                " class='ml-[10px] mt-[20px] flex items-center justify-center font-["MyCustomFont-Bold"] text-white text-[40px] grayscale hover:grayscale-0'>
                    Kid
                </a>
                </div>
            </div>
            <div class='w-1/2 ml-[80px] shadow-2xl mt-[20px] rounded-[10px] flex'>
                <div style="
                    background-image: url('back/discount.jpg');
                    width: 900;
                    height: 400;
                    border-radius: 10px;
                    background-size: 280px;">
                </div>
                <div class='flex flex-col'>
                    <span class='text-[30px] text-left font-["MyCustomFont-Bold"] mt-[px] ml-[20px] overflow-hidden text-clip'>  Elevate Now Your Hiking Experience<br/>Save Up to 25% Off</span>
                    <span class='mt-[20px] ml-[20px]'><span class='font-bold italic font-["MyCustomFont-Bold"]'>Ready to conquer the trails?</span> <span class='font-["MyCustomFont-Regular"]'>Gear up for your next adventure with incredible savings on all the essentials you need. we have everything to make your next trek unforgettable.</span></span>
                    <div class='flex flex-row mt-[10px]'>
                        <span class='text-[80px] ml-[20px] font-bold'>50%</span>
                        <div class='flex flex-col'>
                            <span class='mt-[25px] ml-[15px] font-["MyCustomFont-Regular"]'>Don't Miss Out!!!</span>
                            <button type='button' class='ml-[15px] mt-[14px] bg-black rounded-md text-white font-["MyCustomFont-Bold"]'>Shop Now!!</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <div class='grid grid-cols-1 mt-[50px] ml-[25px]'>
        <div class="grid grid-cols-1 md:grid-cols-6 gap-1 mt-[50px]">
            <div class="">
                <ul class="grid grid-col-4 grid-flow-col gap-4">
                    <li><a href="#" class="tab-a font-['MyCustomFont-Bold'] active-a" data-id="tab1">Men</a></li>
                    <li><a href="#" class="tab-a" data-id="tab2">Women</a></li>
                    <li><a href="#" class="tab-a" data-id="tab3">Kids</a></li>
                </ul>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-6 mt-12">
            @forelse ($products->where('category', 'Men') as $product)
                <div key={product.id} class='shadow-2xl p-4 rounded-md tab tab-active' data-id="tab1">
                    <img src="{{ asset('storage/' . $product->image) }}" width="250" height="250" class='mx-auto mb-4' />
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
                    <input type="hidden" class="product-quantity" value="1">
                    <p data-product-belong="{{ Auth::user()->id }}" hidden>{{ Auth::user()->id }}</p>
                    <p class="btn-holder"><button class="mt-[10px] bg-black rounded-md text-white pl-[20px] pr-[20px] pt-[3px] pb-[3px] mb-[10px] block mx-auto add-to-cart" data-product-id="{{ $product->id }}">Add to cart</button></p>
                </div>
            @empty
            <div class="col-span-full text-center">
                <p class="text-gray-500">No products available</p>
            </div>
            @endforelse
            @forelse ($products->where('category', 'Women') as $product)
                <div key={product.id} class='shadow-2xl p-4 rounded-md tab' data-id="tab2">
                    <img src="{{ asset('storage/' . $product->image) }}" width="250" height="250" class='mx-auto mb-4' />
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
                    <input type="hidden" class="product-quantity" value="1">
                    <p data-product-belong="{{ Auth::user()->id }}" hidden>{{ Auth::user()->id }}</p>
                    <p class="btn-holder"><button class="mt-[10px] bg-black rounded-md text-white pl-[20px] pr-[20px] pt-[3px] pb-[3px] mb-[10px] block mx-auto add-to-cart" data-product-id="{{ $product->id }}">Add to cart</button></p>
                </div>
            @empty
            <div class="col-span-full text-center">
                <p class="text-gray-500">No products available</p>
            </div>
            @endforelse
            @forelse ($products->where('category', 'Kids') as $product)
                <div key={product.id} class='shadow-2xl p-4 rounded-md tab' data-id="tab3">
                    <img src="{{ asset('storage/' . $product->image) }}" width="250" height="250" class='mx-auto mb-4' />
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
                    <input type="hidden" class="product-quantity" value="1">
                    <p data-product-belong="{{ Auth::user()->id }}" hidden>{{ Auth::user()->id }}</p>
                    <p class="btn-holder"><button class="mt-[10px] bg-black rounded-md text-white pl-[20px] pr-[20px] pt-[3px] pb-[3px] mb-[10px] block mx-auto add-to-cart" data-product-id="{{ $product->id }}">Add to cart</button></p>
                </div>
            @empty
            <div class="col-span-full text-center">
                <p class="text-gray-500">No products available</p>
            </div>
            @endforelse
        </div>
    </div>
   
    @section('scripts')
    
    <script type="text/javascript">
        $(document).ready(function(){ 
            $('.tab-a').click(function(e){
            e.preventDefault(); // Prevent default link behavior (scrolling to top)

            $(".tab").removeClass('tab-active');
            $(".tab[data-id='"+$(this).attr('data-id')+"']").addClass("tab-active");
            $(".tab-a").removeClass('active-a');
            $(this).parent().find(".tab-a").addClass('active-a');
            });
        });
        $(".add-to-cart").click(function (e) {
            e.preventDefault();
    
            var productId = $(this).data("product-id");
            var productBelong = $(this).data("product-belong");
            var productQuantity = $(this).siblings(".product-quantity").val();
            var cartItemId = $(this).data("cart-item-id");
    
            $.ajax({
                url: "{{ route('add-to-cart') }}",
                method: "POST",
                data: {
                    _token: '{{ csrf_token() }}', 
                    product_id: productId,
                    product_belong: productBelong,
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
</div>
