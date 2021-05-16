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
                        <img class="w-full h-80 object-cover object-center" src="{{asset('img/imgdefault.jpg')}}" alt="image">
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
                                    <img class="w-30 h-20 object-cover object-center" src="https://lh3.googleusercontent.com/proxy/9tECwFAe-y7qQbs6J9ysfP5YYfxv2K1hdMLRyXSxR_tX1C4hRZrohO9m7uvkzrz5lIykPRqaCuojoPw6s6OEE6O2MkWyxiwKVjD0Ap6_0zv24pxFbhmW" alt="">
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
