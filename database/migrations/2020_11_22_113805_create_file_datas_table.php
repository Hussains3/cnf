<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_datas', function (Blueprint $table) {
            $table->id();
            $table->string('lodgement_no');
            $table->string('lodgement_date');
            $table->string('manifest_no');
            $table->string('manifest_date');
            $table->string('group')->nullable();
            $table->string('ie_type')->nullable();
            $table->string('ie_group')->nullable();
            $table->string('goods_name')->nullable();
            $table->string('goods_type')->nullable();
            $table->string('be_number')->nullable();
            $table->string('be_date')->nullable();
            $table->string('fees')->nullable();
            $table->string('page')->nullable();
            $table->string('no_of_pages')->nullable();

            $table->string('status');


            $table->unsignedBigInteger('ie_data_id')->nullable();
            $table->foreign('ie_data_id')->references('id')
                ->on('ie_datas')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('agent_id')->nullable();
            $table->foreign('agent_id')->references('id')
                ->on('agents')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('operator_id')->nullable();
            $table->foreign('operator_id')->references('id')
                ->on('users')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('file_datas');
    }
}
