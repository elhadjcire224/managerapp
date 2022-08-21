<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('articles') }}
        </h2>
    </x-slot>
    @php
        $i=0;
    @endphp
    <div class='container  flex items-center flex-col w-full  justify-start min-h-screen md:flex-row flex-wrap '>
        @for ($i = 0; $i < 20; $i++)
        <div class="bg-white w-72 mx-auto h-auto shadow-2xl my-10 rounded-xl overflow-hidden md:w-72 md:mx-3  ">
            <div class="h-64 w-full bg-gray-400 "></div>
            <div class="flex w-full flex-row justify-center flex-wrap my-4">
            <div class="w-16 h-8 bg-slate-700 m-2 border-2 border-red-500"></div>
            <div class="w-16 h-8 bg-slate-700 m-2"></div>
            <div class="w-16 h-8 bg-slate-700 m-2"></div>
            <div class="w-16 h-8 bg-slate-700 m-2"></div>
            
            
            </div>
            <div class="pt-3 px-5 font-serif"> 
                <p class="text-xl mb-2 bg-sky-300 py-1 px-2 rounded-xl" >category: <a class="text-blue-900 hover:underline" href="#">#Robe</a></p>
                <p class="text-xl mb-2 bg-yellow-300 py-1 px-2 rounded-xl" > 
                <span class="pr-4" >code</span> 
                <span class="" >R045002</span>
                </p>
                <p class="text-xl mb-2 bg-red-300 py-1 px-2 rounded-xl" >prix : 350 000FG</p>
                <p class="text-xl mb-2 bg-green-300 py-1 px-2 rounded-xl" >prix achat : 350 000FG</p>
                <div class="flex flex-row justify-between w-full my-6">
                    <div>
                        <a class="py-2 px-3 rounded-2xl bg-blue-800 text-lg text-white hover:bg-white hover:text-blue-800 hover:border hover:py-1 hover:border-blue-800 transition duration-700 " href="#">download<i class="fa fa-arrow-down"></i></a>
                        
                    </div>
                    <div>
                        <a class="py-2 px-3 rounded-2xl bg-blue-800 text-lg text-white hover:bg-white hover:text-blue-800 hover:border hover:py-1 hover:border-blue-800 transition duration-700" href="#">voir plus</a>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                    </div>
                </div>
            </div>
        </div>
        @endfor
    </div>
</x-app-layout>