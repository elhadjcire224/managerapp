<div>
    <div class="flex gap-3 justify-between">
    <h2>{{$user->name}}</h2>
    <h2>{{$user->tel}}</h2>
    @if ($user->admin)
    <button wire:click="addAdmin" class="w-5 h-5" type=" submit">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
    </button>
    @else
    <button wire:click="addAdmin" class="w-5 h-5" type=" submit">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
    </button>
    @endif
    </div>
    <div class="flex gap-3 justify-between">
        <h2>{{$user->email}}</h2>
        <h2>{{count($user->likes)}}</h2>
    </div>
</div>
