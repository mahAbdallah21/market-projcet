<x-app-layout>

    <div class="bg-white py-8 dark:bg-gray-900 dark:text-gray-100">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl py-16 sm:py-24 lg:max-w-none lg:py-32">

                <nav id="store" class="w-full z-30 top-0 px-6 bg-gray-800 py-1">
                    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">

                        <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl  dark:text-gray-100"
                            href="#">
                            {{__('message.Categories')}}
                        </a>

                        <div class="flex  items-center" id="store-nav-content">

                            <form accept="{{route('ui.categories')}}" class="flex items-center">
                                <label for="simple-search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">

                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                        </svg>

                                    </div>
                                    <input type="text" id="simple-search" name="search"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Search Category name..." required>
                                </div>
                                <button type="submit"
                                    class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                    <span class="sr-only">Search</span>
                                </button>
                            </form>

                        </div>
                    </div>
                </nav>
                <nav aria-label="Breadcrumb" class="bg-gray-700">
                    <ol role="list"
                        class="mx-auto flex max-w-2xl items-center space-x-2 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
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

                        @isset($main_category_name)

                        <li class="text-sm">
                            <a href="#" aria-current="page"
                                class="font-medium text-gray-500 hover:text-gray-600 dark:text-gray-200 dark:hover:text-gray-500">{{$main_category_name}}</a>
                        </li>
                        @endisset

                    </ol>
                </nav>

                <div class="mt-6 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-6 lg:space-y-0">
                    @forelse ( $categories as $category )

                    <div class="group relative">
                        <div
                            class="relative h-80 w-full overflow-hidden rounded-lg bg-white sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1 group-hover:opacity-75 sm:h-64">
                            <img src="{{asset('storage/'.$category->image)}}"
                                alt="Desk with leather desk pad, walnut desk organizer, wireless keyboard and mouse, and porcelain mug."
                                class="h-full w-full object-cover object-center">
                        </div>
                        <h3
                            class="mt-6 text-sm text-gray-500 dark:text-gray-300 dark:hover:text-gray-400 dark:hover:text-clip">
                            @if ($category->category_id)
                            <a href="{{route('ui.products',$category->id)}}">

                                @else
                                <a href="{{route('ui.categories',$category->id)}}">

                                    @endif
                                    <span class="absolute inset-0dark:text-gray-300 dark:hover:text-gray-400 "></span>
                                    {{$category->name}}
                                </a>
                        </h3>
                        <p class="text-base font-semibold text-gray-900 dark:text-gray-100  ">
                            {{$category->meta_description}}</p>
                    </div>
                    @empty

                    @endforelse

                </div>
            </div>
        </div>

</x-app-layout>
