<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    .product-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center;
    }

    .product-card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        width: 200px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        position: relative;
    }

    .product-image {
        object-fit: cover;
    }

    .product-name {
        font-size: 14px;
        font-weight: 500;
        margin: 10px 10px 5px 10px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .product-rating {
        display: flex;
        align-items: center;
        margin: 0 10px 5px 10px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .rating-text {
        background-color: #FFD700;
        color: #fff;
        padding: 2px 5px;
        border-radius: 3px;
        font-size: 10px;
        margin-right: 5px;
    }

    .stars i {
        color: #FFD700;
        font-size: 10px;
    }

    .product-category {
        font-size: 14px;
        color: #777;
        margin: 0 10px 5px 10px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .product-price {
        font-size: 20px;
        color: #1b1b1b;
        margin: 0 10px 10px 10px;
        font-weight: bold;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .add-to-cart {
        color: #fff;
        border: none;
        padding: 6px;
        cursor: pointer;
        width: 100%;
        font-size: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 3px;
        margin-top: auto;
    }

    .add-to-cart i {
        margin-right: 3px;
    }

    .add-to-cart:hover {
        background-color: #ff4c4c;
    }
</style>
<div>
    <!-- @extends('main-product') -->
    <div
        style="background-image: url('back/wow.jpg');
        background-size: cover;
        height: 620px;">
        <nav x-data="{ open:  }" class="bg-transparent border-gray-100">
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
                <div class="flex items-center">
                    <div class="hidden hover:border-black sm:-my-px sm:ms-3 sm:flex ml-auto">
                        <div class="col-12">
                            <div class="dropdown">
                                <a id="cart-button" class="btn btn-outline-dark text-white" href="{{ route('productCart') }}">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge text-bg-danger" id="cart-quantity"></span>
                                </a>                                
                            </div>
                        </div>
                    </div>
                    <x-app-layout></x-app-layout>
                </div>
            </div>

            <div class=''>
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
            <p class='text-center font-bold text-[40px] font-["MyCustomFont-Bold"]'>CATEGORY</p>
            <p class='text-center text-[20px] font-["MyCustomFont-Regular"] -mt-[3px]'>Discover comfortable and functional hiking apparel that keeps you protected and lets you move freely on the trails</p>
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
        <div class='mt-[15px] mb-[20px]'>
            <p class='text-center font-bold text-[40px] font-["MyCustomFont-Bold"]'>PRODUCTS</p>
            <p class='text-center text-[20px] font-["MyCustomFont-Regular"] -mt-[3px]'>Ready to Tackle the Great Outdoors? Start Your Journey with Our Best Hiking Gear, Designed for the Ultimate Adventure</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-6 gap-1 mt-[50px]">
            <div class="">
                <ul class="grid grid-col-4 grid-flow-col gap-4">
                    <li><a href="#" class="tab-cat font-['MyCustomFont-Bold'] active-a" data-id="tab1">Men</a></li>
                    <li><a href="#" class="tab-cat" data-id="tab2">Women</a></li>
                    <li><a href="#" class="tab-cat" data-id="tab3">Kids</a></li>
                </ul>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-6 mt-12">
            @php
                $menProducts = $products->where('category', 'Men')->where('stocks', '>', 0);
                $menProductsArray = $menProducts->toArray();

                $totalProducts = count($menProductsArray);

                shuffle($menProductsArray);

                // Jumlah label Buy 1 Get 1 berdasarkan kelipatan 4
                $buyOneGetOneCount = intdiv($totalProducts, 4);

                // Jumlah label 30% Off berdasarkan kelipatan 6
                $thirtyPercentOffCount = intdiv($totalProducts, 6);

                $buyOneGetOneIndices = [];
                $thirtyPercentOffIndices = [];

                // Mendapatkan indeks untuk Buy 1 Get 1
                if ($buyOneGetOneCount > 0) {
                    $buyOneGetOneIndices = array_rand($menProductsArray, $buyOneGetOneCount);
                    if (!is_array($buyOneGetOneIndices)) {
                        $buyOneGetOneIndices = [$buyOneGetOneIndices];
                    }
                }

                // Mendapatkan indeks untuk 30% Off
                if ($thirtyPercentOffCount > 0) {
                    $thirtyPercentOffIndices = array_rand($menProductsArray, $thirtyPercentOffCount);
                    if (!is_array($thirtyPercentOffIndices)) {
                        $thirtyPercentOffIndices = [$thirtyPercentOffIndices];
                    }
                }

                // Menggabungkan indeks Buy 1 Get 1 dan 30% Off untuk menghindari duplikasi
                $usedIndices = array_merge($buyOneGetOneIndices, $thirtyPercentOffIndices);

                // Jika ada duplikasi, cari indeks baru untuk 30% Off
                foreach ($thirtyPercentOffIndices as $index) {
                    while (in_array($index, $buyOneGetOneIndices)) {
                        $index = array_rand($menProductsArray, 1);
                    }
                    $usedIndices[] = $index;
                }

                $thirtyPercentOffIndices = array_unique($thirtyPercentOffIndices);
            @endphp
            @forelse ($menProductsArray as $index => $product)
                <div class="product-container tab tab-active" data-id="tab1">
                    <div class="product-card">
                        <img src="{{ asset('storage/' . $product['image']) }}" width="250" height="250" class="product-image mx-auto mb-4" />
                        @if (in_array($index, $buyOneGetOneIndices))
                            <span class="absolute top-0 left-0 w-28 translate-y-4 -translate-x-6 -rotate-45 bg-black text-center text-sm text-white">Buy 1 Get 1</span>
                        @elseif (in_array($index, $thirtyPercentOffIndices))
                            <span class="absolute top-0 left-0 w-28 translate-y-4 -translate-x-6 -rotate-45 bg-black text-center text-sm text-white">30% Off</span>
                        @endif
                        <h2 class="product-name text-black">{{ $product['name'] }}</h2>
                        <div class="product-rating">
                            <span class="rating-text">5.0</span>
                            <span class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                        </div>
                        <p class="product-category">{{ $product['tag'] }}</p>
                        <p class="product-price text-black">IDR {{ number_format($product['price'], 0, ',', '.') }}</p>
                        <input type="hidden" class="product-quantity" value="1">
                        <button class="add-to-cart bg-slate-900 hover:bg-black" data-product-id="{{ $product['id'] }}" data-product-stocks="{{ $product['stocks'] }}">
                            <i class="fas fa-shopping-cart"></i> Add to Cart
                        </button>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center">
                    <p class="text-gray-500">No products available</p>
                </div>
            @endforelse

            @php
                $womenProducts = $products->where('category', 'Women')->where('stocks', '>', 0);
                $womenProductsArray = $womenProducts->toArray();

                $totalProducts = count($womenProductsArray);

                shuffle($womenProductsArray);

                // Jumlah label Buy 1 Get 1 berdasarkan kelipatan 4
                $buyOneGetOneCount = intdiv($totalProducts, 4);

                // Jumlah label 30% Off berdasarkan kelipatan 6
                $thirtyPercentOffCount = intdiv($totalProducts, 6);

                $buyOneGetOneIndices = [];
                $thirtyPercentOffIndices = [];

                // Mendapatkan indeks untuk Buy 1 Get 1
                if ($buyOneGetOneCount > 0) {
                    $buyOneGetOneIndices = array_rand($womenProductsArray, $buyOneGetOneCount);
                    if (!is_array($buyOneGetOneIndices)) {
                        $buyOneGetOneIndices = [$buyOneGetOneIndices];
                    }
                }

                // Mendapatkan indeks untuk 30% Off
                if ($thirtyPercentOffCount > 0) {
                    $thirtyPercentOffIndices = array_rand($womenProductsArray, $thirtyPercentOffCount);
                    if (!is_array($thirtyPercentOffIndices)) {
                        $thirtyPercentOffIndices = [$thirtyPercentOffIndices];
                    }
                }

                // Menggabungkan indeks Buy 1 Get 1 dan 30% Off untuk menghindari duplikasi
                $usedIndices = array_merge($buyOneGetOneIndices, $thirtyPercentOffIndices);

                // Jika ada duplikasi, cari indeks baru untuk 30% Off
                foreach ($thirtyPercentOffIndices as $index) {
                    while (in_array($index, $buyOneGetOneIndices)) {
                        $index = array_rand($womenProductsArray, 1);
                    }
                    $usedIndices[] = $index;
                }

                $thirtyPercentOffIndices = array_unique($thirtyPercentOffIndices);
            @endphp
            @forelse ($womenProductsArray as $index => $product)
                <div class="product-container tab" data-id="tab2">
                    <div class="product-card">
                        <img src="{{ asset('storage/' . $product['image']) }}" width="250" height="250" class="product-image mx-auto mb-4" />
                        @if (in_array($index, $buyOneGetOneIndices))
                            <span class="absolute top-0 left-0 w-28 translate-y-4 -translate-x-6 -rotate-45 bg-yellow-500 text-center text-sm text-white">Buy 1 Get 1</span>
                        @elseif (in_array($index, $thirtyPercentOffIndices))
                            <span class="absolute top-0 left-0 w-28 translate-y-4 -translate-x-6 -rotate-45 bg-yellow-500 text-center text-sm text-white">30% Off</span>
                        @endif
                        <h2 class="product-name text-black">{{ $product['name'] }}</h2>
                        <div class="product-rating">
                            <span class="rating-text">5.0</span>
                            <span class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                        </div>
                        <p class="product-category">{{ $product['tag'] }}</p>
                        <p class="product-price text-black">IDR {{ number_format($product['price'], 0, ',', '.') }}</p>
                        <input type="hidden" class="product-quantity" value="1">
                        <button class="add-to-cart bg-slate-900 hover:bg-black" data-product-id="{{ $product['id'] }}">
                            <i class="fas fa-shopping-cart"></i> Add to Cart
                        </button>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center">
                    <p class="text-gray-500">No products available</p>
                </div>
            @endforelse

            @php
                $kidsProducts = $products->where('category', 'Kids')->where('stocks', '>', 0);
                $kidsProductsArray = $kidsProducts->toArray();

                $totalProducts = count($kidsProductsArray);

                shuffle($kidsProductsArray);

                // Jumlah label Buy 1 Get 1 berdasarkan kelipatan 4
                $buyOneGetOneCount = intdiv($totalProducts, 4);

                // Jumlah label 30% Off berdasarkan kelipatan 6
                $thirtyPercentOffCount = intdiv($totalProducts, 6);

                $buyOneGetOneIndices = [];
                $thirtyPercentOffIndices = [];

                // Mendapatkan indeks untuk Buy 1 Get 1
                if ($buyOneGetOneCount > 0) {
                    $buyOneGetOneIndices = array_rand($kidsProductsArray, $buyOneGetOneCount);
                    if (!is_array($buyOneGetOneIndices)) {
                        $buyOneGetOneIndices = [$buyOneGetOneIndices];
                    }
                }

                // Mendapatkan indeks untuk 30% Off
                if ($thirtyPercentOffCount > 0) {
                    $thirtyPercentOffIndices = array_rand($kidsProductsArray, $thirtyPercentOffCount);
                    if (!is_array($thirtyPercentOffIndices)) {
                        $thirtyPercentOffIndices = [$thirtyPercentOffIndices];
                    }
                }

                // Menggabungkan indeks Buy 1 Get 1 dan 30% Off untuk menghindari duplikasi
                $usedIndices = array_merge($buyOneGetOneIndices, $thirtyPercentOffIndices);

                // Jika ada duplikasi, cari indeks baru untuk 30% Off
                foreach ($thirtyPercentOffIndices as $index) {
                    while (in_array($index, $buyOneGetOneIndices)) {
                        $index = array_rand($kidsProductsArray, 1);
                    }
                    $usedIndices[] = $index;
                }

                $thirtyPercentOffIndices = array_unique($thirtyPercentOffIndices);
            @endphp
            @forelse ($kidsProductsArray as $index => $product)
                <div class="product-container tab" data-id="tab3">
                    <div class="product-card">
                        <img src="{{ asset('storage/' . $product['image']) }}" width="250" height="250" class="product-image mx-auto mb-4" />
                        @if (in_array($index, $buyOneGetOneIndices))
                            <span class="absolute top-0 left-0 w-28 translate-y-4 -translate-x-6 -rotate-45 bg-blue-700 text-center text-sm text-white">Buy 1 Get 1</span>
                        @elseif (in_array($index, $thirtyPercentOffIndices))
                            <span class="absolute top-0 left-0 w-28 translate-y-4 -translate-x-6 -rotate-45 bg-blue-700 text-center text-sm text-white">30% Off</span>
                        @endif
                        <h2 class="product-name text-black">{{ $product['name'] }}</h2>
                        <div class="product-rating">
                            <span class="rating-text">5.0</span>
                            <span class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                        </div>
                        <p class="product-category">{{ $product['tag'] }}</p>
                        <p class="product-price text-black">IDR {{ number_format($product['price'], 0, ',', '.') }}</p>
                        <input type="hidden" class="product-quantity" value="1">
                        <button class="add-to-cart bg-slate-900 hover:bg-black" data-product-id="{{ $product['id'] }}">
                            <i class="fas fa-shopping-cart"></i> Add to Cart
                        </button>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center">
                    <p class="text-gray-500">No products available</p>
                </div>
            @endforelse
        </div>
    </div>
    <footer class="bg-white rounded-lg shadow dark:bg-gray-900 m-4">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <span class="text-sm text-gray-500 block text-center dark:text-gray-400">
                © <?php echo date('Y'); ?> <p class="inline">Daud Anggoro Seto</p>. All Rights Reserved.
            </span>
        </div>
    </footer>


   
    @section('scripts')
    
    <script type="text/javascript">
        $("#cart-button").click(function(e) {
            var isLoggedIn = @json($isLoggedIn);
            if (!isLoggedIn) {
                e.preventDefault();
                alert('Silahkan login terlebih dahulu');
            }
        });
        $(document).ready(function(){ 
            $('.tab-cat').click(function(e){
            e.preventDefault();

            $(".tab").removeClass('tab-active');
            $(".tab[data-id='"+$(this).attr('data-id')+"']").addClass("tab-active");
            $(".tab-cat").removeClass('active-a');
            $(this).parent().find(".tab-cat").addClass('active-a');
            });
        });
        $(".add-to-cart").click(function (e) {
            e.preventDefault();

            var isLoggedIn = @json($isLoggedIn);
            
            if (!isLoggedIn) {
                alert('Silahkan login terlebih dahulu');
                return;
            }

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
                    console.error(xhr.responseText);
                }
            });
        });

    </script>
    @endsection
</div>
