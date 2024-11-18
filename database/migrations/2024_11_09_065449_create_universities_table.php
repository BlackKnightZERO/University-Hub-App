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
            $table->string('title', 150);
            $table->foreignId('university_fund_type_id')->constrained();
            $table->foreignId('university_type_id')->constrained();
            $table->foreignId('division_id')->constrained();
            $table->longText('description')->nullable();
            $table->string('phone', 18)->nullable();
            $table->integer('seat_count')->default(0);
            $table->text('contact')->nullable();
            $table->longText('short_links')->nullable();
            $table->longText('gmap_link')->nullable();
            $table->longText('web_link')->nullable();
            $table->string('email', 50)->nullable();
            $table->string('email_register', 50)->nullable();
            $table->tinyInteger('deletable')->default(1);
            $table->tinyInteger('status')->default(1);
            $table->string('meta_description', 255);
            $table->string('meta_keywords', 255);
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
