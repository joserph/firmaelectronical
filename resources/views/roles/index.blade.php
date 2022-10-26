@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Roles</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('create-rol')
                                <a class="btn btn-info" href="{{ route('roles.create') }}"><i class="fas fa-plus-circle"></i> Crear</a>
                            @endcan
                            <hr>
                            <div class="table-responsive col-md-6 offset-md-3">
                                <table class="table table-striped table-sm">
                                    <thead style="background-color: #6777ef;">
                                    <tr>
                                        <th class="text-center" style="color: #fff" scope="col">Rol</th>
                                        <th class="text-center" style="color: #fff" scope="col">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $role)
                                            <tr>
                                                <th scope="row">{{ $role->name }}</th>
                                                <td class="text-center">
                                                    @can('edit-rol')
                                                        <a class="btn btn-warning" href="{{ route('roles.edit', $role->id) }}"><i class="far fa-edit"></i></a>
                                                    @endcan
                                                    @can('delete-rol')
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
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
                                {{ $roles->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

