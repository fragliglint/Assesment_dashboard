<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('key_accountabilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_title_id')->constrained()->cascadeOnDelete();
            $table->text('accountability');
            $table->string('kpi')->nullable();
            $table->string('measurement')->nullable();
            $table->timestamps();
        });

        Schema::create('competencies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['behavioral', 'technical', 'enabler']);
            $table->timestamps();
        });

        Schema::create('competency_mappings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_title_id')->constrained()->cascadeOnDelete();
            $table->foreignId('key_accountability_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('competency_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['job_title_id','key_accountability_id','competency_id'], 'uniq_comp_map');
        });

        Schema::create('jd_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->foreignId('employee_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('job_title_id')->constrained()->cascadeOnDelete();
            $table->foreignId('reports_to_job_title_id')->nullable()->constrained('job_titles')->nullOnDelete();
            $table->json('key_accountabilities');
            $table->text('behavioral')->nullable();
            $table->text('technical')->nullable();
            $table->text('enabler')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jd_entries');
        Schema::dropIfExists('competency_mappings');
        Schema::dropIfExists('competencies');
        Schema::dropIfExists('key_accountabilities');
    }
};
