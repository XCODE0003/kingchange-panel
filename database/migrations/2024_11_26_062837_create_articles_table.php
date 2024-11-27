<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('subtitle_en');
            $table->text('content_en');
            $table->string('metatitle_en')->nullable();
            $table->text('metadescription_en')->nullable();
            $table->string('title_ru');
            $table->string('subtitle_ru');
            $table->text('content_ru');
            $table->string('metatitle_ru')->nullable();
            $table->text('metadescription_ru')->nullable();
            $table->string('title_ua');
            $table->string('subtitle_ua');
            $table->text('content_ua');
            $table->string('metatitle_ua')->nullable();
            $table->text('metadescription_ua')->nullable();
            $table->string('image');
            $table->timestamp('date')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
