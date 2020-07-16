<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('adminemail')->nullable();
            $table->string('supportemail')->nullable();
            $table->string('smtpdriver')->nullable();
            $table->string('smtphost')->nullable();
            $table->string('smtpport')->nullable();
            $table->string('smtpusername')->nullable();
            $table->string('smtppassword')->nullable();
            $table->string('smtpencrption')->nullable();
            $table->string('status')->default('1')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
