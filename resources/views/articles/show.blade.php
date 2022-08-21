<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("l'article $Article->id") }}
        </h2>
    </x-slot>
    <div class="  rounded-md overflow-hidden mb-5 bg-white">
        {{-- @php dd($article) --}}
        @foreach ($Article->medias as $media)
            <div class="flex flex-col justify-center items-center gap-3 my-3 bg-gray-200 rounded-md">
                <img class="  object-cover  object-top w-full " src="{{Storage::url("$media->imgpath")}}" alt="article img">
                {{-- download link --}}
                @auth
                <form method='POST' action="{{route('download')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$Article->id}}">
                    <input type="hidden" name="mediapath" value="{{$media->imgpath}}">
                    <button class="flex flex-row items-center gap-3 px-4 py-2 bg-gray-800 border border-transparent rounded-lg font-semibold text-xs text-white uppercase mb-2" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Telecharger la photo
                    </button>
                </form>
                @endauth
                @guest
                    <button disabled
                        class="flex flex-row items-center gap-3 px-4 py-2 bg-gray-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Telecharger la photo
                    </button> 
                @endguest
            </div>
        @endforeach
        <div class="px-3  break-words font-serif ">
            @foreach ($Article->categories as $category)
            <p class="uppercase">Category : <a class="text-sky-400 font-semibold" href="">#{{$category->name}}</a></p>
            @endforeach
            <div class="bg-yellw-100 my-2 p-2">
                <p class="uppercase text-center letter-1 space-1 ">Description</p>
                <p class="rounded-xl text-gray-400 ">
                    @if (!empty($Article->description))
                        {{$Article->description}}
                    @else
                        {{'Aucune description pour cet article ...'}}
                    @endif
                </p>
            </div>
            <p class="uppercase py-1 ">Prix Vente : {{$Article->sellprice}} GNF</p>
            @auth
                <p class="uppercase py-1 ">Prix Achat : {{$Article->buyprice}} GNF</p>
                <p class="uppercase py-1 ">Commercial : {{floor(($Article->sellprice - $Article->buyprice) * 0.35)}} GNF</p>   
            @endauth
            <div class="flex items-center justify-center mt-4">
                <a class="px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 " href="{{ route('Article.index')}}">Retour</a>
            </div>
        </div>
    </div>
</x-app-layout>