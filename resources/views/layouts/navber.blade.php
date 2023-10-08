<nav id="header" class="w-full bg-slate-200 dark:bg-slate-900 z-30 top-0 py-1">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-6 py-3">

        <label for="menu-toggle" class="cursor-pointer md:hidden block">
            <svg class="fill-current text-gray-900 dark:text-gray-100" xmlns="http://www.w3.org/2000/svg" width="20"
                height="20" viewBox="0 0 20 20">
                <title>menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </label>
        <input class="hidden" type="checkbox" id="menu-toggle" />

        <div class="hidden md:flex md:items-center md:w-auto w-full order-3 md:order-1" id="menu">
            <nav>
                <ul class="md:flex items-center justify-between text-base text-gray-700 pt-4 md:pt-0">
                    <li><a class="inline-block no-underline hover:text-black dark:text-gray-100 active:text-gray-500 active:font-bold   hover:underline py-2 px-4"
                            href="{{route('ui.home')}}"
                            active="{{request()->routeIs('ui.home')}}">{{__('ui_lang.home')}}</a></li>
                    <li>

                        <button id="mega-menu-full-dropdown-button" data-collapse-toggle="mega-menu-full-dropdown"
                            class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-900 border-b
                         border-gray-100 md:w-auto hover:bg-gray-50 md:hover:bg-transparent md:border-0 hover:hover:text-black md:p-0 dark:text-white md:dark:hover:text-gray-800 dark:hover:bg-gray-700
                          dark:hover:text-black md:dark:hover:bg-transparent dark:border-gray-700">
                            <a href="{{route('ui.categories')}}" {{{route('ui.categories') ? 'archive' : ''}}}>
                                {{__('message.Categories')}}</a>
                            <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg></button>

                    </li>

                    <li><a class="inline-block no-underline hover:text-black dark:text-gray-100  hover:underline py-2 px-4"
                            href="{{route('ui.products')}}"
                            {{{route('ui.products') ? 'archive' : ''}}}>{{__('message.products')}}</a></li>
                    <li><a class="inline-block no-underline hover:text-black dark:text-gray-100  hover:underline py-2 px-4"
                            href="{{route('ui.about')}}"
                            {{{route('ui.about') ? 'archive' : ''}}}>{{__('ui_lang.about')}}</a></li>
                </ul>
            </nav>
        </div>

        <div class="order-1 md:order-2 dark:text-gray-100 ">
            <a class="flex items-center tracking-wide no-underline hover:no-underline font-bold text-sky-600   text-xl "
                href="{{route('ui.home')}}">

                <i class="fa-sharp fa-solid fa-cart-shopping fa-bounce fa-sm "></i>
                MARKET
            </a>
        </div>

        <div class="order-2 md:order-3 flex items-center" id="nav-content">

            <div x-data="{ dropdownOpen1: false }" class="relative">
                <button @click="dropdownOpen1 = ! dropdownOpen1"
                    class=" inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium  overflow-hidden  focus:outline-none">
                    @if ( Config::get('app.locale') == 'ar')

                    <img src="{{ asset('storage/lang/ar.png') }}" alt="" width=30px height=auto style='border' />

                    @else

                    <img src="{{ asset('storage/lang/en.png') }}" alt="" width=30px height=auto style='border' />

                    @endif
                </button>
                <div x-cloak x-show="dropdownOpen1" @click="dropdownOpen1 = false"
                    class="fixed inset-0 z-10 w-full h-full"></div>
                <div x-cloak x-show="dropdownOpen1"
                    class="absolute right-0 z-10 w-48 mt-2 overflow-hidden bg-white rounded-md shadow-xl">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a class="flex justify-center items-center px-4 py-3 -mx-2 text-gray-600 hover:text-white hover:bg-indigo-600"
                        rel="alternate" hreflang="{{ $localeCode }}"
                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native']}}
                        @if ($properties['native'] =='English')
                        <img src="{{ asset('storage/lang/en.png') }}" alt="" width=20px height=auto style='border' />

                        @else

                        <img src="{{ asset('storage/lang/ar.png') }}" alt="" width=20px height=auto style='border' />
                        @endif

                    </a>
                    @endforeach
                </div>
            </div>

@if (Route::has('login'))

@auth
<div class="">
    <x-dropdown align="right" width="48">
        <x-slot name="trigger">
            <button
                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                <div>{{ Auth::user()->name }}</div>



            </button>
        </x-slot>

        <x-slot name="content">
            <x-dropdown-link :href="route('profile.edit')">
                {{ __('Profile') }}
            </x-dropdown-link>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
        </x-slot>
    </x-dropdown>
</div>


            <div x-data="{ dropdownOpenCart: false }" class="relative">
                <div class="t-0 absolute left-8">
                    <p class="flex h-1 w-1 items-center justify-center rounded-full bg-red-500 p-3 text-xs text-white">{{App\models\cart::where('user_id' ,Auth::id())->count()}}</p>
                  </div>
                <button @click="dropdownOpenCart = ! dropdownOpenCart"
                    class=" inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium  overflow-hidden  focus:outline-none">

                    <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24">
                        <path
                            d="M21,7H7.462L5.91,3.586C5.748,3.229,5.392,3,5,3H2v2h2.356L9.09,15.414C9.252,15.771,9.608,16,10,16h8 c0.4,0,0.762-0.238,0.919-0.606l3-7c0.133-0.309,0.101-0.663-0.084-0.944C21.649,7.169,21.336,7,21,7z M17.341,14h-6.697L8.371,9 h11.112L17.341,14z" />
                        <circle cx="10.5" cy="18.5" r="1.5" />
                        <circle cx="17.5" cy="18.5" r="1.5" />
                    </svg>
                </button>
                <x-cart></x-cart>

            </div>
            @else
<a href="{{ route('login') }}"
    class="font-semibold text-gray-600 ml-4 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
    in</a>

@if (Route::has('register'))
<a href="{{ route('register') }}"
    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
@endif
@endauth
</div>
@endif




    </div>
    <div id="mega-menu-full-dropdown"
        class="mt-1 bg-white hidden border-gray-200 shadow-sm border-y dark:bg-gray-800 dark:border-gray-600">
        <div
            class="grid max-w-screen-xl px-4 py-5 mx-auto text-gray-900 dark:text-white sm:grid-cols-2 md:grid-cols-3 md:px-6">
            <ul aria-labelledby="  mega-menu-full-dropdown-button " class=" md:block "">
                @foreach (App\Models\category::whereNull('category_id')->get() as $category)
                <li>

                    <a href=" {{route('ui.categories' , $category->id)}}"
                class=" rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">

                <div class="font-semibold">{{$category->name}}</div>
                </a>

                </li>
                @endforeach

            </ul>

        </div>
    </div>
</nav>
