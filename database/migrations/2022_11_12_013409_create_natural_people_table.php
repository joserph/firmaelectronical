<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNaturalPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('natural_people', function (Blueprint $table) {
            $table->id();

            $table->enum('tipo_solicitud', ['1']);
            $table->enum('contenedor', ['0', '1', '2']);
            $table->string('nombres');
            $table->string('apellido1');
            $table->string('apellido2');
            $table->enum('tipodocumento', ['CEDULA', 'PASAPORTE']);
            $table->string('numerodocumento');
            $table->string('coddactilar');
            $table->string('ruc_personal');
            $table->enum('sexo', ['HOMBRE', 'MUJER']);
            $table->date('fecha_nacimiento');
            $table->string('nacionalidad');
            $table->string('telfCelular');
            $table->string('telfCelular2');
            $table->string('telfFijo');
            $table->string('eMail');
            $table->string('eMail2');
            $table->string('provincia');
            $table->string('ciudad');
            $table->text('direccion');
            $table->enum('vigenciafirma', ['7 días', '1 año', '2 años', '3 años', '4 años', '5 años']);
            $table->enum('express', ['Si', 'No']);
            $table->string('f_cedulaFront');
            $table->string('f_cedulaBack');
            $table->string('f_selfie');
            $table->string('f_copiaruc');
            $table->string('f_adicional1'); // Documento Opcional Autorización Partner
            $table->string('f_adicional2');
            $table->string('f_adicional3');
            $table->string('f_adicional4');
            $table->enum('mismos_datos_factu', ['Si', 'No']);
            $table->date('fecha_deposito');
            $table->string('num_deposito');
            $table->string('nombre_banco');
            $table->string('nombre_depositante');
            $table->string('estatus_pago');
            $table->string('nombre_partner');
            $table->string('ruc_cedula_factura');
            $table->string('nombres_factura');
            $table->string('correo_factura');
            $table->string('direccion_factura');
            $table->string('telefono_factura');
            $table->string('comentarios_factura');
            $table->string('fecha_ingreso');
            $table->string('fecha_envio');
            $table->string('estatus');
            
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('user_update');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('user_update')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('natural_people');
    }
}
