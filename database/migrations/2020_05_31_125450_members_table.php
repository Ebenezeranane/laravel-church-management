<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Title');
            $table->string('surname');
            $table->string('othernames');
            $table->string('sex');
            $table->string('birth_place');
            $table->string('marital_status');
            $table->string('profile_pic');
            $table->date('date_of_birth');
            $table->string('telephone');
            $table->string('e_mail_address');
            $table->text('address');
            $table->string('city_town');
            $table->string('occupation');
            $table->string('postion');
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
        Schema::dropIfExists('members');
    }
}
