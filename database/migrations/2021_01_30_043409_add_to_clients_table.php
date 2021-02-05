<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddToClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->default(1);
            $table->integer('age')->default(0);
            $table->bigInteger('phone_number')->default(0);
            $table->string('city')->default('Не заполнено');
            $table->string('where')->default('Не заполнено'); 
            $table->string('user_new_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
