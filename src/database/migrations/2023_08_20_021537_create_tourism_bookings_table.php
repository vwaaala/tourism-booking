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
//        Schema::create('tb_regions', function (Blueprint $table) {
//            $table->id();
//            $table->uuid('uuid');
//            $table->string('thumbnail');
//            $table->string('slug')->nullable();
//            $table->boolean('status')->default(true);
//            $table->string('meta_title')->nullable();
//            $table->text('meta_description')->nullable();
//            $table->string('meta_keyword')->nullable();
//            $table->timestamps();
//        });

//        Schema::create('region_lang', function (Blueprint $table) {
//            $table->id();
//            $table->unsignedBigInteger('region_id')->constrained();
//            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade')->onUpdate('cascade');
//            $table->string('lang');
//            $table->string('name')->unique();
//            $table->timestamps();
//        });

        // agency services table
        Schema::create('tb_services', function (Blueprint $table) {
            $table->id();
            $table->string('name_bd')->unique();
            $table->string('name_en')->unique();
            $table->string('thumbnail');
            $table->string('description_bd');
            $table->string('description_en');
            $table->string('slug');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        // tour region table
        Schema::create('tb_regions', function (Blueprint $table) {
            $table->id();
            $table->string('name_bd')->unique();
            $table->string('name_en')->unique();
            $table->string('thumbnail');
            $table->string('slug');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        // tour destinations table
        Schema::create('tb_destinations', function (Blueprint $table) {
            $table->id();
            $table->string('name_bd')->unique();
            $table->string('name_en')->unique();
            $table->bigInteger('region_id')->unsigned();
            $table->string('thumbnail');
            $table->longText('description_bd');
            $table->longText('description_en');
            $table->string('slug');
            $table->boolean('status')->default(true);
            $table->foreign('region_id')->references('id')->on('tb_regions')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

        // tour package table
        Schema::create('tb_packages', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('name_bd')->unique();
            $table->string('name_en')->unique();
            $table->bigInteger('destination_id')->unsigned();
            $table->longText('description_bd');
            $table->longText('description_en');
            $table->string('thumbnail');
            $table->string('duration');
            $table->integer('price_bd');
            $table->integer('price_en');
            $table->boolean('featured')->default(false);
            $table->boolean('status')->default(true);
            $table->foreign('destination_id')->references('id')->on('tb_destinations')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

        // tour package event table
        Schema::create('tb_package_events', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('package_id')->unsigned();
            $table->timestamp('booking_end_date');
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->string('name')->nullable();
            $table->string('status')->default('pending');
            $table->foreign('package_id')->references('id')->on('tb_packages')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

        // tour booking table
        Schema::create('tb_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_no');
            $table->bigInteger('package_event_id')->unsigned();
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->text('notes');
            $table->string('status')->default('pending');
            $table->foreign('package_event_id')->references('id')->on('tb_package_events')->onDelete('cascade')->onUpdate('cascade');
        });

        // agency service items
        Schema::create('tb_service_items', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->bigInteger('service_id')->unsigned();
            $table->string('name_bd')->unique();
            $table->string('name_en')->unique();
            $table->longText('description_bd');
            $table->longText('description_en');
            $table->boolean('status')->default(true);
            $table->foreign('service_id')->references('id')->on('tb_services')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

        // agency faq category table
        Schema::create('tb_faq_categories', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('name_bd')->unique();
            $table->string('name_en')->unique();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        // agency faqs table
        Schema::create('tb_faqs', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->bigInteger('category_id')->unsigned();
            $table->string('question_bd')->unique();
            $table->string('question_en')->unique();
            $table->longText('answer_bd');
            $table->longText('answer_en');
            $table->boolean('status')->default(true);
            $table->foreign('category_id')->references('id')->on('tb_faq_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

        // tour destinations media table
        Schema::create('tb_destination_medias', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('destination_id')->unsigned();
            $table->string('photo_path', 100);
            $table->foreign('destination_id')->references('id')->on('tb_destinations')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

        // tour package media table
        Schema::create('tb_package_medias', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('package_id')->unsigned();
            $table->string('path');
            $table->foreign('package_id')->references('id')->on('tb_packages')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_package_medias');
        Schema::dropIfExists('tb_destination_medias');
        Schema::dropIfExists('tb_faqs');
        Schema::dropIfExists('tb_faq_categories');
        Schema::dropIfExists('tb_service_items');
        Schema::dropIfExists('tb_bookings');
        Schema::dropIfExists('tb_package_events');
        Schema::dropIfExists('tb_packages');
        Schema::dropIfExists('tb_destinations');
        Schema::dropIfExists('tb_regions');
        Schema::dropIfExists('tb_services');
    }
};
