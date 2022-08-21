<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Nouvelle category") }}
        </h2>
    </x-slot>
    <form class="m-4 bg-gray-100 text-gray-800 text-md" action="{{route('Category.store')}}" method="POST">
        @csrf
        <div class="flex flex-col justify-center items-start my-3  ">
            <label class="font-serif pb-1 " for="name">Nom de la Category</label>
            <input class="rounded-lg w-full " value="{{old('name')}}" type="text" name="name" id="name">
            @error('name')
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