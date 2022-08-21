{{-- <div>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('articles') }}
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
            <div class="flex items-center justify-center ">
                
                <select wire:model='by' class="h-8 py-1 p rounded-lg ">
                    <option value="created_at">date</option>
                    <option value="sellprice">prix</option>
                </select>
                <select wire:model="direction" id="">
                    <option value="desc">
                        desc
                    </option>
                    <option value="asc">
                        asc
                </option>
                </select>
            </div>
            <a class="bg-gray-800 text-white button p-1" href="{{route('Article.create')}}">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </a>
        </div>
    </x-slot>
    @forelse ($articles as $article )
    <livewire:card :article="$article" />
    @empty
    {{('rien ne correspond a vos recherches')}}
    @endforelse
    {{$articles->links()}}
</div> --}}
