<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
          Schema::create('id_cards', function (Blueprint $table) {
        $table->id();
        $table->string('photo');
        $table->string('name');
        $table->string('address');
        $table->integer('Roll_no');
        $table->date('dob');
        $table->date('expiry_date');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
