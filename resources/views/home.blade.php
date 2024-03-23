<x-app-layout>
    @foreach ($posts as $post)
        <x-post-preview :post="$post" />
    @endforeach
</x-app-layout>
