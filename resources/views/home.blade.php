<x-app-layout>
    @foreach ($posts->reverse() as $post)
        <x-post-preview :post="$post" />
    @endforeach
</x-app-layout>
