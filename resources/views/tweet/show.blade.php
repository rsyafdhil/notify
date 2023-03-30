<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Komentari {{ $tweet->user_name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card my-4 bg-slate-700">
                <div class="card-body">
                    <h2 class="text-xl font-bold">{{ $tweet->user->name }}</h2>
                    <p>{{ $tweet->content }}</p>
                        <span class="text-sm">{{ $tweet->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>

            <div class="card my-4 bg-dark">
                <div class="card-body">
                    <div class="card-title">Komentar</div>

                    <form action="{{ route ('comment.store', $tweet->id) }}" method="post">
                        @csrf
                        <textarea name="message" class="textarea textarea-bordered w-full" placeholder="tinggalkan komentar" rows="3"></textarea>
                        <input type="submit" value="Cocotmu siniin" class="btn btn-primary">
                    </form>
                </div>
            </div>

            @foreach ($tweet->comments as $comment)
                <div class="card my-4 bg-slate-700 mx-12">
                    <div class="card-body">
                        <h2 class="text-xl font-bold">{{ $comment->user->name }}</h2>
                        <p>{{ $comment->message }}</p>
                        <a class="text-end text-blue-500 link-hover" href="{{ route ('comment.edit', [$tweet->id, $comment->id]) }}">Edit</a>
                        <span class="text-sm">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>