<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villagers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('NIK')->unique();
            $table->foreignId('gender_id');
            $table->string('birthplace');
            $table->date('birthdate');
            $table->foreignId('religion_id');
            $table->foreignId('education_id');
            $table->foreignId('profession_id');
            $table->foreignId('bloodtype_id');
            $table->foreignId('marital_id');
            $table->date('maritaldate')->nullable();
            $table->foreignId('familyrelation_id');
            $table->string('father_name');
            $table->string('mother_name');
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
        Schema::dropIfExists('villagers');
    }
}
