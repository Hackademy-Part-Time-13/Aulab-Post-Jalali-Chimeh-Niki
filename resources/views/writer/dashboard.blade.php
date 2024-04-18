<x-layout>
    <div class="container-fluid p-5 text-center text-white">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1>Bentornato, {{Auth::user()->name}}</h1>
            </div>
        </div>
    </div>

    @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('message')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container my-5">
        <div class="row justify-content-center text-white">
            <div class="col-12">
                <h2>Articoli pubblicati</h2>
                <x-writer-articles-table :articles="$acceptedArticles"/>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center text-white">
            <div class="col-12">
                <h2>Articoli in attesa di revisione</h2>
                <x-writer-articles-table :articles="$unrevisionedArticles"/>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center text-white">
            <div class="col-12">
                <h2>Articoli rifiutati</h2>
                <x-writer-articles-table :articles="$rejectedArticles"/>
            </div>
        </div>
    </div>
</x-layout>