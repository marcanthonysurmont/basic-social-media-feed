@props(['post'])

<br>
<div class="block max-w-[877px] mx-auto bg-gray-800 text-white rounded-lg overflow-hidden shadow-lg">
    <a href="#">
        <div class="p-6">
            <p class="text-sm font-semibold text-gray-400 mb-2">{{$post->user->name}}</p>
            <h2 class="text-xl font-semibold mb-2">{{$post->title}}</h2>
        </div>
        @if(!empty($post->picture_path))
            <img src="https://via.placeholder.com/800x400" alt="Post Image" class="w-full h-auto mb-6">
        @endif
    </a>
    <div class="p-6 lg:pt-0 flex">
        <a href="" class="inline-block"><x-unfilled-heart></x-unfilled-heart></a>
        <span class="text-gray-400 ml-3">0 likes</span>

        <a href="" class="inline-block"><x-comment-logo></x-comment-logo></a>
        <span class="text-gray-400 ml-3">0 comments</span>
    </div>
</div>


