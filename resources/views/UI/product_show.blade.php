<x-app-layout>

    <input type="hidden" value="{{$product->quantity}}" id="qty" />
    <input type="hidden" value="{{$product->id}}" id="product_id" />
    <div class="">

        <div class="pt-6">
            <nav aria-label="Breadcrumb" class="dark:bg-gray-600 bg-slate-200">
                <ol role="list" class="mx-auto flex max-w-2xl items-center space-x-2 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                    <li>
                        <div class="flex items-center">
                            <a href="{{route('ui.categories')}}"
                                class="mr-2 text-sm font-medium text-gray-900 dark:text-gray-200 dark:hover:text-gray-500">{{__('message.Categories')}}</a>
                            <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true"
                                class="h-5 w-4 text-gray-300">
                                <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                            </svg>
                        </div>
                    </li>
                    @isset($category->main_category)

                    <li>
                        <div class="flex items-center">
                            <a href="{{route('ui.categories', $category->category_id)}}"
                                class="mr-2 text-sm font-medium text-gray-800 dark:text-gray-200 dark:hover:text-gray-500">{{$category->main_category->name}}</a>
                            <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true"
                                class="h-5 w-4 text-gray-300">
                                <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                            </svg>
                        </div>
                    </li>
                    @endisset

                    @isset($category->name)

                    <li class="text-sm">
                        <a href="{{route('ui.products', $category->id)}}" aria-current="page"
                            class="font-medium text-gray-700 hover:text-gray-600 dark:text-gray-200 dark:hover:text-gray-500">{{$category->name}}</a>
                    </li>
                    <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true"
                        class="h-5 w-4 text-gray-300">
                        <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                    </svg>
                    @endisset
                    <li class="text-sm">
                        <a href="{{route('ui.product_show', $product->id)}}" aria-current="page"
                            class="font-medium text-gray-700 hover:text-gray-600 dark:text-gray-200 dark:hover:text-gray-500">{{$product->name}}</a>
                    </li>

                </ol>
            </nav>
            </nav>

            <div
                class="mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-2 justify-items-end lg:gap-4 dark:bg-gray-700 dark:text-gray-200 bg-slate-200 lg:px-8">
                <div class="">
                    @if ($product->product_images)
                    @php
                    $image= App\Models\product_images::where('product_id' , $product->id)->pluck('image')->first()
                    @endphp

                    <img src="{{asset('storage/' .$image)}}"
                        alt="Two each of gray, white, and black shirts laying flat."
                        class="h-full w-full object-cover object-center">
                </div>
                @endif
                <div class="mt-4 lg:row-span-3 lg:mt-0">
                    <h2 class="sr-only">Product information</h2>
                    <p class="text-3xl tracking-tight dark:text-gray-200 text-gray-900">{{$product->price}}</p>
                    <div
                        class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r dark:text-gray-200 lg:border-gray-200 lg:pb-16 lg:pr-8 lg:pt-6">

                        <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                            <h1 class="text-2xl font-bold tracking-tight dark:text-gray-200 text-gray-900 sm:text-3xl">
                                {{$product->name}}</h1>

                            <h3 class="sr-only">Description</h3>

                            <div class="space-y-6">
                                <p class="text-base dark:text-gray-200 text-gray-900">{{$product->description}}</p>
                            </div>
                        </div>

                    </div>
                    @if ($product->quantity > 0)
                    <span
                        class="bg-green-100 p-5 m-6 text-green-800 text-s font-medium mr-4 px-4 py-3.5 rounded ">{{__('ui_lang.The product is available')}}</span>

                    <!-- component -->
                    <div class="custom-number-input p-5 m-6  h-10 w-32">
                        <label for="custom-input-number"
                            class="w-full text-gray-700  dark:text-gray-200 text-sm font-semibold">quantity
                        </label>
                        <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
                            <button data-action="decrement"
                                class=" bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                                <span class="m-auto text-2xl font-thin">−</span>
                            </button>
                            <input type="number"
                                class=" focus:outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none"
                                name="custom-input-number" id="qty_val" value="1" />
                            <button data-action="increment"
                                class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                                <span class="m-auto text-2xl font-thin">+</span>
                            </button>
                        </div>
                        @else
                        <span
                            class="bg-red-100 text-red-800 text-s font-medium mr-4 px-4 py-3.5 rounded ">{{__('ui_lang.The product is not available')}}</span>

                        @endif

                    </div>
                    <div class=" place-content-end ">
                     <button class=" p-5 rounded-lg m-40 bg-blue-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md
                        shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85]
                        focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none
                        disabled:opacity-50 disabled:shadow-none" onclick="addToCart()">
                        Add product to cart
                    </button>
                    </div>
                </div>

            </div>

        </div>
   

        <script>
            var qty = $('#qty').val();

            function decrement(e) {
                const btn = e.target.parentNode.parentElement.querySelector(
                    'button[data-action="decrement"]'
                );
                const target = btn.nextElementSibling;
                let value = Number(target.value);
                if (value > 1) {
                    value--;
                    target.value = value;
                }
            }

            function increment(e) {
                const btn = e.target.parentNode.parentElement.querySelector(
                    'button[data-action="decrement"]'
                );
                const target = btn.nextElementSibling;
                let value = Number(target.value);
                if (value < qty) {
                    value++;
                    target.value = value;
                }
            }
            const decrementButtons = document.querySelectorAll(
                `button[data-action="decrement"]`
            );
            const incrementButtons = document.querySelectorAll(
                `button[data-action="increment"]`
            );
            decrementButtons.forEach(btn => {
                btn.addEventListener("click", decrement);
            });
            incrementButtons.forEach(btn => {
                btn.addEventListener("click", increment);
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function addToCart() {
                var product_id = $('#product_id').val();
                var qty = $('#qty_val').val();
                $.ajax({
                    method: "POST",
                    url: "{{route('ui.add_to_cart')}}",
                    data: {
                        'product_id': product_id,
                        'qty': qty,
                    },
                    success: function(r) {
                        Swal.fire(r.msg)
                    },
                })
            }
        </script>

</x-app-layout>
