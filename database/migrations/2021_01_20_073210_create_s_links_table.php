<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_links', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('f_link');
            $table->string('ins_link');
            $table->string('linkin_link');
            $table->string('git_link');
            $table->string('you_link');
            $table->string('pin_link');
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
        Schema::dropIfExists('s_links');
    }
}
