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
            $table->string('agency_name')->nullable();
            $table->string('name');
            $table->string('phone_no');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('verification_code')->unique();
            $table->boolean('is_verified')->default(0);
            $table->string('password');
            $table->rememberToken();
            $table->boolean('is_dark_mode')->default(0);
            $table->integer('is_approved')->default(2);  // 2->pending || 1->approved || 0->declined
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
