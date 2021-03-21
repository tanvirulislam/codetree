<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemoRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demo_requests', function (Blueprint $table) {
            $table->id();
            $table->string('request_name');
            $table->string('request_email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('request_profesion');
            $table->string('request_purpose');
            $table->string('request_software_name');
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
        Schema::dropIfExists('demo_requests');
    }
}
