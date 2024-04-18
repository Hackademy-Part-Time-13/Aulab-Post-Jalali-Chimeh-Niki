<x-layout>
    <div class="container-fluid p-5 text-center text-white">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1">Modifica articolo</h1>
            </div>
        </div>

        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        
                    @endif

                    <form action="{{ route('article.update', ['article' => $article->id]) }}" method="POST" class="card p-5 shadow" enctype="multipart/form-data">                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Titolo</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $article->title }}">
                        </div>

                        <div class="mb-3">
                            <label for="subtitle" class="form-label">Sottotitolo</label>
                            <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ $article->subtitle }}">
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Immagine:</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Categoria:</label>
                            <select name="category" id="category" class="form-control text-capitalize">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if ($article->category && $category->id == $article->category->id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="body" class="form-label">Corpo del testo</label>
                            <textarea name="body" id="body" cols="30" rows="7" class="form-control">{{ $article->body }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="tags" class="form-label">Tags:</label>
                            <input name="tags" id="tags" class="form-control" value="{{ $article->tags->implode('name',', ') }}">
                            <span class="small fst-italic">Dividi ogni tag con una virgola</span>
                        </div>

                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary">Salva modifiche</button>
                            <a href="{{route('homepage')}}" class="btn btn-outline-info text-dark">Home Page</a>
                        </div>

                    </form>

                    
        </div>
</x-layout>