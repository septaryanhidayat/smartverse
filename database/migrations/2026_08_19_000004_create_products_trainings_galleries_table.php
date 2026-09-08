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
        // Digital Products & Startup Showcase
        Schema::create('digital_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('badge')->nullable(); // e.g. "SaaS Platform", "Laravel Template", "AI Tool"
            $table->string('tagline')->nullable();
            $table->text('description');
            $table->json('features')->nullable(); // Array of feature strings
            $table->decimal('price', 12, 2)->default(0);
            $table->string('price_type')->default('one_time'); // 'one_time', 'monthly', 'free'
            $table->string('demo_url')->nullable();
            $table->string('buy_url')->nullable();
            $table->string('thumbnail')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // Training Modules & Courses
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('level')->default('All Levels'); // Beginner, Intermediate, Advanced, Executive
            $table->string('duration')->nullable(); // e.g. "2 Hari (16 Jam)", "1 Bulan BootCamp"
            $table->string('target_audience')->nullable(); // Developer, Executive, Mahasiswa, Umum
            $table->text('summary');
            $table->json('syllabus')->nullable(); // Array of module topics
            $table->decimal('price', 12, 2)->default(0);
            $table->string('thumbnail')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // Trainer & Event Photo Galleries
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('event_name')->nullable();
            $table->string('location')->nullable();
            $table->date('event_date')->nullable();
            $table->string('category')->default('workshop'); // workshop, keynote, training, seminar, corporate
            $table->string('image_path');
            $table->text('description')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
        Schema::dropIfExists('trainings');
        Schema::dropIfExists('digital_products');
    }
};
