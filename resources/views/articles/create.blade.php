<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Nouvel article") }}
        </h2>
    </x-slot>

    <div class="">
        <form class="m-4 bg-gray-100 text-gray-800 text-md" method="POST" action="{{ route('Article.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col justify-center items-start my-3  ">
                <label class="font-serif pb-1 " for="category">Category</label>
                <select class="rounded-lg w-full " name="category" id="category">
                    @foreach ($categories as $category)
                        <option value="{{$category->name}}">{{$category->name}}</option>
                    @endforeach                    
                </select>
                @error('category')
                    <small class="text-red-500 text-md p-1 font-semibold">{{($message)}}</small>
                @enderror
            </div>
            <div class="flex flex-col justify-center items-start my-3  ">
                <label class="font-serif pb-1 " for="buyprice">Prix d'achat</label>
                <input class="rounded-lg w-full "  value="{{old('buyprice')}}" type="number" name="buyprice" id="buyprice">
                @error('buyprice')
                    <small class="text-red-500 text-md p-1 font-semibold" >{{($message)}}</small>
                @enderror
            </div>
            <div class="flex flex-col justify-center items-start my-3  ">
                <label class="font-serif pb-1 " for="sellprice">Prix de vente</label>
                <input class="rounded-lg w-full " value="{{old('sellprice')}}" type="number" name="sellprice" id="sellprice">
                @error('sellprice')
                <small class="text-red-500 text-md p-1 font-semibold">{{($message)}}</small>
                @enderror
            </div>
            <div class="flex  justify-between  py-2 px-1  items-center my-3 rounded-lg border-2   border-gray-400  bg-white">
                <label class="font-serif pb-1 " for="color">Couleur du texte</label>
                <input class=" w-20 mr-2 " value="{{old('color')}}"  type="color" name="color" id="color">
                
            </div>
            @error('color')
                    <small class="text-red-500 text-md p-1 font-semibold">{{($message)}}</small>
            @enderror
            <div class="flex flex-col justify-center items-start my-3  ">
                <label class="font-serif pb-1 " for="description">Description </label>
                <textarea class="rounded-lg w-full " value="{{old('description')}}"  name="description" id="description" rows="1" placeholder="Une description" ></textarea>
                @error('description')
                    <small class="text-red-500 text-md p-1 font-semibold">{{($message)}}</small>
                @enderror
            </div>
            <div class="flex flex-col justify-center items-start my-3  ">
                <label class="font-serif pb-1 " for="media">Photos</label>
                <input class="rounded-lg w-full p-2 bg-white border-2   border-gray-400 " type="file" name="media[]" id="media" multiple>
                @error('media')
                    <small class="text-red-500 text-md p-1 font-semibold">{{($message)}}</small>
                @enderror
            </div>
            <div class="flex justify-between px-8 ">
                {{-- <a class="bg-red-400 py-2 px-2 rounded-xl border border-blue-800 text-red-600 font-bold text-md capitalize " href="{{ route('Article.index')}}">Annuler</a> --}}
                <a class="capitalize bg-red-500 button p-2" href="{{ route('Article.index')}}">
                    Annuler
                </a>
                {{-- <input
                    class="bg-blue-400 cursor-pointer py-2 px-4 rounded-xl border border-blue-800 text-white font-bold text-md capitalize "
                    type="submit" value="publier"> --}}
                
                <x-button type="submit" class="capitalize">
                    {{ __('plublier') }}
                </x-button>
            </div>
        </form>
    </div>
</x-app-layout>