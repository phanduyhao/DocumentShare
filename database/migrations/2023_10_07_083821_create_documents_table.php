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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('title',255);
            $table->string('slug',255);
            $table->string('description')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->unsignedBigInteger('cate_id')->nullable();
            $table->foreign('cate_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
            $table->integer('score');
            $table->string('type',255)->nullable();
            $table->string('size',255)->nullable();
            $table->unsignedBigInteger('status')->nullable();
            $table->foreign('status')
                ->references('id')
                ->on('statuses')
                ->onDelete('cascade');
            $table->string('source')->nullable();
            $table->string('file',255)->nullable();
            $table->unsignedBigInteger('tag_id')->nullable();
            $table->foreign('tag_id')
                ->references('id')
                ->on('tag')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
