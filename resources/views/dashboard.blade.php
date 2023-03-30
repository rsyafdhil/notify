<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('Twitter') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    @foreach($tweets as $t)
                    <div class="card card-side shadow-xl bg-slate-700 my-5">
                        <div class="card-body ">
                          <h2 class="text-xl font-bold text-slate-100">{{ $t->user->name }}</h2>
                          <p class="text-slate-100">{{ $t->content }}</p>
                          <div class="text-start">
                            <a href="{{ route ('tweets.show', $t) }}" class="link link-hover text-blue-400">Komentar({{ $t->comments->count() }})</a>
                          </div>
                          <div class="text-end">
                            @can('edit', $t)
                            <a href="{{ route('tweets.edit', $t) }}" class="text-blue-500 underline">Edit</a>    
                            @endcan
                            <br>
                            @can('delete', $t)
                            <form action="{{ route ('tweets.destroy', $t->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Hapus" class="btn btn-danger">
                            </form>
                          @endcan
                        </form>
                          </div>
                        </div>
                      </div>
                    @endforeach
                    <div class="w-full p-3 mt-10">
                        <form action="{{ route('tweets.store') }}" method="post">
                            @csrf
                        <textarea name="content" class="input input-bordered w-full" id="" cols="30" rows="10"></textarea>
                        <br>
                        <input class="btn btn-primary mt-5" type="submit" value="Tweet">
                        </form>
                    </div>
                </div>  
            </div>
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