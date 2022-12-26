@extends('layouts.app')
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
@endsection
@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Ver Firma Representante Legal</li>
        </ol>
    </nav>
    <!-- Page Heading -->
    {{-- <h1 class="h3 mb-2 text-gray-800">Ver Representante Legal</h1> --}}
    
    <!-- //////////////// -->
    <div class="row d-flex justify-content-center">
        <div class="col-md-12">
            <div class="card shadow mb-4 border-primary">
                <div class="card-header py-3 bg-primary">
                    <h3 class="m-0 font-weight-bold text-light">Ver Representante Legal
                        <a href="{{ route('legal-representative.edit', $legal_representative->id) }}" class="btn btn-warning fa-pull-right"><i class="fas fa-edit"></i> Editar</a>
                    </h3>
                    
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm">
                        <tr>
                            <th>Tipo de Certificado</th>
                            <td>
                                @if ($legal_representative->contenedor == 0)
                                    <span class="badge badge-primary">ARCHIVO .P12</span>
                                @elseif($legal_representative->contenedor == 1)
                                    <span class="badge badge-info">TOKEN</span>
                                @else
                                    <span class="badge badge-dark">NUBE</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Nombres</th>
                            <td>{{ $legal_representative->nombres }}</td>
                        </tr>
                        <tr>
                            <th>Primer Apellido</th>
                            <td>{{ $legal_representative->apellido1 }}</td>
                        </tr>
                        <tr>
                            <th>Segundo Apellido</th>
                            <td>{{ $legal_representative->apellido2 }}</td>
                        </tr>
                        <tr>
                            <th>Documento de Identidad</th>
                            <td>{{ $legal_representative->tipodocumento }}</td>
                        </tr>
                        <tr>
                            <th>Número de documento</th>
                            <td>{{ $legal_representative->numerodocumento }}</td>
                        </tr>
                        <tr>
                            <th>Código Dactilar</th>
                            <td>{{ $legal_representative->coddactilar }}</td>
                        </tr>
                        {{-- <tr>
                            <th>RUC Personal</th>
                            <td>{{ $legal_representative->ruc_personal }}</td>
                        </tr> --}}
                        <tr>
                            <th>Sexo</th>
                            <td>{{ $legal_representative->sexo }}</td>
                        </tr>
                        <tr>
                            <th>Fecha de Nacimiento</th>
                            <td>{{ $legal_representative->fecha_nacimiento }}</td>
                        </tr>
                        <tr>
                            <th>Nacionalidad</th>
                            <td>{{ $legal_representative->nacionalidad }}</td>
                        </tr>
                        <tr>
                            <th>Teléfono Celular</th>
                            <td>{{ $legal_representative->telfCelular }}</td>
                        </tr>
                        <tr>
                            <th>Teléfono Celular 2</th>
                            <td>{{ $legal_representative->telfCelular2 }}</td>
                        </tr>
                        <tr>
                            <th>Correo</th>
                            <td>{{ $legal_representative->eMail }}</td>
                        </tr>
                        <tr>
                            <th>Correo 2</th>
                            <td>{{ $legal_representative->eMail2 }}</td>
                        </tr>
                        <tr>
                            <th>Empresa</th>
                            <td>{{ $legal_representative->empresa }}</td>
                        </tr>
                        <tr>
                            <th>RUC Empresa</th>
                            <td>{{ $legal_representative->ruc_empresa }}</td>
                        </tr>
                        <tr>
                            <th>Cargo</th>
                            <td>{{ $legal_representative->cargo }}</td>
                        </tr>
                        <tr>
                            <th>Provincia</th>
                            <td>{{ $legal_representative->provincia }}</td>
                        </tr>
                        <tr>
                            <th>Ciudad</th>
                            <td>{{ $legal_representative->ciudad }}</td>
                        </tr>
                        <tr>
                            <th>Dirección</th>
                            <td>{{ $legal_representative->direccion }}</td>
                        </tr>
                        <tr>
                            <th>Vigencia o Duración</th>
                            <td>{{ $legal_representative->vigenciafirma }}</td>
                        </tr>
                        <tr>
                            <th>Estatus de Pago</th>
                            <td>
                                @if ($legal_representative->estatus_pago == 'Abundancia')
                                    <span class="badge badge-primary">ABUNDANCIA</span>
                                @elseif ($legal_representative->estatus_pago == 'Exito')
                                    <span class="badge badge-secondary">ÉXITO</span>
                                @elseif ($legal_representative->estatus_pago == 'Oficina')
                                    <span class="badge badge-info">OFICINA</span>
                                @elseif ($legal_representative->estatus_pago == 'Pagado')
                                    <span class="badge badge-success">PAGADO</span>
                                @elseif ($legal_representative->estatus_pago == 'Pendiente')
                                    <span class="badge badge-danger">PENDIENTE</span>
                                @elseif ($legal_representative->estatus_pago == 'Redes')
                                    <span class="badge badge-warning">REDES</span>
                                @elseif ($legal_representative->estatus_pago == 'Ricardo')
                                    <span class="badge badge-light">RICARDO</span>
                                @elseif ($legal_representative->estatus_pago == 'Virginia')
                                    <span class="badge badge-light">VIRGINIA</span>
                                @else
                                    <span class="badge badge-dark">SIN ESTATUS DE PAGO</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2" class="text-center lead">Archivos adjuntos</th>
                        </tr>
                        <tr>
                            <th>Foto Cédula Frontal</th>
                            <td>{{ $legal_representative->f_cedulaFront }}</td>
                        </tr>
                        <tr>
                            <th>Foto Cédula Posterior</th>
                            <td>{{ $legal_representative->f_cedulaBack }}</td>
                        </tr>
                        <tr>
                            <th>Foto Tipo Selfie</th>
                            <td>{{ $legal_representative->f_selfie }}</td>
                        </tr>
                        <tr>
                            <th>Copia RUC</th>
                            <td>{{ $legal_representative->f_copiaruc }}</td>
                        </tr>
                        <tr>
                            <th>Acta de Nombramiento (Carta aceptación)</th>
                            <td>{{ $legal_representative->f_nombramiento }}</td>
                        </tr>
                        <tr>
                            <th>Acta de Nombramiento (Registro Mercantil o ente regulador)</th>
                            <td>{{ $legal_representative->f_nombramiento2 }}</td>
                        </tr>
                        <tr>
                            <th>Acta Constitución</th>
                            <td>{{ $legal_representative->f_constitucion }}</td>
                        </tr>
                        <tr>
                            <th>Documento Opcional Autorización Partner</th>
                            <td>{{ $legal_representative->f_adicional1 }}</td>
                        </tr>
                        <tr>
                            <th colspan="2" class="text-center lead">Datos para la Factura</th>
                        </tr>
                        <tr>
                            <th>¿Desea su Factura Electrónica con los mismo datos ingresados?</th>
                            <td>{{ $legal_representative->mismos_datos_factu }}</td>
                        </tr>
                        <tr>
                            <th>RUC / Cédula</th>
                            <td>{{ $legal_representative->ruc_cedula_factura }}</td>
                        </tr>
                        <tr>
                            <th>Nombres Completos</th>
                            <td>{{ $legal_representative->nombres_factura }}</td>
                        </tr>
                        <tr>
                            <th>Correo (si desea puede modificarse)</th>
                            <td>{{ $legal_representative->correo_factura  }}</td>
                        </tr>
                        <tr>
                            <th>Dirección</th>
                            <td>{{ $legal_representative->direccion_factura }}</td>
                        </tr>
                        <tr>
                            <th>Teléfono Fíjo</th>
                            <td>{{ $legal_representative->telefono_factura }}</td>
                        </tr>
                        <tr>
                            <th>Comentarios</th>
                            <td>{{ $legal_representative->comentarios_factura }}</td>
                        </tr>
                        <tr>
                            <th colspan="2" class="text-center lead">Dostos de depósito o transferencia</th>
                        </tr>
                        <tr>
                            <th>Fecha</th>
                            <td>{{ $legal_representative->fecha_deposito }}</td>
                        </tr>
                        <tr>
                            <th>Número de Depósito</th>
                            <td>{{ $legal_representative->num_deposito }}</td>
                        </tr>
                        <tr>
                            <th>Nombre de la institución financiera</th>
                            <td>{{ $legal_representative->nombre_banco }}</td>
                        </tr>
                        <tr>
                            <th>Nombre del titular</th>
                            <td>{{ $legal_representative->nombre_depositante }}</td>
                        </tr>
                        <tr>
                            <th>Servicio flash Costo $20 mas iva adicionales (Entrega 15 Minutos)</th>
                            <td>{{ $legal_representative->express }}</td>
                        </tr>
                        <tr>
                            <th>Campo opcional Nombre y Apellido del Partner</th>
                            <td>{{ $legal_representative->nombre_partner }}</td>
                        </tr>
                        <tr>
                            <th colspan="2"><a href="{{ route('legal-representative.edit', $legal_representative->id) }}" class="btn btn-warning fa-pull-right"><i class="fas fa-edit"></i> Editar</a></th>
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


