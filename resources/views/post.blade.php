<x-app-layout>
    <div class="flex justify-center items-center" style="height: calc(100vh - 90px)">
        <div class="max-w-2xl w-full"> <!-- Adjusted max-width and added w-full -->
            <div class="bg-white rounded-lg shadow-lg p-6 h-full"> <!-- Changed background color to white -->
                <form method="POST" action="@if(isset($post)) {{ route('edit-post.update', ['id' => $post->id]) }} @else {{ route('create-post.store') }} @endif" enctype="multipart/form-data" class="h-full"> <!-- Added class="h-full" -->
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-800 text-lg font-bold mb-2" for="title"> <!-- Changed text color to gray-800 -->
                            Title
                        </label>
                        <input class="shadow appearance-none rounded w-full py-2 px-3 text-gray-800 leading-tight focus:outline-none focus:shadow-outline bg-gray-100 @error('title')border-danger @enderror" id="title" name="title" type="text" value="@if(isset($post)){{ $post->title }}@endif{{ old('title') }}">
                        @error('title')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-800 text-lg font-bold mb-2" name="content"> <!-- Changed text color to gray-800 -->
                            Content:
                        </label>
                        <textarea class="shadow appearance-none rounded w-full max-h-32 py-2 px-3 text-gray-800 leading-tight focus:outline-none focus:shadow-outline bg-gray-100 resize-none @error('content')border-danger @enderror" id="content" name="content" rows="6">@if(isset($post)){{ $post->content }}@endif{{ old('content') }}</textarea>
                        @error('content')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-lg font-bold mb-2" for="image"> <!-- Changed text color to gray-800 -->
                            Upload Image:
                        </label>
                        <input type="file" name="image" id="image" accept="image/*" class="appearance-none block w-full bg-gray-100 border border-gray-300 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-gray-100 focus:border-gray-500 cursor-pointer text-gray-800">
                    </div>
                    <div class="flex justify-center">
                            <button class="bg-gray-100 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit"> <!-- Changed background color to gray-100 -->
                                {{$submitButton}}
                            </button>
                    </div>
                </form>
                @if(isset($post))
                    <div class="flex justify-center mt-4">
                        <form method="POST" action="{{ route('edit-post.delete', ['id' => $post->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit"> <!-- Changed background color to gray-100 -->
                                Delete Post
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>




</x-app-layout>



