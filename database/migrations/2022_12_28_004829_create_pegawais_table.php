<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 100)->unique();
            $table->string('nama', 100);
            $table->string('tmpt_lahir', 40);
            $table->date('tgl_lahir');
            $table->enum('jenis_kelamin',['Laki-laki','Perempuan']);
            $table->string('alamat');
            $table->string('foto', 100)->nullable();
            $table->string('nohp', 40);

            // $table->foreign('agama_id')->references('id')->on('agama');
            // $table->foreign('negara_id')->references('id')->on('negara');
            // $table->foreign('igol_darah_id')->references('id')->on('gololongan darah');
            // $table->foreign('skeluarga_id')->references('id')->on('keluarga');
            

            $table->smallInteger('agama_id')->nullable();
            $table->smallInteger('negara_id')->nullable();
            $table->smallInteger('gol_darah_id')->nullable();
            $table->smallInteger('skeluarga_id')->nullable();
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
        Schema::dropIfExists('pegawais');
    }
};
