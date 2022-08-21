<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center ">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __("New news or help") }}
            </h2>
            @auth
            @if (auth()->user()->superadmin)
            <a class="bg-gray-800 py-0  text-white font-bold button rounded-lg p-1 flex justify-center items-center w-7"
                href="{{route('News.create')}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
            </a>
            @endif
            @endauth
        </div>
    </x-slot>

    <div class="flex flex-col justify-center items-start ">

        @foreach ($news as $new)
        <div class="bg-white my-3">
            <div class="flex flex-row justify-between">
                <h2 class="font-semibold text-xl capitalize ">&nbsp; ## &nbsp;{{$new->title}}</h2>
                @auth
                @if (auth()->user()->superadmin)
                <form class="pr-3" method='POST' action="{{route('News.destroy',['News' => $new])}}">
                    @csrf
                    @method("DELETE")
                    <button class="w-5 h-5" type=" submit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </form>
                @endif
                @endauth
            </div>
            <p class="px-2 py-1 text-gray-500">{{$new->description}}</p>
            <video src="{{Storage::url($new->videopath)}}" controls preload></video>
        </div>
        @endforeach

    </div>
</x-app-layout>