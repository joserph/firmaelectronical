@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Tests</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('create-blog')
                                <a class="btn btn-info" href="{{ route('tests.create') }}"><i class="fas fa-plus-circle"></i> Crear</a>
                            @endcan
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead style="background-color: #6777ef;">
                                    <tr>
                                        <th style="color: #fff" scope="col">Titulo</th>
                                        <th style="color: #fff" scope="col">Contenido</th>
                                        <th style="color: #fff" scope="col">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tests as $blog)
                                            <tr>
                                                <th scope="row">{{ $blog->titulo }}</th>
                                                <th scope="row">{{ $blog->contenido }}</th>
                                                <td>
                                                    <a href="{{ route('tests.show', $blog->id) }}">Ver</a>
                                                    @can('edit-blog')
                                                        <a class="btn btn-warning" href="{{ route('tests.edit', $blog->id) }}"><i class="far fa-edit"></i></a>
                                                    @endcan
                                                    @can('delete-blog')
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['tests.destroy', $blog->id], 'style' => 'display:inline']) !!}
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
                                {{ $tests->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

