@extends('layouts.msater')

@section('body')
<form method="POST" enctype="multipart/form-data" action="{{route('side.update' , $sideShow->id)}}">
    @method('patch')
    @csrf
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      <h2 class="text-base font-semibold leading-7 text-gray-900">Side Show</h2>


      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
          <label for="title_ar" class="block text-sm font-medium leading-6 text-gray-900">Arabic Title</label>
          <div class="mt-2">
            <input type="text" name="title_ar" id="title_ar" autocomplete="title_ar"
            value="{{old('title_ar' , $sideShow->getTranslation('title', 'ar'))}}"
              class="block w-full rounded-md border-0 py-1.5 @error('title_ar') is-invalid @enderror
               text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400
               focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
          @error('title_ar')
          <div
              class="font-regular relative mb-4 block w-full rounded-lg bg-red-600 p-4 text-base leading-5 text-white opacity-100">
              {{ $message }}</div>
          @enderror
        </div>


        <div class="sm:col-span-3">
          <label for="title_en" class="block text-sm font-medium leading-6 text-gray-900">English Title</label>
          <div class="mt-2">
            <input type="text" name="title_en" id="title_en" autocomplete="title_en"
            value="{{old('title_en' , $sideShow->getTranslation('title', 'en'))}}"
              class="@error('title_en') is-invalid @enderror
              block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
          @error('title_en')
          <div
              class="font-regular relative mb-4 block w-full rounded-lg bg-red-600 p-4 text-base leading-5 text-white opacity-100">
              {{ $message }}</div>
          @enderror
        </div>

        <div class="col-span-full">
          <label for="description_ar" class="block text-sm font-medium leading-6 text-gray-900">Arabic  Description</label>
          <div class="mt-2">
            <textarea id="description_ar" name="description_ar" rows="3"
              class="@error('description_ar') is-invalid @enderror block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              {{old('description_ar',$sideShow->getTranslation('description', 'ar'))}}
            </textarea>
          </div>
          @error('description_ar')
          <div
              class="font-regular relative mb-4 block w-full rounded-lg bg-red-600 p-4 text-base leading-5 text-white opacity-100">
              {{ $message }}</div>
          @enderror

        </div>
        <div class="col-span-full">
          <label for="description_en" class="block text-sm font-medium leading-6 text-gray-900">English  Description</label>
          <div class="mt-2">
            <textarea id="description_en" name="description_en" rows="3"
              class="@error('description_en') is-invalid @enderror  block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              {{old('description_en',$sideShow->getTranslation('description', 'en'))}}

            </textarea>
          </div>
          @error('description_en')
          <div
              class="font-regular relative mb-4 block w-full rounded-lg bg-red-600 p-4 text-base leading-5 text-white opacity-100">
              {{ $message }}</div>
          @enderror

        </div>
        <div class="col-span-full">
            <label for="dropzone-file"
                class="flex flex-col justify-items-start w-full h-50 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  hover:bg-gray-200 ">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    @if ($sideShow->image)
                    <img class="rounded-full w-40 h-400" src="{{asset('storage/' .$sideShow->image)}}" alt="image description">


                    @else
                    <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                    </path>
                </svg>

                    @endif


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

        <div class="flex items-center">
            <label class="inline-flex  justify-items-center p-7php">
                <input type="checkbox" name="is_showing" class="form-checkbox h-5 w-5  text-purple-700" {{$sideShow->is_showing == 1 ? 'checked' : '' }} >
                <span  class="ml-2 text-gray-700">showing</span>
            </label>
        </div>

      </div>

      <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
        <button type="submit"
          class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
      </div>
    </div>
  </div>
</form>

@endsection
