@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Usuarios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('create-user')
                                <a class="btn btn-info" href="{{ route('users.create') }}"><i class="fas fa-plus-circle"></i> Crear</a>
                            @endcan
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                    <thead style="background-color: #6777ef;">
                                    <tr>
                                        <th class="text-center" style="color: #fff" scope="col">ID</th>
                                        <th class="text-center" style="color: #fff" scope="col">Nombre</th>
                                        <th class="text-center" style="color: #fff" scope="col">E-mail</th>
                                        <th class="text-center" style="color: #fff" scope="col">Rol</th>
                                        <th class="text-center" style="color: #fff" scope="col">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <th class="text-center" scope="row">{{ $user->id }}</th>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td class="text-center">
                                                    @if (!empty($user->getRoleNames()))
                                                        @foreach ($user->getRoleNames() as $rolName)
                                                            <h5><span class="badge badge-dark">{{ $rolName }}</span></h5>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @can('edit-user')
                                                        <a class="btn btn-warning" href="{{ route('users.edit', $user->id) }}"><i class="far fa-edit"></i></a>
                                                    @endcan
                                                    @can('delete-user')
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                                                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
                                                        {!! Form::close() !!}
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    
                                    </tbody>
                                </table>
                            </div>
                            <div class="pagination justify-content-end">
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

