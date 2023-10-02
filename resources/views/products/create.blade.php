@extends('layouts.msater')

@section('body')
<h3 class="text-gray-700 text-3xl font-semibold">{{__('message.products')}}</h3>

<div class="mt-8">
    <h4 class="text-gray-600">{{__('message.products')}}</h4>

    <div class="mt-4">
        <div class="p-4 bg-white rounded-md shadow-md">
            <h2 class="text-lg text-gray-700 font-semibold capitalize">{{__('message.Add New product')}}</h2>

            <form method="POST" enctype="multipart/form-data" action="{{route('products.store')}}">
                @csrf
                @method('POST')
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                    <div class="mt-4">
                        <label class="text-gray-700 "
                            for="name_ar">{{__('message.Arabic Name')}}</label>
                        <input class="@error('name_ar') is-invalid @enderror form-input w-full mt-2 rounded-md focus:border-indigo-600" name="name_ar"
                            value="{{old('name_ar')}}" type="text">
                        @error('name_ar')
                        <div
                            class="font-regular relative mb-4 block w-full rounded-lg bg-red-600 p-4 text-base leading-5 text-white opacity-100">
                            {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="text-gray-700 "
                            for="name_en">{{__('message.English Name')}}</label>
                        <input class="@error('name_en') is-invalid @enderror form-input w-full mt-2 rounded-md focus:border-indigo-600" name="name_en"
                            value="{{old('name_en')}}" type="text">
                        @error('name_en')
                        <div
                            class="font-regular relative mb-4 block w-full rounded-lg bg-red-600 p-4 text-base leading-5 text-white opacity-100">
                            {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="text-gray-700 "
                            for="price">{{__('message.price')}}</label>
                        <input class=" @error('price') is-invalid @enderror form-input w-full mt-2 rounded-md focus:border-indigo-600" name="price"
                            value="{{old('price')}}" type="number">
                        @error('price')
                        <div
                            class="font-regular relative mb-4 block w-full rounded-lg bg-red-600 p-4 text-base leading-5 text-white opacity-100">
                            {{ $message }}</div>
                        @enderror
                    </div>



                    <div class="">
                        <label class="text-gray-700" for="category_id">{{__('message.Select Category')}}</label>

                        <div class="relative inline-flex w-full self-center">

                            <select name="category_id" @error('category_id') is-invalid @enderror
                                class="text-2xl  font-bold rounded border-2 border-purple-700 text-gray-600 w-full pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">

                                <option disabled selected value="">{{__('message.select one')}}</option>
                                @foreach (App\Models\category::orderBy('name')->pluck('name', 'id')->toArray() as $id =>
                                $name)

                                <option value="{{$id}}">{{$name}}</option>
                                @endforeach
                            </select>


                        </div>
                        @error('category_id')
                        <div
                            class="font-regular relative mb-4 block w-full rounded-lg bg-red-600 p-4 text-base leading-5 text-white opacity-100">
                            {{ $message }}</div>
                        @enderror

                    </div>
                    <div class="mt-4 w-full bg-gray-50 rounded-lg border border-gray-200 ">
                        <div class="flex justify-between items-center py-2 px-3 border-b">
                            <div class="flex flex-wrap items-center divide-gray-200 sm:divide-x">


                                <label for="editor" class="sr-only">{{__('message.Description_en')}}</label>
                            </div>
                        </div>
                        <div class="py-2 px-4 bg-white rounded-b-lg">

                            <textarea id="editor" name="description_en" rows="8"
                                class="block px-0 w-full text-sm text-gray-800 bg-white border-0  focus:ring-0  "
                                placeholder="{{__('message.Description_en')}}"></textarea>
                                @error('description_en')
                                <div
                                    class="font-regular relative mb-4 block w-full rounded-lg bg-red-600 p-4 text-base leading-5 text-white opacity-100">
                                    {{ $message }}</div>
                                @enderror


                        </div>



                        </div>
                        <div class="mt-4 w-full bg-gray-50 rounded-lg border border-gray-200 ">
                            <div class="flex justify-between items-center py-2 px-3 border-b">
                                <div class="flex flex-wrap items-center divide-gray-200 sm:divide-x">


                                    <label for="editor" class="sr-only">{{__('message.Description_ar')}}</label>
                                </div>
                            </div>
                            <div class="py-2 px-4 bg-white rounded-b-lg">

                                <textarea id="editor" name="description_ar" rows="8"
                                    class="block px-0 w-full text-sm text-gray-800 bg-white border-0  focus:ring-0  "
                                    placeholder="{{__('message.Description_ar')}}"></textarea>
                                    @error('description_ar')
                                    <div
                                        class="font-regular relative mb-4 block w-full rounded-lg bg-red-600 p-4 text-base leading-5 text-white opacity-100">
                                        {{ $message }}</div>
                                    @enderror
                            </div>



                            </div>
                    <div class="flex  justify-items-start  w-full">
                        <label for="dropzone-file"
                            class="flex flex-col justify-items-start w-full h-50 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  hover:bg-gray-200 ">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">{{__('message.Click to upload Image')}}</span> or drag
                                    and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX.
                                    800x400px)</p>
                            </div>
                            <input id="dropzone-file" name="image"  type="file"
                                class="@error('image') is-invalid @enderror hidden" />
                            @error('image')
                            <div
                                class="font-regular relative mb-4 block w-full rounded-lg bg-red-600 p-4 text-base leading-5 text-white opacity-100">
                                {{ $message }}</div>
                            @enderror
                        </label>
                    </div>
                    <div class="flex  justify-items-center p-5 w-full">
                        <label class="inline-flex  justify-items-center p-7php">
                            <input type="checkbox" name="is_show" class="form-checkbox h-5 w-5  text-purple-700"><span
                                class="ml-2 text-gray-700">showing</span>
                        </label>

                               </div>

                </div>






                        <div class="flex justify-end  py-2 px-3 border-b">


                            <button type="submit" class="mt-4 bg-purple-500 text-white py-2 px-6 rounded-md hover:bg-purple-800">Save</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>



@endsection

