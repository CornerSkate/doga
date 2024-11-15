<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('bookings', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('book_id');
        $table->string('email');
        $table->date('borrowed_date');
        $table->date('return_date')->nullable();
        $table->timestamps();

        // Foreign key constraint
        $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
    });
}

public function down()
{
    Schema::dropIfExists('bookings');
}

};
