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
        </div>

        <div class="p-6 lg:pt-0 flex">
            <a href="#" class="inline-block"><x-unfilled-heart></x-unfilled-heart></a>
            <span class="text-gray-400 ml-3">0 likes</span>
        </div>

        <!-- Comment Section -->
        <div class="p-6 rounded-lg">
            <h3 class="text-lg font-semibold mb-4">0 Comments</h3>
            <!-- Comment Form -->
            <form action="" method="POST">
                @csrf
                <textarea name="content" rows="3" class="w-full px-3 py-2 rounded-lg border-gray-300 focus:outline-none focus:border-indigo-500 mb-2" style="height: 5rem; resize: none;" placeholder="Add a comment..."></textarea>
                <button type="submit" class="bg-gray-100 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Post Comment</button>
            </form>
            <div class="w-full px-3 py-2 rounded-lg border-gray-300 mt-2">
                <div class="flex items-center">
                    <p class="text-gray-800 font-semibold">John Doe</p> <!-- Commenter's name -->
                </div>
                <p class="text-gray-700">This is a sample comment. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> <!-- Comment content -->
            </div>
        </div>
    </div>
</x-app-layout>




