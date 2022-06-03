<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromocodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promocodes', function (Blueprint $table) {
            $table->id();
            $table->string('code', 10)->unique();
            $table->double('reward', 10, 2);
            $table->integer('remaining_quantity');
            $table->integer('total_quantity');
            $table->timestamp('expires_at');
            $table->timestamps();

        });

        Schema::create('promocode_user', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->string('promocode_code');

            $table->timestamp('used_at');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('promocode_code')->references('code')->on('promocodes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('promocode_user');
        Schema::drop('promocodes');
    }
}
