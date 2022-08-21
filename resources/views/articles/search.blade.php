<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Recherche') }}
            </h2>
            <div class="  rounded-full ">
                <form class="flex flex-row gap-2" action="{{route('Article.search')}}" >
                    <input  class="w-41 h-8 rounded-full focus:outline-none  md:w-72" type="search" name="query" placeholder="Entrez votre recherche ici">
                    <button class="button bg-gray-800 px-1 ">
                        {{-- <a class="bg-gray-800 text-white button p-1" href="{{route('Article.search')}}"> --}}
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                    </button>
                </form>
                
                {{-- <svg class="w-7 h-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg> --}}
            </div>
        </div>
    </x-slot>

    @if (isset($articles))
        @forelse ($articles as $article )
        <livewire:card :article="$article" />
        @empty
        {{('rien ne correspond a vos recherches')}}
        @endforelse
        {{$articles->links()}}
    @else
        <div class="my-3 bg-white py-3 px-2 text-center anime animate-pulse" >
            <p>Pas de resultat pour le moment faites une recherche sur la barre de recherche</p>
        </div>
    @endif
    
</x-app-layout>