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

        Schema::create('university_programs', function (Blueprint $table) {
            $table->id();
            $table->string('title', 400);
            $table->foreignId('university_program_type_id')->constrained();
            $table->longText('description')->nullable();
            $table->integer('total_credit')->nullable();
            $table->integer('total_year')->nullable();
            $table->longText('exam_system')->nullable();
            $table->longText('exam_requirement')->nullable();
            $table->longText('admission_cost')->nullable();
            $table->longText('total_cost')->nullable();
            $table->longText('admission_link')->nullable();
            $table->longText('online_form_link')->nullable();
            $table->longText('web_link')->nullable();
            $table->enum('status', ["active","disabled"]);
            $table->foreignId('university_id');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('university_programs');
    }
};
