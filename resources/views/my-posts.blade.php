<x-app-layout>
    <div class="flex justify-center items-center h-full">
        <h1 class="text-xl font-bold text-center text-gray-800 pt-12">{{ $posts->links()->paginator->total() }} Posts</h1>
    </div>
    <div class="grid lg:grid-cols-3 grid-cols-2 gap-4 max-w-[877px] mx-auto pt-12">
        @foreach($posts as $post)
            <div class="bg-white text-gray-800 rounded-lg overflow-hidden shadow-lg relative">
                <a href="{{ route('status', ['id' => $post->id]) }}" class="block z-50 link-style"> <!-- Apply the link style class -->
                    <div class="p-4"> <!-- Adjust the height as per your requirement -->
                        <p class="text-sm font-semibold text-gray-400 mb-1" style="word-break: break-word">{{ $post->user->name }}</p>
                        <h2 class="text-lg font-semibold mb-2" style="word-break: break-word">{{ Str::substr($post->title, 0, 22)}}@if(strlen($post->title) > 22)...@endif</h2>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <div class="flex justify-center items-center h-full mt-6">
        {{ $posts->links() }}
    </div>
    <div class="flex justify-center items-center h-full mt-6">
        <a href="{{ route('recently-deleted') }}" class="text-blue-500 hover:text-blue-700">Recently deleted</a>
    </div>

</x-app-layout>

