<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIeDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ie_datas', function (Blueprint $table) {
            $table->id();
            $table->string('bin_no');
            $table->string('ie');
            $table->string('name');
            $table->string('owners_name');
            $table->string('photo')->nullable();
            $table->string('destination')->nullable();
            $table->string('office_address');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('house')->nullable();
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
        Schema::dropIfExists('ie_datas');
    }
}
