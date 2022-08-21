<div>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('articles') }}
            </h2>
            <div class=" bg-gray-500 flex flex-row-reverse items-center rounded-full ">
                <div>
                    <input wire:model='$query' class="w-36 h-8 rounded-full focus:outline-none  md:w-72" type="search" name="search"
                        placeholder="Une recherche?" >
                </div>
                <svg class="w-7 h-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>
    </x-slot>
    @forelse ($articles as $article )
        <livewire:card :article="$article" /> 
    @empty
        {{('rien ne correspond a vos recherches')}}
    @endforelse
    {{$articles->links()}}
</div