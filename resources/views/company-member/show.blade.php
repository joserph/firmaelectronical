@extends('layouts.app')
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
@endsection
@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
            @auth()
                <li class="breadcrumb-item"><a href="{{ route('company-member.index') }}">Lista de Registros Miembro de Empresa</a></li>
            @endauth
            <li class="breadcrumb-item active" aria-current="page">Ver Firma Miembro de Empresa</li>
        </ol>
    </nav>
    <!-- Page Heading -->
    {{-- <h1 class="h3 mb-2 text-gray-800">Ver Miembro de Empresa</h1> --}}
    
    <!-- //////////////// -->
    <div class="row d-flex justify-content-center">
        <div class="col-md-12">
            <div class="card shadow mb-4 border-primary">
                <div class="card-header py-3 bg-primary">
                    <h3 class="m-0 font-weight-bold text-light">Ver Miembro de Empresa
                        <a href="{{ route('company-member.edit', $company_member->id) }}" class="btn btn-warning fa-pull-right"><i class="fas fa-edit"></i> Editar</a>
                    </h3>
                    
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm">
                        <tr>
                            <th>Tipo de Certificado</th>
                            <td>
                                @if ($company_member->contenedor == 0)
                                    <span class="badge badge-primary">ARCHIVO .P12</span>
                                @elseif($company_member->contenedor == 1)
                                    <span class="badge badge-info">TOKEN</span>
                                @else
                                    <span class="badge badge-dark">NUBE</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Nombres</th>
                            <td>{{ $company_member->nombres }}</td>
                        </tr>
                        <tr>
                            <th>Primer Apellido</th>
                            <td>{{ $company_member->apellido1 }}</td>
                        </tr>
                        <tr>
                            <th>Segundo Apellido</th>
                            <td>{{ $company_member->apellido2 }}</td>
                        </tr>
                        <tr>
                            <th>Documento de Identidad</th>
                            <td>{{ $company_member->tipodocumento }}</td>
                        </tr>
                        <tr>
                            <th>Número de documento</th>
                            <td>{{ $company_member->numerodocumento }}</td>
                        </tr>
                        <tr>
                            <th>Código Dactilar</th>
                            <td>{{ $company_member->coddactilar }}</td>
                        </tr>
                        {{-- <tr>
                            <th>RUC Personal</th>
                            <td>{{ $company_member->ruc_personal }}</td>
                        </tr> --}}
                        <tr>
                            <th>Sexo</th>
                            <td>{{ $company_member->sexo }}</td>
                        </tr>
                        <tr>
                            <th>Fecha de Nacimiento</th>
                            <td>{{ date('d/m/Y', strtotime($company_member->fecha_nacimiento)) }}</td>
                        </tr>
                        <tr>
                            <th>Nacionalidad</th>
                            <td>{{ $company_member->nacionalidad }}</td>
                        </tr>
                        <tr>
                            <th>Teléfono Celular</th>
                            <td>{{ $company_member->telfCelular }}</td>
                        </tr>
                        <tr>
                            <th>Teléfono Celular 2</th>
                            <td>{{ $company_member->telfCelular2 }}</td>
                        </tr>
                        <tr>
                            <th>Correo</th>
                            <td>{{ $company_member->eMail }}</td>
                        </tr>
                        <tr>
                            <th>Correo 2</th>
                            <td>{{ $company_member->eMail2 }}</td>
                        </tr>
                        <tr>
                            <th>Empresa</th>
                            <td>{{ $company_member->empresa }}</td>
                        </tr>
                        <tr>
                            <th>RUC Empresa</th>
                            <td>{{ $company_member->ruc_empresa }}</td>
                        </tr>
                        <tr>
                            <th>Cargo</th>
                            <td>{{ $company_member->cargo }}</td>
                        </tr>
                        <tr>
                            <th>Motivo</th>
                            <td>{{ $company_member->motivo }}</td>
                        </tr>
                        <tr>
                            <th>Unidad</th>
                            <td>{{ $company_member->unidad }}</td>
                        </tr>
                        <tr>
                            <th>Provincia</th>
                            <td>{{ $company_member->provincia }}</td>
                        </tr>
                        <tr>
                            <th>Ciudad</th>
                            <td>{{ $company_member->ciudad }}</td>
                        </tr>
                        <tr>
                            <th>Dirección</th>
                            <td>{{ $company_member->direccion }}</td>
                        </tr>
                        <tr>
                            <th>Nombre RL</th>
                            <td>{{ $company_member->nombresRL }}</td>
                        </tr>
                        <tr>
                            <th>Apellidos RL</th>
                            <td>{{ $company_member->apellidosRL }}</td>
                        </tr>
                        <tr>
                            <th>Documento de Identidad RL</th>
                            <td>{{ $company_member->tipodocumentoRL }}</td>
                        </tr>
                        <tr>
                            <th>Número de documento RL</th>
                            <td>{{ $company_member->numerodocumentoRL }}</td>
                        </tr>
                        <tr>
                            <th>Vigencia o Duración</th>
                            <td>{{ $company_member->vigenciafirma }}</td>
                        </tr>
                        <tr>
                            <th>Estatus de Pago</th>
                            <td>
                                @if ($company_member->estatus_pago == 'Abundancia')
                                    <span class="badge badge-primary">ABUNDANCIA</span>
                                @elseif ($company_member->estatus_pago == 'Exito')
                                    <span class="badge badge-secondary">ÉXITO</span>
                                @elseif ($company_member->estatus_pago == 'Oficina')
                                    <span class="badge badge-info">OFICINA</span>
                                @elseif ($company_member->estatus_pago == 'Pagado')
                                    <span class="badge badge-success">PAGADO</span>
                                @elseif ($company_member->estatus_pago == 'Pendiente')
                                    <span class="badge badge-danger">PENDIENTE</span>
                                @elseif ($company_member->estatus_pago == 'Redes')
                                    <span class="badge badge-warning">REDES</span>
                                @elseif ($company_member->estatus_pago == 'Ricardo')
                                    <span class="badge badge-light">RICARDO</span>
                                @elseif ($company_member->estatus_pago == 'Virginia')
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
                            <td>{{ $company_member->f_cedulaFront }}</td>
                        </tr>
                        <tr>
                            <th>Foto Cédula Posterior</th>
                            <td>{{ $company_member->f_cedulaBack }}</td>
                        </tr>
                        <tr>
                            <th>Foto Tipo Selfie</th>
                            <td>{{ $company_member->f_selfie }}</td>
                        </tr>
                        <tr>
                            <th>Copia RUC</th>
                            <td>{{ $company_member->f_copiaruc }}</td>
                        </tr>
                        <tr>
                            <th>Acta de Nombramiento (Carta aceptación)</th>
                            <td>{{ $company_member->f_nombramiento }}</td>
                        </tr>
                        <tr>
                            <th>Acta de Nombramiento (Registro Mercantil o ente regulador)</th>
                            <td>{{ $company_member->f_nombramiento2 }}</td>
                        </tr>
                        <tr>
                            <th>Acta Constitución</th>
                            <td>{{ $company_member->f_constitucion }}</td>
                        </tr>
                        <tr>
                            <th>Documento RL</th>
                            <td>{{ $company_member->f_documentoRL }}</td>
                        </tr>
                        <tr>
                            <th>Autorización RL</th>
                            <td>{{ $company_member->f_autreprelegal }}</td>
                        </tr>
                        <tr>
                            <th>Documento Opcional Autorización Partner</th>
                            <td>{{ $company_member->f_adicional1 }}</td>
                        </tr>
                        <tr>
                            <th colspan="2" class="text-center lead">Datos para la Factura</th>
                        </tr>
                        <tr>
                            <th>¿Desea su Factura Electrónica con los mismo datos ingresados?</th>
                            <td>{{ $company_member->mismos_datos_factu }}</td>
                        </tr>
                        <tr>
                            <th>RUC / Cédula</th>
                            <td>{{ $company_member->ruc_cedula_factura }}</td>
                        </tr>
                        <tr>
                            <th>Nombres Completos</th>
                            <td>{{ $company_member->nombres_factura }}</td>
                        </tr>
                        <tr>
                            <th>Correo (si desea puede modificarse)</th>
                            <td>{{ $company_member->correo_factura  }}</td>
                        </tr>
                        <tr>
                            <th>Dirección</th>
                            <td>{{ $company_member->direccion_factura }}</td>
                        </tr>
                        <tr>
                            <th>Teléfono Fíjo</th>
                            <td>{{ $company_member->telefono_factura }}</td>
                        </tr>
                        <tr>
                            <th>Comentarios</th>
                            <td>{{ $company_member->comentarios_factura }}</td>
                        </tr>
                        <tr>
                            <th colspan="2" class="text-center lead">Dostos de depósito o transferencia</th>
                        </tr>
                        <tr>
                            <th>Fecha</th>
                            <td>{{ date('d/m/Y', strtotime($company_member->fecha_deposito)) }}</td>
                        </tr>
                        <tr>
                            <th>Número de Depósito</th>
                            <td>{{ $company_member->num_deposito }}</td>
                        </tr>
                        <tr>
                            <th>Nombre de la institución financiera</th>
                            <td>{{ $company_member->nombre_banco }}</td>
                        </tr>
                        <tr>
                            <th>Nombre del titular</th>
                            <td>{{ $company_member->nombre_depositante }}</td>
                        </tr>
                        <tr>
                            <th>Servicio flash Costo $20 mas iva adicionales (Entrega 15 Minutos)</th>
                            <td>{{ $company_member->express }}</td>
                        </tr>
                        <tr>
                            <th>Campo opcional Nombre y Apellido del Partner</th>
                            <td>{{ $company_member->nombre_partner }}</td>
                        </tr>
                        <tr>
                            <th colspan="2"><a href="{{ route('company-member.edit', $company_member->id) }}" class="btn btn-warning fa-pull-right"><i class="fas fa-edit"></i> Editar</a></th>
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


