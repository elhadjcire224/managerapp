<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Mes favories") }}
        </h2>
    </x-slot>
    @forelse ($articles as $article)
        <livewire:card :article='$article'/>
    @empty
        {{"Vous n'avez aucun favory pour le moment"}}
    @endforelse
    
</x-app-layout>