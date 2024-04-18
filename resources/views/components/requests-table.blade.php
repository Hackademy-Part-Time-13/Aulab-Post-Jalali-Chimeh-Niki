<table class="table table-dark table-striped table-hover border">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Azioni</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($roleRequests as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @switch($role)
                        @case('amministratore')
                            <a href="{{route('admin.setAdmin', compact('user'))}}" class="btn btn-info text-white">Attiva {{$role}}</a>
                            
                        @break
                        
                        @case('revisore')
                            <a href="{{route('admin.setRevisor', compact('user'))}}" class="btn btn-info text-white">Attiva {{$role}}</a>
                            
                        @break
                        
                        @case('redattore')
                            <a href="{{route('admin.setWriter', compact('user'))}}" class="btn btn-info text-white">Attiva {{$role}}</a>
                            
                        @break   
                    @endswitch


                    <a href="{{route('admin.rejectRole', compact('user'))}}" class="btn btn-danger text-white">Rifiuta {{$role}}</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>