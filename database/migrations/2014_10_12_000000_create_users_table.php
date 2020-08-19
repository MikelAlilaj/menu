<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->integer('status')->nullable();
            $table->integer('type_id');
            $table->integer('category_id');
            $table->string('FirstName');
            $table->string('LastName');
            $table->string('Business_Name');
            $table->string('Business_Description');
            $table->string('Business_City');
            $table->string('Business_State');
            $table->string('Business_NUIS');
            $table->string('Business_Web');
            $table->string('Business_Phone');
            $table->string('Address');
            $table->string('Location');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}