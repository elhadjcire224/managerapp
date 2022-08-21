<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Page d'aide") }}
        </h2>
    </x-slot>
    <div>
        <h2>{{$article->code}}</h2>
        <p>{{$article->description}}</p>
        <iframe src="{{Storage::url(dd($article->media))}}" frameborder="0"></iframe>
    </div>
</x-app-layout>