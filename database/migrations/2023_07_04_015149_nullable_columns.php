<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NullableColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('gender')->nullable()->change();
            $table->string('country')->nullable()->change();
            $table->decimal('salary', 10, 2)->nullable()->change();
            $table->timestamp('date_of_birth')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('gender')->nullable(false)->change();
            $table->string('country')->nullable(false)->change();
            $table->decimal('salary', 10, 2)->nullable(false)->change();
            $table->timestamp('date_of_birth')->nullable(false)->change();
        });
    }
}
