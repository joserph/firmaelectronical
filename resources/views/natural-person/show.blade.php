@extends('layouts.app')
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
@endsection
@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Ver Firma Persona Natural</li>
        </ol>
    </nav>
    <!-- Page Heading -->
    {{-- <h1 class="h3 mb-2 text-gray-800">Ver Persona Natural</h1> --}}
    
    <!-- //////////////// -->
    <div class="row d-flex justify-content-center">
        <div class="col-md-12">
            <div class="card shadow mb-4 border-info">
                <div class="card-header py-3 bg-info">
                    <h3 class="m-0 font-weight-bold text-light">Ver Persona Natural
                        <a href="{{ route('natural-person.edit', $natural_person->id) }}" class="btn btn-warning fa-pull-right"><i class="fas fa-edit"></i> Editar</a>
                    </h3>
                    
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm">
                        <tr>
                            <th>Tipo de Certificado</th>
                            <td>
                                @if ($natural_person->contenedor == 0)
                                    <span class="badge badge-primary">ARCHIVO .P12</span>
                                @elseif($natural_person->contenedor == 1)
                                    <span class="badge badge-info">TOKEN</span>
                                @else
                                    <span class="badge badge-dark">NUBE</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Nombres</th>
                            <td>{{ $natural_person->nombres }}</td>
                        </tr>
                        <tr>
                            <th>Primer Apellido</th>
                            <td>{{ $natural_person->apellido1 }}</td>
                        </tr>
                        <tr>
                            <th>Segundo Apellido</th>
                            <td>{{ $natural_person->apellido2 }}</td>
                        </tr>
                        <tr>
                            <th>Documento de Identidad</th>
                            <td>{{ $natural_person->tipodocumento }}</td>
                        </tr>
                        <tr>
                            <th>Número de documento</th>
                            <td>{{ $natural_person->numerodocumento }}</td>
                        </tr>
                        <tr>
                            <th>Código Dactilar</th>
                            <td>{{ $natural_person->coddactilar }}</td>
                        </tr>
                        <tr>
                            <th>RUC Personal</th>
                            <td>{{ $natural_person->ruc_personal }}</td>
                        </tr>
                        <tr>
                            <th>Sexo</th>
                            <td>{{ $natural_person->sexo }}</td>
                        </tr>
                        <tr>
                            <th>Fecha de Nacimiento</th>
                            <td>{{ $natural_person->fecha_nacimiento }}</td>
                        </tr>
                        <tr>
                            <th>Nacionalidad</th>
                            <td>{{ $natural_person->nacionalidad }}</td>
                        </tr>
                        <tr>
                            <th>Teléfono Celular</th>
                            <td>{{ $natural_person->telfCelular }}</td>
                        </tr>
                        <tr>
                            <th>Teléfono Celular 2</th>
                            <td>{{ $natural_person->telfCelular2 }}</td>
                        </tr>
                        <tr>
                            <th>Correo</th>
                            <td>{{ $natural_person->eMail }}</td>
                        </tr>
                        <tr>
                            <th>Correo 2</th>
                            <td>{{ $natural_person->eMail2 }}</td>
                        </tr>
                        <tr>
                            <th>Provincia</th>
                            <td>{{ $natural_person->provincia }}</td>
                        </tr>
                        <tr>
                            <th>Ciudad</th>
                            <td>{{ $natural_person->ciudad }}</td>
                        </tr>
                        <tr>
                            <th>Dirección</th>
                            <td>{{ $natural_person->direccion }}</td>
                        </tr>
                        <tr>
                            <th>Vigencia o Duración</th>
                            <td>{{ $natural_person->vigenciafirma }}</td>
                        </tr>
                        <tr>
                            <th>Estatus de Pago</th>
                            <td>
                                @if ($natural_person->estatus_pago == 'Abundancia')
                                    <span class="badge badge-primary">ABUNDANCIA</span>
                                @elseif ($natural_person->estatus_pago == 'Exito')
                                    <span class="badge badge-secondary">ÉXITO</span>
                                @elseif ($natural_person->estatus_pago == 'Oficina')
                                    <span class="badge badge-info">OFICINA</span>
                                @elseif ($natural_person->estatus_pago == 'Pagado')
                                    <span class="badge badge-success">PAGADO</span>
                                @elseif ($natural_person->estatus_pago == 'Pendiente')
                                    <span class="badge badge-danger">PENDIENTE</span>
                                @elseif ($natural_person->estatus_pago == 'Redes')
                                    <span class="badge badge-warning">REDES</span>
                                @elseif ($natural_person->estatus_pago == 'Ricardo')
                                    <span class="badge badge-light">RICARDO</span>
                                @else
                                    <span class="badge badge-dark">VIRGINIA</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2" class="text-center lead">Archivos adjuntos</th>
                        </tr>
                        <tr>
                            <th>Foto Cédula Frontal</th>
                            <td>{{ $natural_person->f_cedulaFront }}</td>
                        </tr>
                        <tr>
                            <th>Foto Cédula Posterior</th>
                            <td>{{ $natural_person->f_cedulaBack }}</td>
                        </tr>
                        <tr>
                            <th>Foto Tipo Selfie</th>
                            <td>{{ $natural_person->f_selfie }}</td>
                        </tr>
                        <tr>
                            <th>Copia RUC</th>
                            <td>{{ $natural_person->f_copiaruc }}</td>
                        </tr>
                        <tr>
                            <th>Documento Opcional Autorización Partner</th>
                            <td>{{ $natural_person->f_adicional1 }}</td>
                        </tr>
                        <tr>
                            <th colspan="2" class="text-center lead">Datos para la Factura</th>
                        </tr>
                        <tr>
                            <th>¿Desea su Factura Electrónica con los mismo datos ingresados?</th>
                            <td>{{ $natural_person->mismos_datos_factu }}</td>
                        </tr>
                        <tr>
                            <th>RUC / Cédula</th>
                            <td>{{ $natural_person->ruc_cedula_factura }}</td>
                        </tr>
                        <tr>
                            <th>Nombres Completos</th>
                            <td>{{ $natural_person->nombres_factura }}</td>
                        </tr>
                        <tr>
                            <th>Correo (si desea puede modificarse)</th>
                            <td>{{ $natural_person->correo_factura  }}</td>
                        </tr>
                        <tr>
                            <th>Dirección</th>
                            <td>{{ $natural_person->direccion_factura }}</td>
                        </tr>
                        <tr>
                            <th>Teléfono Fíjo</th>
                            <td>{{ $natural_person->telefono_factura }}</td>
                        </tr>
                        <tr>
                            <th>Comentarios</th>
                            <td>{{ $natural_person->comentarios_factura }}</td>
                        </tr>
                        <tr>
                            <th colspan="2" class="text-center lead">Dostos de depósito o transferencia</th>
                        </tr>
                        <tr>
                            <th>Fecha</th>
                            <td>{{ $natural_person->fecha_deposito }}</td>
                        </tr>
                        <tr>
                            <th>Número de Depósito</th>
                            <td>{{ $natural_person->num_deposito }}</td>
                        </tr>
                        <tr>
                            <th>Nombre de la institución financiera</th>
                            <td>{{ $natural_person->nombre_banco }}</td>
                        </tr>
                        <tr>
                            <th>Nombre del titular</th>
                            <td>{{ $natural_person->nombre_depositante }}</td>
                        </tr>
                        <tr>
                            <th>Servicio flash Costo $20 mas iva adicionales (Entrega 15 Minutos)</th>
                            <td>{{ $natural_person->express }}</td>
                        </tr>
                        <tr>
                            <th>Campo opcional Nombre y Apellido del Partner</th>
                            <td>{{ $natural_person->nombre_partner }}</td>
                        </tr>
                        <tr>
                            <th colspan="2"><a href="{{ route('natural-person.edit', $natural_person->id) }}" class="btn btn-warning fa-pull-right"><i class="fas fa-edit"></i> Editar</a></th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@section('page_js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('save') == 'true')
        <script>
            Swal.fire({
                title: '¡Tu tramite fue subido con éxito!',
                html: 'Si necesitas saber el estado de tu tramite o enviar el pago da click <a href=\"https://wa.me/message/X6UL7Y5D6MS4F1\" target=\"_blank\">AQUÍ</a> ',
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


