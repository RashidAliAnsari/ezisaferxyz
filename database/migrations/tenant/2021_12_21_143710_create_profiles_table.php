<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('tourism_license_number');
            $table->string('company_registration_number');
            $table->string('business_type');
            $table->string('company_acronym');
            $table->string('no_of_branch');
            $table->string('address');
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('post_code')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('contact_person');
            $table->string('telephone');
            $table->string('fax_no');
            $table->string('handphone');
            $table->string('website');
            $table->string('account_holder_name');
            $table->string('bank_name');
            $table->string('bank_account_number');
            $table->string('banner_logo');
            $table->string('profile_logo');
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
        Schema::dropIfExists('profiles');
    }
}
