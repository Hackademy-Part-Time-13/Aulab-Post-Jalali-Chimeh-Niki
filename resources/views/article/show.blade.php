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
                @if ($article->image != null)
                    <img src="{{ Storage::url($article->image) }}" class="img-fluid" alt="{{ $article->title }}">
                @endif
                <div class="text-center">
                    <h2>{{$article->subtitle}}</h2>
                    <div class="my-3 text-muted fst-italic">
                        <p class="text-white">Redatto da {{$article->user->name}} il {{$article->created_at->format('d/m/Y')}}</p>
                    </div>
                </div>
                <hr>
                <p>{{$article->body}}</p>
                <div class="text-center">
                    <a href="{{ url()->previous() }} " class="btn btn-info text-white">Torna indietro</a>
                    @if (Auth::user() && Auth::user()->is_revisor && $article->is_accepted === null)
                        <a href="{{route('revisor.acceptArticle', compact('article'))}}" class="btn btn-success text-white">Accetta</a>
                        <a href="{{route('revisor.rejectArticle', compact('article'))}}" class="btn btn-danger text-white">Rifiuta</a> 
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layout>