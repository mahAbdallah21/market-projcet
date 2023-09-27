@extends('layouts.msater')

@section('body')
<div class="flex justify-center items-center h-screen bg-gray-200 px-6">

<div class=" p-6 max-w-sm w-full bg-white shadow-md rounded-md">


        <img class="justify-center  rounded-t-lg" src="{{asset('storage/'.$category->image)}}" alt="" />

    <div class=" justify-items-centeritems-center  p-5">

            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{$category->name}}</h5>
             <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 ">{{$category->meta_title}}</h5>
             <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 ">{{__('message.main category')}}:{{$category->category_id ? $category->main_category->name  : __('message.it is Main Category')}}</h5>
             @if ($category->is_showing === 1)
             <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded ">{{__('message.showing')}}</span>


             @else
             <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded ">{{__('message.Is Not Show')}}</span>


             @endif
             @if ($category->is_popular === 1)
             <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded ">{{__('message.popular')}}</span>


             @else
             <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded ">{{__('message.Is Not popular')}}</span>


             @endif

             <p class="mb-3 font-normal text-lg text-gray-700 ">{{__('message.Description')}}:</p>

        <p class="mb-3 font-normal text-gray-700 ">{{$category->meta_description}}</p>
    </div>
    <div class=" flex items-center justify-between  ">

        <a href="{{route('categories.index')}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ">
            Back

        </a>
        <form method="POST" action="{{ route('categories.destroy' , $category->id )}}" >
            @method('DELETE')
              @csrf


              <button type="submit"
              class=" inline-flex  text-white  items-center bg-red-700 focus:ring-4 focus:ring-red-500  font-medium rounded-lg text-sm px-3 py-2 text-center hover:bg-red-800" >

                Delete
              </button>
          </form>
        <a href="{{route('categories.edit' ,$category->id)}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ">
            Edit

        </a>
    </div>


</div>
</div>



    @endsection
