<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('seo_tags', function (Blueprint $table) {
//            $table->id();
//            $table->string('name')->unique();
//            $table->string('uuid');
//            $table->timestamps();
//        });
//
//        Schema::create('seo', function (Blueprint $table) {
//            $table->id();
//            $table->uuid('uuid');
//            $table->string('page_slug');
//            $table->string('featured_image')->nullable();
//            $table->string('meta_title');
//            $table->boolean('meta_description');
//            $table->string('focus_keyword')->nullable();
//            $table->timestamps();
//        });
//
//        Schema::create('seo_tags_connector', function (Blueprint $table) {
//            $table->id();
//            $table->uuid('uuid');
//            $table->bigInteger('seo_id')->unsigned();
//            $table->foreign('seo_id')->references('id')->on('seo')->onDelete('cascade')->onUpdate('cascade');
//            $table->bigInteger('tag_id')->unsigned();
//            $table->foreign('tag_id')->references('id')->on('seo_tags')->onDelete('cascade')->onUpdate('cascade');
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seo_tags_connector');
        Schema::dropIfExists('seo');
        Schema::dropIfExists('seo_tags');
    }
};
