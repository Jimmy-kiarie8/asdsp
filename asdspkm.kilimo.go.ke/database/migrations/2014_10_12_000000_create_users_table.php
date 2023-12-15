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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username')->unique()->nullable();
            $table->string('phone')->nullable();
            $table->string('avatar')->nullable();
            $table->integer('org_id')->nullable();
            $table->integer('branch_id')->nullable();
            $table->string('role_id')->nullable();
            $table->string('verification_code')->unique()->nullable();
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('token_2fa')->nullable();
            $table->datetime('token_2fa_expiry')->nullable();
            $table->enum('user_status',['Active',"Blocked"])->default("Active");
            $table->enum('user_type',['Internal','External'])->default("Internal");
            $table->string('password');
            $table->datetime('lastlogindate')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });


     
       Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->enum('gender',['Male','Female'])->nullable();
            $table->date('dob')->nullable();
            $table->string('telephone')->nullable();
            $table->string('country')->default('Kenya');
            $table->string('county')->nullable();
            $table->string('postal_address')->nullable();
            $table->string('residential_address')->nullable();
            $table->string('city')->nullable();
            $table->string('id_number')->nullable();
            $table->string('personal_number')->nullable();
            $table->string('library_status')->default('Active');
            $table->enum('profile_status',['Complete','Draft'])->default('Draft');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
             
        });



        Schema::create('user_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('card_number')->nullable();
            $table->string('barcode')->nullable();
            $table->date('issue_at')->nullable();
            $table->date('expiry_date')->nullable();
            $table->enum('status',['Active','Expired'])->default('Active');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
             
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
