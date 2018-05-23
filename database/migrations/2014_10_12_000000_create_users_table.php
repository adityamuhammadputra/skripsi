<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('active')->default(false);
            $table->string('activation_token')->nullable();
            $table->boolean('status')->default(false);
            $table->string('avatar')->nullable()->default('avatars/change-user-male.png');
            $table->string('pekerjaan')->nullable();
            $table->string('agama')->nullable()->default('belum anda isi');
            $table->string('hobby')->nullable()->default('belum anda isi');
            $table->text('bio')->nullable()->default('belum anda isi');
            $table->string('contact')->nullable()->default('belum anda isi');
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
