<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDataDiri extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_data_diri', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name', 100);    
            $table->string('nisn', 100);    
            $table->string('nik', 100);    
            $table->string('tempat_lahir', 100);    
            $table->date('tanggal_lahir');
            $table->enum('agama', ['Islam', 'Kristen Katolik', 'Kristen Protestan', 'Hindu', 'Buddha']);
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('email', 100);    
            $table->string('nomor_handphone', 100);    
            $table->text('alamat_lengkap'); 
            $table->string('kota', 100);       
            $table->string('provinsi', 100);       
            $table->string('kode_pos', 100);       
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_data_diri');
    }
}
