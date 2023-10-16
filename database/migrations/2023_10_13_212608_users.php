<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->engine = 'InnoDB';


            $table->increments('id')->unsigned();
            $table->string('firstname', 255);
            $table->string('lastname', 255);
            $table->string('document_type', 10);
            $table->string('document_number', 20);
            $table->string('email', 255)->unique();
            $table->string('password', 255);
            $table->string('phone', 20);
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
