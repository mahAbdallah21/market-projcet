@extends('layouts.msater')
@section('body')
<h3 class="text-gray-700 text-3xl font-semibold">{{__('message.Categories')}}</h3>

<div class="mt-4">

    <div class="mt-4">
        <div class="max-w-sm w-full bg-white shadow-md rounded-md overflow-hidden border">
            <form>
                <div class="flex justify-between items-center px-5 py-3 text-gray-700 border-b">
                    <h3 class="text-sm">{{__('message.Category')}}</h3>
                    <button>
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="px-5 py-6 bg-gray-200 text-gray-700 border-b">
                    <label class="text-xs">{{__('message.Name')}}</label>

                    <div class="mt-2 relative rounded-md shadow-sm">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-600">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
                            </svg>
                        </span>

                        <input type="text" name="name"
                            class="form-input w-full px-12 py-2 appearance-none rounded-md focus:border-indigo-600">
                    </div>
                </div>

                <div class="flex justify-between items-center px-5 py-3">
                    <button
                        class="px-3 py-1 text-gray-700 text-sm rounded-md bg-gray-200 hover:bg-gray-300 focus:outline-none">Cancel</button>
                    <button
                        class="px-3 py-1 bg-indigo-600 text-white rounded-md text-sm hover:bg-indigo-500 focus:outline-none">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="mt-8">
    <h4 class="text-gray-600">{{__('message.Category')}}</h4>

    <div class="mt-4">
        <div class="p-4 bg-white rounded-md shadow-md">
            <h2 class="text-lg text-gray-700 font-semibold capitalize">{{__('message.Add New Category')}}</h2>

                <form action="{{route('categories.store')}}" enctype="multipart/form-data"  method="POST">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                        <div  class="mt-4">
                            <label class="text-gray-700" for="name_ar">{{__('message.Arabic Name')}}</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" name="name_ar"
                                type="text">
                        </div>
                        <div  class="mt-4">
                            <label class="text-gray-700" for="name_en">{{__('message.English Name')}}</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" name="name_en"
                                type="text">
                        </div>

                        <div  class="mt-4">
                            <label class="text-gray-700" for="meta_title">{{__('message.Arabic META TITLE')}}</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" name="meta_title_ar" type="text">
                        </div>
                        <div  class="mt-4">
                            <label class="text-gray-700" for="META_TITLE">{{__('message.English META TITLE')}}</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" name="meta_title_en" type="text">
                        </div>

                        <div class="">
                            <label class="text-gray-700" for="password">{{__('message.Select Category')}}</label>


                                <div class="relative inline-flex w-full self-center">

                                    <select name="category_id" class="text-2xl  font-bold rounded border-2 border-purple-700 text-gray-600 w-full pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">

                                        <option selected@disabled(true) >{{__('message.select one')}}</option>
                                        @foreach (App\Models\category::orderBy('name')->pluck('name', 'id')->toArray() as $id => $name)




                                        <option value="{{$id}}">{{$name}}</option>
                                        @endforeach
                                    </select>

                                </div>

                        </div>

                        <div class="mt-4">

                            <div class="flex items-center justify-center  w-full">
                                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  hover:bg-gray-200 ">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">{{__('message.Click to upload Image')}}</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                    </div>
                                    <input id="dropzone-file" name="image" type="file" class="hidden" />
                                </label>
                            </div>

                            </div>
                            <div class="mt-4 w-full bg-gray-50 rounded-lg border border-gray-200 ">
                                <div class="flex justify-between items-center py-2 px-3 border-b">
                                    <div class="flex flex-wrap items-center divide-gray-200 sm:divide-x">
                                        <div class="flex items-center space-x-1 sm:pr-4">

                                    </div>

                                    <label for="editor" class="sr-only">Meta Description</label>
                                    </div>
                                </div>
                                <div class="py-2 px-4 bg-white rounded-b-lg">

                                    <textarea id="editor" name="meta_description" rows="8" class="block px-0 w-full text-sm text-gray-800 bg-white border-0  focus:ring-0  " placeholder="Meta Description" required></textarea>
                                </div>
                                <div class="mt-4 w-full bg-gray-50 rounded-lg border border-gray-200 ">
                                    <div class="flex justify-between items-center py-2 px-3 border-b">
                                        <div class="flex flex-wrap items-center divide-gray-200 sm:divide-x">
                                            <div class="flex items-center space-x-1 sm:pr-4">

                                        </div>

                                        <label for="editor" class="sr-only">mate keywords</label>
                                        </div>
                                    </div>
                                    <div class="py-2 px-4 bg-white rounded-b-lg">

                                        <textarea id="editor" name="mate_keywords" rows="8" class="block px-0 w-full text-sm text-gray-800 bg-white border-0  focus:ring-0  " placeholder="mate keywords" required></textarea>
                                    </div>







                    </div>

                    <div class="flex justify-end mt-4">
                        <button
                            class="px-4 py-2 bg-gray-800 text-gray-200 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Save</button>
                    </div>
                </form>
        </div>
    </div>
</div>

@endsection
