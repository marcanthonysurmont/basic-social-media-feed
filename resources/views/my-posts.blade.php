<x-app-layout>
    <div class="flex justify-center items-center h-full">
        <h1 class="text-xl font-bold text-center text-gray-800 pt-6">{{ $posts->links()->paginator->total() }} Posts</h1>
    </div>
    <div class="grid lg:grid-cols-3 grid-cols-2 gap-4 max-w-[877px] mx-auto pt-8">
        @foreach($posts->reverse() as $post)
            <div class="bg-white text-gray-800 rounded-lg overflow-hidden shadow-lg relative">
                <a href="{{ route('status', ['id' => $post->id]) }}" class="block z-50 link-style"> <!-- Apply the link style class -->
                    <div class="p-4"> <!-- Adjust the height as per your requirement -->
                        <p class="text-sm font-semibold text-gray-400 mb-1" style="word-break: break-word">{{ $post->user->name }}</p>
                        <h2 class="text-lg font-semibold mb-2" style="word-break: break-word">{{ Str::substr($post->title, 0, 22)}}@if(strlen($post->title) > 22)...@endif</h2>
                        @if(Auth::id() === $post->user_id)
                            <div class="absolute top-0 right-0 transform p-2">
                                <a href="{{ route('edit-post', ['id' => $post->id]) }}"><x-edit-logo></x-edit-logo></a>
                            </div>
                        @endif
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <div class="flex justify-center items-center h-full mt-6">
        {{ $posts->links() }}
    </div>
</x-app-layout>

