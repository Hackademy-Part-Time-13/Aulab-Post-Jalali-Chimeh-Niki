<x-layout>
   @if (session('message'))
       <div class="alert alert-success text-center">
           {{ session('message') }}
       </div>
    @endif 

    <div class="container my-5">
        <div class="row justify-content-around">
            @foreach ($articles as $article)
                <div class="col-12 col-md-3">
                    <div class="card shadow">
                        <img src="{{ Storage::url($article->image) }}" class="card-img-top" alt="{{ $article->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ $article->subtitle }}</p>
                            <a href="{{ route('article.byCategory', ['category'=> $article->category->id]) }}" class="small text-muted fst-italic text-capitalize">{{ $article->category->name }}</a>
                        </div>
                        <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                            <p class="mt-2">Redatto il {{ $article->created_at->format('d/m/Y') }} da <a href="{{ route('article.byUser', ['user'=> $article->user->id]) }}" class="small text-muted fst-italic text-capitalize">{{ $article->user->name }}</a></p>
                            <a href="{{ route('article.show', compact('article'))}}" class="btn btn-info text-white">Leggi</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-layout>