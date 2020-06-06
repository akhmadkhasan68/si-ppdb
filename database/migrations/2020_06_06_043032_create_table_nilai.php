<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableNilai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_nilai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('matematika', 100);
            $table->string('bahasa_indonesia', 100);
            $table->string('bahasa_inggris', 100);
            $table->string('ipa', 100);
            $table->string('semester_1', 100);
            $table->string('semester_2', 100);
            $table->string('semester_3', 100);
            $table->string('semester_4', 100);
            $table->string('semester_5', 100);
            $table->string('semester_6', 100);
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
        Schema::dropIfExists('table_nilai');
    }
}
