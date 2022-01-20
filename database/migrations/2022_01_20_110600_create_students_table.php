<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('std_id', 10)->unique();
            $table->integer('class_roll')->unique();
            $table->string('f_name', 50);
            $table->string('m_name', 50);
            $table->string('class');
            $table->string('shift');
            $table->string('session');
            $table->string('group')->nullable();
            $table->string('gender');
            $table->text('p_address', 200);
            $table->text('per_address', 200)->nullable();
            $table->integer('mobile');
            $table->integer('phone')->nullable();
            $table->date('b_date');
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('students');
    }
}
