

<div x-cloak x-show="dropdownOpenCart" class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">

    <div x-cloak x-show="dropdownOpenCart" @click="dropdownOpenCart = false" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div x-cloak x-show="dropdownOpenCart" class="fixed  overflow-hidden">
      <div x-cloak x-show="dropdownOpenCart" class="absolute  overflow-hidden">
        <div x-cloak x-show="dropdownOpenCart" class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
          @php
              $total = 0 ;
          @endphp


          <div class="pointer-events-auto w-screen max-w-md">
            <div class="flex h-full flex-col overflow-y-scroll bg-white dark:bg-slate-800 shadow-xl">
              <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                <div class="flex items-start justify-between">
                  <h2 class="text-lg font-medium text-gray-900 dark:text-gray-200" id="slide-over-title">Shopping cart</h2>

                  <div   class="ml-3 flex h-7 items-center">
                    <button type="button" @click="dropdownOpenCart = false"  class="relative -m-2 p-2 text-gray-400 hover:text-gray-500">
                      <span class="absolute -inset-0.5"></span>
                      <span class="sr-only">Close panel</span>
                      <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                      </svg>
                    </button>
                  </div>

                </div>
                <div>
                <img src="{{ asset('storage/'. Auth()->User()->profile_photo) }}" alt="" width=18px height=auto style='border' />
                <p class="text-l font-medium text-gray-900 dark:text-gray-300" id="slide-over-title">{{Auth::User()->name}}</p>
                </div>

                <div class="mt-8">
                  <div class="flow-root">
                    <ul role="list" class="-my-6 divide-y divide-gray-200">


                        @forelse (App\Models\cart::where('user_id', Auth::id())->get() as $cart )
                        <li class="flex py-6">



                        <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                            @if ($cart->product->product_images)
                            @php
                            $image= App\Models\product_images::where('product_id' , $cart->product_id)->pluck('image')->first()
                            @endphp
                          <img src="{{asset('storage/'.$image)}}" alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt." class="h-full w-full object-cover object-center">
                        </div>
                        @endif
                        @php
                        $qty = $cart->qty;
                     $price = $cart->product->price * $qty;

                     $total += $price;
                     @endphp

                        <div class="ml-4 flex flex-1 flex-col">
                          <div>
                            <div class="flex justify-between text-base font-medium dark:text-gray-300 text-gray-900">
                              <h3>
                                <a href="#">{{$cart->product->name}} </a>
                              </h3>
                              <p class="ml-4">{{$price }}EL</p>
                            </div>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Unit price : {{$cart->product->price}}El </p>
                          </div>
                          <div class="flex flex-1 items-end justify-between text-sm">
                            <p class="text-gray-500">Quantity :{{$cart->qty}}-{{$cart->product->unit_type}}</p>


                            <div class="flex">
                                <form method="POST" action="{{ route('ui.cart_destroy' , $cart->id )}}" >
                                    @method('DELETE')
                                      @csrf


                                      <button type="submit"
                                      class=" inline-flex  text-white  items-center bg-red-700 focus:ring-4 focus:ring-red-500  font-medium rounded-lg text-sm px-3 py-2 text-center hover:bg-red-800" >

                                        Delete
                                      </button>
                                  </form>



                            </div>
                          </div>
                        </div>
                      </li>
                      @empty
                      <li class="flex py-6">


                      <h3> There are no products in the cart </h3>
                      </li>

                      @endforelse



                    </ul>
                  </div>
                </div>
              </div>

              <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                <div class="flex justify-between text-base font-medium dark:text-gray-100  text-gray-900">
                  <p>Subtotal</p>
                  <p>{{$total}}</p>
                </div>
                <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
                <div class="mt-6">
                  <a href="{{route('ui.checkOut')}}" class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Checkout</a>
                </div>
                <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                  <p>
                    or
                    <button type="button" @click="dropdownOpenCart = false"  class="font-medium text-indigo-600 hover:text-indigo-500">
                      Continue Shopping
                      <span aria-hidden="true"> &rarr;</span>
                    </button>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
