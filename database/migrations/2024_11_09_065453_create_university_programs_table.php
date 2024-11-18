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
            $table->string('title', 255);
            $table->foreignId('university_id')->constrained();
            $table->foreignId('university_program_type_id')->constrained();
            $table->foreignId('university_program_subject_type_id')->constrained();
            $table->longText('description')->nullable();
            $table->integer('total_credit')->default(0);
            $table->integer('total_year')->default(0);
            $table->text('exam_system')->nullable();
            $table->longText('exam_requirement')->nullable();
            $table->integer('admission_cost')->default(0);
            $table->integer('total_cost')->default(0);
            $table->text('admission_link')->nullable();
            $table->text('online_form_link')->nullable();
            $table->text('web_link')->nullable();
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
        Schema::dropIfExists('university_programs');
    }
};
