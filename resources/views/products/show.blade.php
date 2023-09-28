@extends('layouts.msater')

@section('body')
<div class="flex justify-center items-center h-screen bg-gray-200 px-6">

<div class=" p-6 max-w-sm w-full bg-white shadow-md rounded-md">

    @php
    $image=  App\Models\product_images::where('product_id' , $product->id)->pluck('image')->first()
  @endphp

        <img class="justify-center  rounded-t-lg" src="{{asset('storage/'.$image)}}" alt="" />
       

    <div class=" justify-items-centeritems-center  p-5">

            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{$product->name}}</h5>

             <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 ">{{__('message.Category')}} : {{$product->category_id ? $product->category->name : ''}}</h5>

                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 ">
                <span class="text-3xl font-bold text-gray-900 ">{{$product->price}}EL</span></h5>


             @if ($product->is_show === 1)
             <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded ">{{__('message.showing')}}</span>


             @else
             <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded ">{{__('message.Is Not Show')}}</span>


             @endif


             <p class="mb-3 font-normal text-lg text-gray-700 ">{{__('message.Description')}}:</p>

        <p class="mb-3 font-normal text-gray-700 ">{{$product->description}}</p>
    </div>
    <div class=" flex items-center justify-between  ">

        <a href="{{route('products.index')}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ">
            Back

        </a>
        <form method="POST" action="{{ route('products.destroy' , $product->id )}}" >
            @method('DELETE')
              @csrf


              <button type="submit"
              class=" inline-flex  text-white  items-center bg-red-700 focus:ring-4 focus:ring-red-500  font-medium rounded-lg text-sm px-3 py-2 text-center hover:bg-red-800" >

                Delete
              </button>
          </form>
        <a href="{{route('products.edit' ,$product->id)}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ">
            Edit

        </a>
    </div>


</div>
</div>



    @endsection
