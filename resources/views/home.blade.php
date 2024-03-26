<x-app-layout>
    @foreach ($posts as $post)
        <x-post-preview :post="$post" />
    @endforeach
    <div class="flex justify-center items-center h-full mt-6">
        {{ $posts->links() }}
    </div>
</x-app-layout>
