<div x-data="{open : false}" @flash-message.window="open = true; setTimeout(() =>open=false,4000);">
    <div x-show='open' x-cloak class="fixed w-full border-2 py-2 px-1 flex flex-row gap-2 {{$colors[0]??'border-red-700 bg-red-200 text-red-700'}} z-50">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
        </svg>
        <p>{{$message}}</p>
    </div>
</div>