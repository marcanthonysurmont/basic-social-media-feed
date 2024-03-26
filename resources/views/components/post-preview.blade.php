@props(['post'])

<br>
<div class="block max-w-[877px] mx-auto bg-white text-gray-800 rounded-lg overflow-hidden shadow-lg relative">
    <a href="{{ route('status', ['id' => $post->id]) }}" class="block z-50"> <!-- Make sure the <a> tag wraps around the entire block -->
        <div class="p-6 relative">
            <p class="text-sm font-semibold text-gray-400 mb-1" style="word-break: break-word">{{ $post->user->name }}</p>
            <h2 class="text-xl font-semibold mb-4" style="word-break: break-word">{{ $post->title }}</h2>
            @if(Auth::id() === $post->user_id)
                <div class="absolute top-0 right-0 transform p-4">
                    <a href="{{ route('edit-post', ['id' => $post->id]) }}"><x-edit-logo></x-edit-logo></a>
                </div>
            @endif
            @if(!empty($post->file_path))
                <a href="{{ route('status', ['id' => $post->id]) }}" class="block z-50"> <!-- Make sure the <a> tag wraps around the entire block -->
                    <img src="{{ asset('storage/' . $post->file_path) }}" alt="{{ $post->title }}" class="w-full h-auto mb-1">
                </a>
            @endif
        </div>
    </a>

    <div class="p-6 lg:pt-0 flex">
        <form method="POST" action="{{ route('home.like') }}">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <button class="inline-block" type="submit">@if($post->hasLiked(Auth::user()))<x-filled-heart></x-filled-heart>@else<x-unfilled-heart></x-unfilled-heart>@endif</button>
        </form>
        <span class="text-gray-400 ml-3">{{ $post->likedByUsers->count() }} likes</span>

        <x-comment-logo></x-comment-logo>
        <span class="text-gray-400 ml-3">{{ $post->comments->count() }} comments</span>
    </div>
</div>





