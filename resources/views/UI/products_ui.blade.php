<x-app-layout>
<section class="bg-white py-8 dark:bg-gray-900 dark:text-gray-100">

    <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">

        <nav id="store" class="w-full z-30 top-0 px-6 py-1 bg-gray-800">
            <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">

                <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl  dark:text-gray-100" href="#">
            {{__('message.products')}}
        </a>


                <div class="flex  items-center" id="store-nav-content">




<form accept="{{route('ui.products')}}" class="flex items-center">
    <label for="simple-search" class="sr-only">Search</label>
    <div class="relative w-full">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">

            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
              </svg>

        </div>
        <input type="text" id="simple-search" name="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Product name..." required>
    </div>
    <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
        </svg>
        <span class="sr-only">Search</span>
    </button>
</form>

                </div>
          </div>
          <nav aria-label="Breadcrumb" class="bg-gray-600">
            <ol role="list" class="mx-auto flex max-w-2xl items-center space-x-2 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
              <li>
                <div class="flex items-center">
                  <a href="{{route('ui.categories')}}" class="mr-2 text-sm font-medium text-gray-900 dark:text-gray-200 dark:hover:text-gray-500">{{__('message.Categories')}}</a>
                  <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
                    <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                  </svg>
                </div>
              </li>
              @isset($category->main_category)


              <li>
                <div class="flex items-center">
                  <a href="{{route('ui.categories', $category->category_id)}}" class="mr-2 text-sm font-medium text-gray-900 dark:text-gray-200 dark:hover:text-gray-500">{{$category->main_category->name}}</a>
                  <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
                    <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                  </svg>
                </div>
              </li>
              @endisset


             @isset($category->name)



              <li class="text-sm">
                <a href="{{route('ui.products', $category->id)}}" aria-current="page" class="font-medium text-gray-500 hover:text-gray-600 dark:text-gray-200 dark:hover:text-gray-500">{{$category->name}}</a>
              </li>
              @endisset



            </ol>
          </nav>
        </nav>



        @forelse ($products as $key=> $product )
        <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col">

            <a href="#">
                @if ($product->product_images)


                @php
                $image=  App\Models\product_images::where('product_id' , $product->id)->pluck('image')->first()
              @endphp
                <img class="hover:grow hover:shadow-lg" src="{{asset('storage/'.$image)}}">
                @endif






                <div class="pt-3 flex items-center justify-between">
                    <p class="">{{$product->name}}</p>
                    <svg class="h-6 w-6 fill-current text-gray-500 hover:text-black dark:text-gray-200 dark:hover:text-gray-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12,4.595c-1.104-1.006-2.512-1.558-3.996-1.558c-1.578,0-3.072,0.623-4.213,1.758c-2.353,2.363-2.352,6.059,0.002,8.412 l7.332,7.332c0.17,0.299,0.498,0.492,0.875,0.492c0.322,0,0.609-0.163,0.792-0.409l7.415-7.415 c2.354-2.354,2.354-6.049-0.002-8.416c-1.137-1.131-2.631-1.754-4.209-1.754C14.513,3.037,13.104,3.589,12,4.595z M18.791,6.205 c1.563,1.571,1.564,4.025,0.002,5.588L12,18.586l-6.793-6.793C3.645,10.23,3.646,7.776,5.205,6.209 c0.76-0.756,1.754-1.172,2.799-1.172s2.035,0.416,2.789,1.17l0.5,0.5c0.391,0.391,1.023,0.391,1.414,0l0.5-0.5 C14.719,4.698,17.281,4.702,18.791,6.205z" />
                    </svg>
                </div>
                <p class="pt-1 text-gray-900 dark:text-gray-200 dark:hover:text-gray-600">{{$product->price}} EL</p>
            </a>
        </div>
        @empty
        <div class="w-full  justify-items-center">
        <h3 class="pt-3 text-xl   "> {{__('message.NO Products')}} </h3>
    </div>

        @endforelse




</section>

</x-app-layout>

