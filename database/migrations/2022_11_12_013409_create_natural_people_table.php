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
            $table->string('apellido2')->nullable();
            $table->enum('tipodocumento', ['CEDULA', 'PASAPORTE']);
            $table->string('numerodocumento');
            $table->string('coddactilar')->nullable();
            $table->string('ruc_personal')->nullable();
            $table->enum('sexo', ['HOMBRE', 'MUJER']);
            $table->date('fecha_nacimiento');
            $table->string('nacionalidad');
            $table->string('telfCelular');
            $table->string('telfCelular2');
            $table->string('telfFijo')->nullable();
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
            $table->string('f_copiaruc')->nullable();
            $table->string('f_adicional1')->nullable(); // Documento Opcional Autorización Partner
            $table->string('f_adicional2')->nullable();
            $table->string('f_adicional3')->nullable();
            $table->string('f_adicional4')->nullable();
            $table->enum('mismos_datos_factu', ['Si', 'No']);
            $table->date('fecha_deposito')->nullable();
            $table->string('num_deposito')->nullable();
            $table->string('nombre_banco')->nullable();
            $table->string('nombre_depositante')->nullable();
            $table->string('estatus_pago')->nullable();
            $table->string('nombre_partner')->nullable();
            $table->string('ruc_cedula_factura')->nullable();
            $table->string('nombres_factura')->nullable();
            $table->string('correo_factura')->nullable();
            $table->string('direccion_factura')->nullable();
            $table->string('telefono_factura')->nullable();
            $table->string('comentarios_factura')->nullable();
            $table->dateTimeTz('fecha_ingreso')->nullable();
            $table->dateTimeTz('fecha_envio')->nullable();
            $table->string('estatus')->nullable();
            
            $table->unsignedBigInteger('user_update')->nullable();

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
