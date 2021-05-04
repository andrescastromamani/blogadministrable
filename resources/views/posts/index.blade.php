<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-3 gap-6">
            @foreach($posts as $post)
                <article>
                    <img src="{{\Illuminate\Support\Facades\Storage::url($post->image->url)}}" alt="image">
                </article>
            @endforeach
        </div>
    </div>
</x-app-layout>
