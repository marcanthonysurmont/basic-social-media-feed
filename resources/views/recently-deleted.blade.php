<x-app-layout>
    <div class="flex justify-center items-center h-full">
        <h1 class="text-xl font-bold text-center text-gray-800 pt-12">Recently Deleted Posts</h1>
    </div>
    <div class="grid lg:grid-cols-3 grid-cols-2 gap-4 max-w-[877px] mx-auto pt-12">
        @foreach($posts as $post)
            <div class="bg-white text-gray-800 rounded-lg overflow-hidden shadow-lg relative">
                    <div class="p-4"> <!-- Adjust the height as per your requirement -->
                        <p class="text-sm font-semibold text-gray-400 mb-1" style="word-break: break-word">{{ $post->user->name }}</p>
                        <h2 class="text-lg font-semibold mb-2" style="word-break: break-word">{{ Str::substr($post->title, 0, 15)}}@if(strlen($post->content) > 15)...@endif</h2>
                        <p class="text-lg text-gray-700 mb-2" style="overflow-wrap: break-word;">{{ Str::substr($post->content, 0, 15) }}@if(strlen($post->content) > 15)...@endif</p>
                    </div>
                <!-- Restore link -->
                <a href="{{ route('recently-deleted.restore', ['id' => $post->id]) }}" class="absolute bottom-0 right-0 bg-red-500 text-white px-4 py-2 rounded-tl-lg hover:bg-red-400">Restore</a>
            </div>
        @endforeach
    </div>
    <div class="flex justify-center items-center h-full mt-6">
        {{ $posts->links() }}
    </div>
</x-app-layout>
