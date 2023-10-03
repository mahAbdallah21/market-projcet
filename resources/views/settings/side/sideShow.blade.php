@extends('layouts.msater')

@section('body')









<section class="bg-gray-100 ">
    <div class="container px-6 py-10 mx-auto">
        <div class="text-center">
            <h1 class="text-2xl font-semibold text-gray-800 capitalize lg:text-3xl ">Side show</h1>

            <p class="max-w-lg mx-auto mt-4 text-gray-500">

            </p>
        </div>
        <div class="flex rounded-md bg-gray-100 py-4 px-4 justify-end justify-items-end ">
            <button type="'button"
                class="px-6 py-3 bg-purple-600 rounded-md text-white font-medium tracking-wide hover:bg-purple-900 ml-3"><a
                    href="{{route('side.create')}}">Add New Side show</a></button>

        </div>

        <div class="grid gap-2 grid-cols-2 grid-rows-2  mt-8">
            @forelse ( $sideshow as $side )
            <div>
                <img class="relative z-10 object-cover w-full rounded-md h-96" src="{{asset('storage/' .$side->image)}}" alt="">

                <div class="relative z-20 max-w-lg p-6 mx-auto -mt-20 bg-white rounded-md shadow ">
                    <div class="flex items-center justify-between ">
                    <a href="#" class="font-semibold text-gray-800 hover:underline  md:text-xl">
                        {{$side->title}}
                    </a>
                    <div >
                        @if ($side->is_showing === 1)

                        <span
                            class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full ">
                            <span class="w-2 h-2 mr-1 bg-green-500 rounded-full"></span>
                            Available
                        </span>

                        @else


                        <span
                            class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full ">
                            <span class="w-2 h-2 mr-1 bg-red-500 rounded-full"></span>
                            Unavailable
                        </span>


                        @endif

                    </div>
                    </div>


                    <p class="mt-3 text-sm text-gray-500 dark:text-gray-300 md:text-sm">
                        {{$side->description}}

                    </p>

                    <p class="mt-3 text-sm text-blue-500">{{$side->created_at}}</p>
                    <div class="flex items-center justify-between mt-4">
                        <div>
                            <form method="POST" action="{{ route('side.destroy' , $side->id )}}">
                                @method('DELETE')
                                @csrf

                                <button type="submit"
                                    class=" inline-flex  text-white justify-end  items-center bg-red-700 focus:ring-4 focus:ring-red-500  font-medium rounded-lg text-sm px-3 py-2 text-center hover:bg-red-800">

                                    Delete
                                </button>
                            </form>
                        </div>

                        <a href="{{route('side.edit' , $side->id)}}"
                            class="inline-flex items-center px-3 py-2 justify-start text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                            Edit</a>
                    </div>
                </div>

            </div>

            @empty

            @endforelse
        </div>


        </div>
    </div>
</section>

@endsection
