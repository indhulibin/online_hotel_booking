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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('description');
            $table->text('price');
            $table->text('total_rooms');
            $table->text('amenities');
            $table->text('size');
            $table->text('total_beds');
            $table->text('total_bathrooms');
            $table->text('total_balconies');
            $table->text('total_guests');
            $table->text('featured_photo');
            $table->text('video_id');
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
        Schema::dropIfExists('rooms');
    }
};
