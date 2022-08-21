<x-app-layout>
<div class="">
    <x-slot name="header">
            <div class="flex justify-between items-center flex-shrink-0">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Les derniers articles') }}
                </h2>
                @auth
                @if (auth()->user()->admin)
                <a class="bg-gray-800 py-0  text-white font-bold button rounded-lg p-1 flex justify-center items-center"
                    href="{{route('Article.create')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                </a>
                @endif
                @endauth
                <a class="bg-gray-800 text-white button p-1" href="{{route('Article.search')}}">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </a>
            </div>
        </x-slot>
        @foreach ($articles as $article )
        <livewire:card :article="$article" />
        @endforeach
        
        <a class="button bg-gray-800 py-2 px-3 rounded-lg w-24 mx-auto" href="{{route('Article.index')}}">Voir plus</a>
</div>
</x-app-layout>