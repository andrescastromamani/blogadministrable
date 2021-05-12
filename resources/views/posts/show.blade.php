<x-app-layout>
    <div class="container py-8">
        <h1 class="text-4xl font-bold text-gray-600">{{$post->name}}</h1>
        <div class="text-lg text-gray-500 mb-2">{!! $post->extract!!}</div>
        <div class="grid grid-cols-1 lg:grid-cols-3">
            <div class="md:col-span-2">
                <figure>
                    @if($post->image)
                        <img class="w-full h-80 object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="image">
                    @else
                        <img class="w-full h-80 object-cover object-center" src="https://lh3.googleusercontent.com/proxy/T8PsHVAV7RkewJbWFkmnnX2Rmm0F5EDA5E4_9cfZ98leOWcq8mcId1o27tIV9R-QVUkqmDwDEoeHlh8RvbNAy-ji2eLVbYONuhlNIM4wlpv33eGewxSZ" alt="image">
                    @endif
                </figure>
                <div class="text-base text-gray-500 mt-4">
                    {!! $post->body !!}
                </div>
            </div>
            <aside class="lg:ml-6">
                <h1 class="text-2xl font-bold text-gray-600 mb-4">Más en {{$post->category->name}}</h1>
                <ul>
                    @foreach($similares as $similar)
                        <li class="mb-4">
                            <a class="flex" href="{{route('posts.show', $similar)}}">
                                @if($similar->image)
                                    <img class="w-30 h-20 object-cover object-center" src="{{Storage::url($similar->image->url)}}" alt="">
                                @else
                                    <img class="w-30 h-20 object-cover object-center" src="https://lh3.googleusercontent.com/proxy/T8PsHVAV7RkewJbWFkmnnX2Rmm0F5EDA5E4_9cfZ98leOWcq8mcId1o27tIV9R-QVUkqmDwDEoeHlh8RvbNAy-ji2eLVbYONuhlNIM4wlpv33eGewxSZ" alt="">
                                @endif
                                <span class="ml-2 text-gray-600">{{$similar->name}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>
</x-app-layout>
