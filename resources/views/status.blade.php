<x-app-layout>
    <br>
    <div class="block max-w-[877px] mx-auto bg-white text-gray-800 rounded-lg overflow-hidden shadow-lg relative">
        <div class="p-6 relative">
            <p class="text-sm font-semibold text-gray-400 mb-1">{{ $post->user->name }}</p>
            <h2 class="text-xl font-bold mb-2">{{ $post->title }}</h2>
            <p class="text-lg text-gray-700 mb-2" style="overflow-wrap: break-word;">{{ $post->content }}</p>

            @if(Auth::id() === $post->user_id)
                <div class="absolute top-0 right-0 transform p-4">
                    <a href="{{ route('edit-post', ['id' => $post->id]) }}"><x-edit-logo></x-edit-logo></a>
                </div>
            @endif

            @if(!empty($post->file_path))
                <img src="{{ asset('storage/' . $post->file_path) }}" alt="{{ $post->title }}" class="w-full h-auto mb-1">
            @endif

            <div class="mt-6 lg:pt-0 flex">
                <form method="POST" action="{{ route('home.like') }}">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <button class="inline-block" type="submit">@if($post->hasLiked(Auth::user()))<x-filled-heart></x-filled-heart>@else<x-unfilled-heart></x-unfilled-heart>@endif</button>
                </form>
                <span class="text-gray-400 ml-3">{{ $post->likedByUsers->count() }} likes</span>
            </div>

            <!-- Comment Section -->
            <div class="mt-2 rounded-lg">
                <h3 class="text-lg font-semibold mb-4">{{ $post->comments->count() }} Comments</h3>
                <!-- Comment Form -->
                <form action="{{ route('status.comment', ['id' => $post->id]) }}" method="POST">
                    @csrf
                    <textarea name="content" rows="3" class="w-full px-3 py-2 rounded-lg focus:outline-none focus:border-indigo-500 @error('content')border-danger @enderror" style="height: 5rem; resize: none;" placeholder="Add a comment..."></textarea>
                    @error('content')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="bg-gray-100 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-2 mb-2">Post Comment</button>
                </form>
                @foreach($post->comments->reverse() as $comment)
                    <div class="w-full px-3 py-2 bg-gray-100 rounded-lg mt-2 relative">
                        @if($comment->user_id === Auth::id())
                            <form method="POST" action="">
                                <input type="hidden" name="delete" value="{{ $comment->id }}">
                                <button type="submit" class="absolute top-0 right-0 transform p-4"><x-trash-can></x-trash-can></button>
                            </form>
                        @endif
                        <div class="flex items-center">
                            <p class="text-gray-800 font-semibold">{{ $comment->user->name }}</p> <!-- Commenter's name -->
                        </div>
                        <p class="text-gray-700" style="overflow-wrap: break-word;">{{ $comment->comment }}</p> <!-- Comment content -->
                    </div>
                @endforeach
            </div>
        </div>
        </div>
</x-app-layout>




