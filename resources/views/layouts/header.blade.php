<header class="flex items-center justify-between px-6 py-4 bg-white border-b-4 border-indigo-600">
    <div class="flex items-center">
        <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>

        <div class="relative mx-4 lg:mx-0">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                    <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </span>

            <input class="w-32 pl-10 pr-4 rounded-md form-input sm:w-64 focus:border-indigo-600" type="text" placeholder="Search">
        </div>
    </div>
    <div class="flex items-center">
    <div x-data="{ dropdownOpen1: false }"  class="relative">
        <button @click="dropdownOpen1 = ! dropdownOpen1" class=" inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium  overflow-hidden rounded-full shadow focus:outline-none">
            @if ( Config::get('app.locale')  == 'ar')
                {{ LaravelLocalization::getCurrentLocaleName() }}
                <i class="fa-solid fa-language" style="color: #2066df;"></i>

            @else
                {{ LaravelLocalization::getCurrentLocaleName() }}
                <i class="fa-solid fa-language" style="color: #2066df;"></i>

            @endif
        </button>
        <div x-cloak x-show="dropdownOpen1" @click="dropdownOpen1 = false" class="fixed inset-0 z-10 w-full h-full"></div>
        <div x-cloak x-show="dropdownOpen1" class="absolute right-0 z-10 w-48 mt-2 overflow-hidden bg-white rounded-md shadow-xl">
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <a class="flex items-center px-4 py-3 -mx-2 text-gray-600 hover:text-white hover:bg-indigo-600" rel="alternate"
                 hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                    {{ $properties['native'] }}
                </a>
            @endforeach
        </div>
    </div>




        <div x-data="{ dropdownOpen: false }"  class="relative">
            <button @click="dropdownOpen = ! dropdownOpen" class=" inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium  overflow-hidden rounded-full shadow focus:outline-none">
               @if(Auth::user())
               {{-- <img src="{{ asset('storage/'. Auth()->User()->profile_photo) }}" alt="" width=18px height=auto style='border /> --}}
                    <div>{{ Auth::user()->name }}</div>

               @endif


                <div class="ml-1">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </button>

            <div x-cloak x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 z-10 w-full h-full"></div>

            <div x-cloak x-show="dropdownOpen" class="absolute right-0 z-10 w-48 mt-2 overflow-hidden bg-white rounded-md shadow-xl">
                <a href="{{route('profile.edit')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">  {{ __('Profile') }}</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                <a href="{{route('logout')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white"
                 onclick="event.preventDefault();
                    this.closest('form').submit();">
    {{ __('Log Out') }}</a>
            </div>
        </div>
    </div>
</header>
