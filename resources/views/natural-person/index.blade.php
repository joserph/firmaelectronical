@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Persona Natural</li>
        </ol>
    </nav>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Persona Natural</h1>
    
    <div class="table-responsive">
        <table class="table table-hover table-bordered table-sm">
            <thead>
              <tr>
                <th scope="col">Fecha</th>
                <th scope="col">Documento</th>
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Estatus Firma</th>
                <th scope="col">Partner</th>
                <th scope="col">Estatus Pago</th>
                <th scope="col">Número Deposito</th>
                <th scope="col">Ver</th>
                <th scope="col">Editar</th>
                <th scope="col">Procesar</th>
                <th scope="col">Consultar</th>
                <th scope="col">Eliminar</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Mark</td>
              </tr>
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
@endsection
@endsection

