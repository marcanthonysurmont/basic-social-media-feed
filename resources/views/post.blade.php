<x-app-layout>
    <div class="flex justify-center items-center h-screen bg-gray-900">
        <div class="max-w-2xl w-full"> <!-- Adjusted max-width and added w-full -->
            <div class="bg-gray-800 rounded-lg shadow-lg p-6 h-full"> <!-- Added h-full -->
                <form method="POST" action="{{route('create-post.store')}}" enctype="multipart/form-data" class="h-full"> <!-- Added class="h-full" -->
                    @csrf

                    <div class="mb-4">
                        <label class="block text-white text-lg font-bold mb-2" for="title">
                            Title
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline bg-gray-700" id="title" name="title" type="text">
                    </div>

                    <div class="mb-4">
                        <label class="block text-white text-lg font-bold mb-2" name="content">
                            Content:
                        </label>
                        <textarea class="shadow appearance-none border rounded w-full max-h-32 py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline bg-gray-700 resize-none" id="content" name="content" rows="6"></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-white text-lg font-bold mb-2" for="image">
                            Upload Image:
                        </label>
                        <input type="file" name="image" id="image" accept="image/*" class="appearance-none block w-full bg-gray-700 border border-gray-300 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-gray-700 focus:border-gray-500 cursor-pointer text-white">
                    </div>

                    <div class="flex justify-center">
                        <button class="dark:bg-indigo-900/50 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            Create Post
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>


