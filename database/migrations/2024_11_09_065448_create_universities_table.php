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
        Schema::disableForeignKeyConstraints();

        Schema::create('universities', function (Blueprint $table) {
            $table->id();
            $table->string('title', 400);
            $table->foreignId('university_fund_type_id')->constrained();
            $table->foreignId('university_type_id')->constrained();
            $table->foreignId('district_id')->constrained();
            $table->longText('description')->nullable();
            $table->string('phone', 400)->nullable();
            $table->longText('contact')->nullable();
            $table->longText('short_links')->nullable();
            $table->longText('gmap_link')->nullable();
            $table->longText('web_link')->nullable();
            $table->string('email', 400)->nullable();
            $table->string('email_register', 400)->nullable();
            $table->enum('status', ["active","disabled"]);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universities');
    }
};
