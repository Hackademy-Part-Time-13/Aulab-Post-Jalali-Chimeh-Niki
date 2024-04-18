<x-layout>
    <div class="container-fluid p-5 text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1">
                Bentornato, {{ auth()->user()->name }}
            </h1>
        </div>
    </div>

    @if(session('message'))
        <div class="alert alert-success text-center">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger text-center">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>   
    @endif

    <div class="container my-5">
        <div class="row justify-content-center text-white">
            <div class="col-12">
                <h2>Richieste per il ruolo di Amministratore</h2>
                <x-requests-table :roleRequests="$adminRequests" role="amministratore"/>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center text-white">
            <div class="col-12">
                <h2>Richieste per il ruolo di revisore</h2>
                <x-requests-table :roleRequests="$revisorRequests" role="revisore"/>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center text-white">
            <div class="col-12">
                <h2>Richieste per il ruolo di redattore</h2>
                <x-requests-table :roleRequests="$writerRequests" role="redattore"/>
            </div>
        </div>
    </div>

    <hr>
    <div class="container my-5">
        <div class="row justify-content-center text-white">
            <div class="col-12">
                <h2>I tags della piattaforma</h2>
                <x-metainfo-table :metaInfos="$tags" metaType="tags"/>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center text-white">
            <div class="col-12">
                <h2>Le categorie della piattaforma</h2>
                <x-metainfo-table :metaInfos="$categories" metaType="categorie"/>
                <form class="d-flex" action="{{route('admin.storeCategory')}}" method="POST">
                    @csrf
                    <input type="text" name="name" class="form-control me-2" placeholder="Inserisci una nuova categoria">
                    <button class="btn btn-success text-white" type="submit">Aggiungi</button>
                </form>
            </div>
        </div>
    </div>


</x-layout>