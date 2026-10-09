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
        Schema::create('cv_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->default('SEPTA RYAN HIDAYAT');
            $table->string('title')->default('Direktur Beranda Teknologi Digital & Founder SmartVerseID');
            $table->string('headline')->default('CEO | Founder & Software Architect | AI & Tech Educator');
            $table->string('email')->default('ryan@berandadigital.net');
            $table->string('phone')->default('0852 6777 4878');
            $table->string('website_1')->nullable()->default('www.smartverse.id');
            $table->string('website_2')->nullable()->default('www.berandadigital.net');
            $table->string('github')->nullable()->default('github.com/septaryanhidayat');
            $table->string('social')->nullable()->default('@septa_ryan');
            $table->string('city')->nullable()->default('Palembang, Sumatera Selatan');
            $table->string('avatar_path')->nullable()->default('/images/smartverse/ryan-trainer-hero.webp');
            $table->longText('about_me')->nullable();
            $table->json('affiliations')->nullable();
            $table->json('certifications')->nullable();
            $table->json('skills')->nullable();
            $table->json('stats')->nullable();
            $table->json('print_config')->nullable();
            $table->timestamps();
        });

        Schema::create('cv_activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cv_profile_id')->default(1);
            $table->string('type', 50)->default('speaker'); // 'speaker' or 'project'
            $table->string('title');
            $table->string('category', 100)->nullable();
            $table->string('organizer')->nullable();
            $table->string('year', 50)->nullable();
            $table->date('event_date')->nullable();
            $table->string('location')->nullable();
            $table->string('url')->nullable();
            $table->longText('description')->nullable();
            $table->string('flyer_path')->nullable(); // image / photo / flyer
            $table->string('pdf_path')->nullable();   // PDF document / certificate / flyer PDF
            $table->boolean('is_featured')->default(true);
            $table->boolean('show_in_print')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();

            $table->index(['cv_profile_id', 'type', 'order']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cv_activities');
        Schema::dropIfExists('cv_profiles');
    }
};
