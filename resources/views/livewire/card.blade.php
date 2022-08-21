
<div class=" bg-white rounded-md overflow-hidden mb-3 shadow-xl">
    <div class="w-full">
        @php
            $imgpaths = [];
            foreach($article->medias as $media){
                $imgpaths[] = "'".Storage::url($media->imgpath)."'";            
            } 
        @endphp
        @if (count($imgpaths) > 1)
        @php $imgpaths = implode(',',$imgpaths); @endphp
        <div x-data="{
                        selected: 0,
                        images:[{{$imgpaths}}]
                    }" class="relative">
            <img class="h-64 w-full object-cover object-center" :src="images[selected]" alt="photos" />
        
            <button @click="if (selected > 0 ) {selected -= 1} else { selected = images.length - 1 }"
                class="absolute inset-y-0 left-0 px-2 py-5 h-full w-8 group bg-gradient-to-r from-gray-600 cursor-pointer">
                <span class=" group-hover:block text-gray-50 ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </span>
            </button>
            <button @click="if (selected < images.length - 1  ) {selected += 1} else { selected = 0 }"
                class="absolute inset-y-0 right-0 px-2 py-5 h-full w-8 group bg-gradient-to-l from-gray-600 cursor-pointer">
                <span class="group-hover:block text-gray-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </span>
            </button>
        
            <div class="absolute bottom-0 w-full p-4 flex justify-center space-x-2">
                <template x-for="(image,index) in images" :key="index">
                    <button @click="selected = index"
                        :class="{'bg-gray-300': selected == index, 'bg-gray-500': selected != index}"
                        class="h-2 w-2 rounded-full hover:bg-gray-300 ring-2 ring-gray-300"></button>
                </template>
            </div>
        </div>
        @else
            <img class="h-64  object-cover  object-center w-full " src="{{Storage::url("$media->imgpath")}}" alt="">
        @endif
        
    </div>
    <div class="px-3 ">
        <div class="flex flex-col">
            <div class="flex justify-between items-center my-1">
                <p class="bg-yellow-200 inline-block my-2 py-1 px-2 rounded-lg text-sm font-semibold ">
                    {{number_format((int)$article->sellprice,0," "," ")}} GNF</p>
                @foreach ($article->categories as $category)
                <a class="font-bold text-sky-600 px-1" href="">#{{$category->name}}</a>
                @endforeach
                <p class="font-semibold">{{$article->code}}</p>
            </div>
            <hr />
            @php
                $liked = $article->isLiked();
            @endphp
            <div class="flex justify-around items-center py-2 font-light">
                {{-- like button --}}
                <button class="w-6 h-6 " wire:click='addLike' >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="{{$liked ? 'red' : 'white'}}" viewBox="0 0 24 24" stroke="{{$liked ? 'red' : 'currentColor'}}"
                        stroke-width="1">
                        <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </button>                    
                    {{-- show link --}}
                    <a class="w-5 h-5 " href="{{url('Article/'.$article->id)}}"><svg xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg></a>
                    @auth()
                    @if (auth()->user()->admin)
                    {{-- delete link --}}
                    <form method='POST' action="{{route('Article.destroy',['Article' => $article])}}">
                        @csrf
                        @method("DELETE")
                        <button class="w-5 h-5
                            type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        </button>
                    </form>
                    {{-- edit link|icon --}}
                    <a class="w-5 h-5 " href=""><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg></a>
                    @endif
                    @endauth
            </div>
        </div>
    </div>
</div>