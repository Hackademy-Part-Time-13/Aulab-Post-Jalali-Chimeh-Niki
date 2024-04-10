<x-layout>

    <div class="container-fluid p-5 text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1">
                {{ $article->title }}
            </h1>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-around text-white">
            <div class="col-12 col-md-8">
                <img src="{{ Storage::url($article->image) }}" class="img-fluid my-3" alt="{{ $article->title }}">
                <div class="text-center">
                    <h2>{{$article->subtitle}}</h2>
                    <div class="my-3 text-muted fst-italic">
                        <p class="text-white">Redatto da {{$article->user->name}} il {{$article->created_at->format('d/m/Y')}}</p>
                    </div>
                </div>
                <hr>
                <p>{{$article->body}}</p>
                <div class="text-center">
                    <a href="{{ route('article.index') }} " class="btn btn-info text-white">Torna indietro</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>