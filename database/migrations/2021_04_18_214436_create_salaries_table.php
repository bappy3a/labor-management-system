<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->integer('labor_id');
            $table->integer('project_id');
            $table->integer('project_detail');
            $table->double('khoraki', 8, 2)->dafault(0.00);
            $table->double('salary', 8, 2)->dafault(0.00);
            $table->double('payable', 8, 2)->dafault(0.00);
            $table->double('pay', 8, 2)->dafault(0.00);
            $table->string('status')->default('panding');
            $table->text('note')->nullable();
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
        Schema::dropIfExists('salaries');
    }
}
