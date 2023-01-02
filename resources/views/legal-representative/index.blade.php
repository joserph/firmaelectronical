@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lista de Registros Representante Legal</li>
        </ol>
    </nav>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Lista de Registros Representante Legal
        <a href="{{ route('legal-representative.create') }}" class="btn btn-info fa-pull-right"><i class="fas fa-plus-circle"></i> Agregar</a>
    </h1>
    
    <div class="table-responsive">
        <table class="table table-hover table-bordered table-sm">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class="text-center"><small>Fecha Ingreso</small></th>
                    <th scope="col" class="text-center"><small>Documento</small></th>
                    <th scope="col" class="text-center"><small>Nombres</small></th>
                    <th scope="col" class="text-center"><small>Apellidos</small></th>
                    <th scope="col" class="text-center"><small>Estatus Firma</small></th>
                    <th scope="col" class="text-center"><small>Partner</small></th>
                    <th scope="col" class="text-center"><small>Estatus Pago</small></th>
                    <th scope="col" class="text-center"><small>Número Deposito</small></th>
                    <th scope="col" class="text-center"><small>Ver</small></th>
                    <th scope="col" class="text-center"><small>Editar</small></th>
                    <th scope="col" class="text-center"><small>Procesar</small></th>
                    <th scope="col" class="text-center"><small>Consultar</small></th>
                    <th scope="col" class="text-center"><small>Eliminar</small></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($legal_representatives as $item)
                <tr>
                    <td><small>{{ date('d/m/Y h:i:s', strtotime($item->fecha_ingreso)) }}</small></td>
                    <td><small>{{ $item->numerodocumento }}</small></td>
                    <td><small>{{ $item->nombres }}</small></td>
                    <td><small>{{ $item->apellido1 }} {{ $item->apellido2 }}</small></td>
                    <td><small>{{ $item->estatus }}</small></td>
                    <td><small>{{ $item->nombre_partner }}</small></td>
                    <td><small>{{ $item->estatus_pago }}</small></td>
                    <td><small>{{ $item->num_deposito }}</small></td>
                    <td class="text-center"><small><a href="{{ route('legal-representative.show', $item->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a></small></td>
                    <td class="text-center"><small><a href="{{ route('legal-representative.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a></small></td>
                    <td class="text-center"><small><a href="{{ route('legal-representative.show', $item->id) }}" class="btn btn-success btn-sm"><i class="fas fa-file-upload"></i></a></small></td>
                    <td class="text-center"><small><a href="{{ route('legal-representative.show', $item->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-search"></i></a></small></td>
                    <td class="text-center"><small>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['legal-representative.destroy', $item->id], 'style' => 'display:inline']) !!}
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </small></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@section('page_js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('save') == 'true')
        <script>
            Swal.fire({
                title: '¡Tu tramite fue subido con éxito!',
                html: 'Si necesitas saber el estado de tu tramite o enviar el pago da click <a href=\"{{ url('/') }}\" target=\"_blank\">AQUÍ</a> ',
                icon: 'success',
                allowOutsideClick: false,
                imageUrl: 'web/public/img/working.png',
                imageWidth: '100px',
                imageAlt: 'Estamos trabajando',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ok'
                }).then((result) => {
                if (result.isConfirmed) {
                    
                }
            });
        </script>
    @endif
    @if (session('delete') == 'true')
        <script>
            Swal.fire({
                title: '¡Tu firma fue eliminada con éxito!',
                html: '',
                icon: 'success',
                allowOutsideClick: false,
                imageUrl: 'web/public/img/working.png',
                imageWidth: '100px',
                imageAlt: '',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ok'
                }).then((result) => {
                if (result.isConfirmed) {
                    
                }
            });
        </script>
    @endif
@endsection
@endsection

