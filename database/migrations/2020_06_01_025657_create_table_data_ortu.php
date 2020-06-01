<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDataOrtu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_data_ortu', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('nama_ayah', 100);
            $table->enum('pendidikan_ayah', ['SD/MI', 'SMP/MTs', 'SMA/SMK', 'Diploma', 'S1', 'S2', 'S3']);
            $table->enum('pekerjaan_ayah', ['Buruh', 'Tani', 'Wiraswasta', 'PNS', 'TNI/Polri', 'Perangkat Desa', 'Nelayan', 'Lainnya']);
            $table->string('gaji_ayah', 100);
            $table->text('alamat_ayah');
            $table->string('kota_ayah', 100);
            $table->string('provinsi_ayah', 100);
            $table->string('kode_pos_ayah', 100);
            $table->string('nama_ibu', 100);
            $table->enum('pendidikan_ibu', ['SD/MI', 'SMP/MTs', 'SMA/SMK', 'Diploma', 'S1', 'S2', 'S3']);
            $table->enum('pekerjaan_ibu', ['Ibu Rumah Tangga', 'Buruh', 'Tani', 'Wiraswasta', 'PNS', 'TNI/Polri', 'Perangkat Desa', 'Nelayan', 'Lainnya']);
            $table->string('gaji_ibu', 100);
            $table->text('alamat_ibu');
            $table->string('kota_ibu', 100);
            $table->string('provinsi_ibu', 100);
            $table->string('kode_pos_ibu', 100);
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
        Schema::dropIfExists('table_data_ortu');
    }
}
