<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('Twitter') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex text-right">
                <form action="" method="post">
                    @csrf
                    <button class="btn btn-primary btn-sm mb-3">Tandai Baca</button>
                </form>
            </div>
            @forelse ($notifications as $notif)
                <div class="card bg-slate-700 shadow-xl @if($notif ->read_at == null) card-bordered border-blue-500 @endif">
                    <div class="card-body">
                        <p>{{ $notif->data['user']['name'] }} Mengomentari <a class="link text-blue" href="{{ route('tweets.show', $notif->data['tweet']['id']) }}">Tweet Kamu</a></p>
                    </div>
                </div>
            @empty
            <div class="alert shadow-lg">
                <div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info flex-shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>Tidak ada.</span>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>
</x-app-layout>


{{-- @if($t->user_id == Auth::user()->id)
                    <div class="chat chat-start">
                    <div class="chat-bubble">{{ $t->content }}</div>
                    </div>
                    @else
                    <div class="chat chat-end">
                    <div class="chat-bubble chat-bubble-primary">{{ $t->content }}</div>
                    </div>
                    @endif --}}