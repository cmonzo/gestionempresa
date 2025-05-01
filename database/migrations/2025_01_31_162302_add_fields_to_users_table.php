<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('rol',['worker','admin'])->default('worker');
            $table->enum('status',['active','inactive','holidays','injured'])->default('active');
            $table->enum('gender',['male','female','unidentified'])->default('unidentified');
            $table->enum('position',['manager','administrative','business'])->default('administrative');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropColumns('users',['rol']);
    }
};
