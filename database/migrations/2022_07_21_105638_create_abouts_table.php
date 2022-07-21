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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->text('video')->nullable();
            $table->text('img1');
            $table->text('img2');
            $table->text('img3');
            $table->integer('phone');
            $table->text('telegram1');
            $table->text('telegram2');
            $table->text('instagram');
            $table->text('address1');
            $table->text('address2');
            $table->text('address3');
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
        Schema::dropIfExists('abouts');
    }
};
