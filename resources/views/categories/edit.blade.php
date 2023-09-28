@extends('layouts.msater')
@section('body')
<h3 class="text-gray-700 text-3xl font-semibold">{{__('message.Categories')}}</h3>



<div class="mt-8">
    <h4 class="text-gray-600">{{__('message.Category')}}</h4>

    <div class="mt-4">
        <div class="p-4 bg-white rounded-md shadow-md">
            <h2 class="text-lg text-gray-700 font-semibold capitalize">{{__('message.Add New Category')}}</h2>

                <form method="POST" enctype="multipart/form-data"   action="{{route('categories.update' ,$category->id)}}"  class="mt-6 space-y-6">
                    @csrf
                    @method('put')

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                        <div  class="mt-4">
                            <label class="text-gray-700 @error('name_ar') is-invalid @enderror" for="name_ar" >{{__('message.Arabic Name')}}</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" name="name_ar" value="{{old('name_ar', $category->getTranslation('name', 'ar'))}}"
                                type="text">
                                @error('name_ar')
                           <div class="font-regular relative mb-4 block w-full rounded-lg bg-red-600 p-4 text-base leading-5 text-white opacity-100">{{ $message }}</div>
                         @enderror
                        </div>
                        <div  class="mt-4">
                            <label class="text-gray-700 @error('name_en') is-invalid @enderror" for="name_en" >{{__('message.English Name')}}</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" name="name_en"  value="{{old('name_en', $category->getTranslation('name', 'en'))}}"
                                type="text">
                                @error('name_en')
                                <div class="font-regular relative mb-4 block w-full rounded-lg bg-red-600 p-4 text-base leading-5 text-white opacity-100">{{ $message }}</div>
                              @enderror
                        </div>

                        <div  class="mt-4">
                            <label class="text-gray-700 @error('meta_title_ar') is-invalid @enderror" for="meta_title_ar">{{__('message.Arabic META TITLE')}}</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" name="meta_title_ar" value="{{old('meta_title_ar', $category->getTranslation('meta_title', 'ar'))}}" type="text">
                            @error('meta_title_ar')
                            <div class="font-regular relative mb-4 block w-full rounded-lg bg-red-600 p-4 text-base leading-5 text-white opacity-100">{{ $message }}</div>
                          @enderror
                        </div>
                        <div  class="mt-4">
                            <label class="text-gray-700 @error('meta_title_en') is-invalid @enderror" for="META_TITLE">{{__('message.English META TITLE')}}</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" name="meta_title_en" value="{{old('meta_title_en', $category->getTranslation('meta_title', 'en'))}}" type="text">
                            @error('meta_title_en')
                            <div class="font-regular relative mb-4 block w-full rounded-lg bg-red-600 p-4 text-base leading-5 text-white opacity-100">{{ $message }}</div>
                          @enderror
                        </div>

                        <div class="">
                            <label class="text-gray-700" for="category_id">{{__('message.Select Category')}}</label>


                                <div class="relative inline-flex w-full self-center">

                                    <select name="category_id" class="text-2xl  font-bold rounded border-2 border-purple-700 text-gray-600 w-full pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">

                                        <option disabled selected value="">{{__('message.select one')}}</option>
                                       @if( @empty($category->category_id))
                                        @foreach (App\Models\category::orderBy('name')->pluck('name', 'id')->toArray() as $id =>
                                        $name)
                                        <option  value="{{$id}}">{{$name}}</option>
                                        @endforeach



                                            @else






                                         @foreach (App\Models\category::orderBy('name')->pluck('name', 'id')->toArray() as $id =>
                                         $name)


                                        <option {{$id == old('category_id' , $category->main_category->id) ? 'selected' : ''}} value="{{$id}}">{{$name}}</option>







                                        @endforeach
                                        @endif




                                    </select>

                                </div>

                        </div>
                        <div class="flex items-center justify-center w-full">
                            <label class="inline-flex items-center p-7php">
                                <input type="checkbox" name="is_showing" class="form-checkbox h-5 w-5 text-purple-700"  {{$category->is_showing == 1 ? 'checked' : '' }} ><span class="ml-2 text-gray-700">showing</span>
                            </label>

                            <label class="inline-flex items-center">
                                <input type="checkbox"name="is_popular" class="form-checkbox h-5 w-5 text-red-600"  {{$category->is_popular == 1 ? 'checked' : '' }} ><span class="ml-2 text-gray-700">popular</span>
                            </label>
                        </div>

                        <div class="mt-4">

                            <div class="flex items-center justify-center  w-full">
                                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  hover:bg-gray-200 ">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <img src="{{ asset('storage/'.$category->image)}}" alt="" width='200' height='100'>
                                        <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">{{__('message.Click to upload Image')}}</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                    </div>
                                    <input id="dropzone-file" name="image" @error('image') is-invalid @enderror" type="file" class="hidden" />
                                    @error('image')
                            <div class="font-regular relative mb-4 block w-full rounded-lg bg-red-600 p-4 text-base leading-5 text-white opacity-100">{{ $message }}</div>
                          @enderror
                                </label>
                            </div>



                            </div>
                            <div class="mt-4 w-full bg-gray-50 rounded-lg border border-gray-200 ">
                                <div class="flex justify-between items-center py-2 px-3 border-b">
                                    <div class="flex flex-wrap items-center divide-gray-200 sm:divide-x">
                                        <div class="flex items-center space-x-1 sm:pr-4">

                                    </div>

                                    <label for="editor" class="">{{__('message.Description')}}</label>
                                    </div>
                                </div>
                                <div class="py-2 px-4 bg-white rounded-b-lg">

                                    <textarea id="editor" name="meta_description"  rows="8" class="block px-0 w-full text-sm text-gray-800 bg-white border-0  focus:ring-0  " placeholder="{{__('message.Description')}}" >{{old('meta_description', $category->meta_description)}}</textarea>
                                </div>
                                <div class="mt-4 w-full bg-gray-50 rounded-lg border border-gray-200 ">
                                    <div class="flex justify-between items-center py-2 px-3 border-b">
                                        <div class="flex flex-wrap items-center divide-gray-200 sm:divide-x">
                                            <div class="flex items-center space-x-1 sm:pr-4">

                                        </div>

                                        <label for="editor" class="">{{__('message.meta keywords')}}</label>
                                        </div>
                                    </div>
                                    <div class="py-2 px-4 bg-white rounded-b-lg">

                                        <textarea id="editor" name="mate_keywords"   rows="8" class="block px-0 w-full text-sm text-gray-800 bg-white border-0  focus:ring-0  " placeholder="{{__('message.meta keywords')}}" >{{old('mate_keywords', $category->mate_keywords)}}</textarea>
                                    </div>







                    </div>

                    <div class="flex justify-end mt-6">
                        <button type="submit" class="mt-4 bg-purple-500 text-white py-2 px-6 rounded-md hover:bg-purple-600 ">Save</button>
                </form>
        </div>
    </div>
</div>

@endsection
