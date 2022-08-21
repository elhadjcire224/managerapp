<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("New news or help") }}
        </h2>
    </x-slot>
    <form class="m-4 bg-gray-100 text-gray-800 text-md" action="{{route('News.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col justify-center items-start my-3  ">
            <label class="font-serif pb-1 " for="title">Titre</label>
            <input class="rounded-lg w-full " value="{{old('title')}}" type="text" name="title" id="tile">
            @error('title')
            <small class="text-red-500 text-md p-1 font-semibold">{{($message)}}</small>
            @enderror
        </div>
        <div class="flex flex-col justify-center items-start my-3  ">
            <label class="font-serif pb-1 " for="description">Description</label>
            <input class="rounded-lg w-full " value="{{old('description')}}" type="text" name="description" id="description">
            @error('description')
            <small class="text-red-500 text-md p-1 font-semibold">{{($message)}}</small>
            @enderror
        </div>
        <div class="flex flex-col justify-center items-start my-3  ">
            <label class="font-serif pb-1 " for="video">Video</label>
            <input class="rounded-lg w-full p-2 bg-white border-2   border-gray-400 " type="file" name="video" id="video" accept="video/*">
            @error('video')
            <small class="text-red-500 text-md p-1 font-semibold">{{($message)}}</small>
            @enderror
        </div>
        <div class="flex justify-center px-8 items-center">
            <x-button class="capitalize">
                {{ __('plublier') }}
            </x-button>
        </div>
    </form>
</x-app-layout>