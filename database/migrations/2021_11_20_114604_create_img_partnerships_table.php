<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImgPartnershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('img_partnerships', function (Blueprint $table) {
            $table->id();

            $table->UnsignedBigInteger('partnership_id');
            $table->text('img')->nullable();

            $table->timestamps();

            $table->foreign('partnership_id')->references('id')->on('partnerships')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('img_partnerships');

        $table->dropForeign('partnership_id'); 
    }
}
