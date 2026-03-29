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
        Schema::create('workexp', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_id')->constrained('form')->onDelete('cascade');
            $table->string('position');
            $table->string('years');
            $table->string('company_name');
            $table->string('company_address');
            $table->string('company_contact');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workexp');
    }
};
