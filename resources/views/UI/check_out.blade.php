<x-app-layout>

    <div class="relative mx-auto w-full bg-white">
        <div class="grid min-h-screen grid-cols-10">
          <div class="col-span-full py-6 px-4 sm:py-12 bg-teal-50 lg:col-span-6 lg:py-24">
            @php
            $total = 0 ;
        @endphp



                    <div class="rounded-md">
                          <section>
                                <h2 class="uppercase tracking-wide text-lg font-semibold text-gray-700 my-2">Shipping & Billing Information</h2>
                                <fieldset class="mb-3 bg-white shadow-lg rounded text-gray-600">
                                    <label class="flex border-b border-gray-200 h-12 py-3 items-center">
                                        <span class="text-right px-2">Name</span>
                                        <p class="text-s px-3 text-gray-600 dark:text-gray-400 ">{{Auth::user()->name}}</p>
                                    </label>
                                    <label class="flex border-b border-gray-200 h-12 py-3 items-center">
                                        <span class="text-right px-2">Email</span>
                                        <p class="text-s px-3 text-gray-600 dark:text-gray-400 ">{{Auth::user()->email}}</p>
                                    </label>
                                    <label class="inline-flex w-2/4 border-gray-200 py-3">
                                        <span class="text-right px-2">Phone</span>
                                        <p class="text-s px-3 text-gray-600 dark:text-gray-400 ">{{Auth::user()->phone}}</p>


                                    </label>
                                    <label class="flex border-b border-gray-200 h-12 py-3 items-center">
                                        <span class="text-right px-2">Address</span>
                                        <p class="text-s px-3 text-gray-600 dark:text-gray-400 ">{{Auth::user()->address}}</p>
                                    </label>
                                    <label class="flex border-b border-gray-200 h-12 py-3 items-center">
                                        <span class="text-right px-2">City</span>
                                        <p class="text-s px-3 text-gray-600 dark:text-gray-400 ">{{Auth::user()->city}}</p>

                                    </label>

                                    <label class="flex border-t border-gray-200 h-12 py-3 items-center select relative">
                                        <span class="text-right px-2">Country</span>
                                        <p class="text-s  text-gray-600 dark:text-gray-400 ">{{Auth::user()->country}}</p>


                                        </div>
                                    </label>
                                </fieldset>
                            </section>


                        <section class="rounded-md">

                            <h2 class="uppercase tracking-wide text-lg font-semibold text-gray-700 my-2">Payment Information</h2>
                            <fieldset class="flex border-b border-gray-200 h-12 py-3 items-center">

                                <label class="flex border-b border-gray-900 h-12 py-3 items-center">
                                    <span class="text-right px-2">Card</span>
                                    <input name="card" class="focus:outline-none px-3 w-full" placeholder="Card number MM/YY CVC" required="">
                                </label>
                            </fieldset>
                        </section>

                    <button class="submit-button px-4 py-3 rounded-full bg-teal-700 text-white focus:ring focus:outline-none w-full text-xl font-semibold transition-colors">
                        Pay
                    </button>


          </div>
          <div class="relative col-span-full flex flex-col py-6 pl-8 pr-4 sm:py-12 lg:col-span-4 lg:py-24">
            <h2 class="sr-only ">Order summary</h2>
            <div>
              <img src="https://images.unsplash.com/photo-1581318694548-0fb6e47fe59b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80" alt="" class="absolute inset-0 h-full w-full object-cover" />
              <div class="absolute inset-0 h-full w-full bg-gradient-to-t from-teal-800 to-teal-400 opacity-95"></div>
            </div>
            <div class="relative">
              <ul class="space-y-5">
                @foreach ($carts as $cart )


                <li class="flex justify-between p-3">
                  <div class="inline-flex">

                    @if ($cart->product->product_images)
                    @php
                    $image= App\Models\product_images::where('product_id' , $cart->product_id)->pluck('image')->first()
                    @endphp
                    <img src="{{asset('storage/'.$image)}}" alt="" class="max-h-16" />
                    @endif
                    @php
                    $qty = $cart->qty;
                 $price = $cart->product->price * $qty;

                 $total += $price;
                 @endphp
                    <div class="ml-3">
                      <p class="text-base font-semibold text-white">{{$cart->product->name}}</p>
                      <p class="text-sm font-medium text-white text-opacity-80">Unit price : {{$cart->product->price}}El </p>
                      <p class="text-sm font-medium text-white text-opacity-80">Quantity :{{$cart->qty}}-{{$cart->product->unit_type}} </p>

                    </div>
                  </div>
                  <p class="text-sm font-semibold text-white">{{$price }}EL</p>
                </li>

              </ul>
              @endforeach
              @php
                 $vat = $total * 0.1 ;
                 $TPAD = $total -$vat ;
              @endphp
              <div class="my-5 h-0.5 w-full bg-white bg-opacity-30"></div>
              <div class="space-y-2">
                <p class="flex justify-between text-lg font-bold text-white"><span>Total price:</span><span>{{$total}}</span></p>
                <p class="flex justify-between text-sm font-medium text-white"><span>Vat: 10%</span><span>{{$vat}}</span></p>
                <p class="flex justify-between text-sm font-medium text-white"><span>Total price after discount</span><span>{{$TPAD}}</span></p>

              </div>
            </div>

            <div class="relative mt-10 flex">
              <p class="flex flex-col"><span class="text-sm font-bold text-white">Money Back Guarantee</span><span class="text-xs font-medium text-white">within 30 days of purchase</span></p>
            </div>
          </div>
        </div>
      </div>

    </x-app-layout>
