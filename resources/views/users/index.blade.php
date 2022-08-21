<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center ">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __("Users admin") }}
            </h2>
            
    </x-slot>

    <div class="flex flex-col justify-center items-start ">

        @foreach ($users as $user)
            <div class="flex flex-col gap-2 bg-white w-full my-4 px-2 py-4">
                <div class="flex gap-3 justify-between ">
                    <h2>{{$user->name}}</h2>
                    <h2>{{$user->tel}}</h2>
                    @if ($user->admin)
                        <form class="pr-3" method='POST' action="{{route('User.update',['User' => $user])}}">
                            @csrf
                            @method('PUT')
                            <button class="w-5 h-5" type=" submit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </button>
                        </form> 
                    @else
                    <form class="pr-3" method='POST' action="{{route('User.update',['User' => $user])}}">
                        @csrf
                        @method('PUT')
                        <button class="w-5 h-5" type=" submit">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                    </form>
                    @endif
                    <form method='POST' action="{{route('User.destroy',['User' => $user])}}">
                        @csrf
                        @method("DELETE")
                        <button class="w-5 h-5
                                                type=" submit">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>
                </div>
                <div class="flex gap-3 justify-between">
                    <h2>{{$user->email}}</h2>
                    <h2>{{count($user->likes)}}</h2>
                </div>
            </div>
        @endforeach

    </div>
</x-app-layout>