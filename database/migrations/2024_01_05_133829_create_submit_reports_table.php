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
        Schema::create('submit_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('school_name');
            $table->string('h_teacher_name');
            $table->string('number');
            $table->string('eiin_number');
            $table->foreignId('district_id');
            $table->foreignId('upazila_id');
            $table->string('visit_status');
            $table->string('school_comment');
            $table->string('image');
            $table->decimal('t_a_bill',10,2);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submit_reports');
    }

    
};