<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoogleTextAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('google_text_ads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 250)->nullable();
            $table->string('headline_1', 30)->nullable();
            $table->string('headline_2', 30)->nullable();
            $table->string('headline_3', 30)->nullable();
            $table->string('description_1', 90)->nullable();
            $table->string('description_2', 90)->nullable();
            $table->string('display_url', 250)->nullable();

            $table->string('sitelink_1_title', 25)->nullable();
            $table->string('sitelink_1_desc_1', 35)->nullable();
            $table->string('sitelink_1_desc_2', 35)->nullable();
            $table->string('sitelink_1_url', 250)->nullable();

            $table->string('sitelink_2_title', 25)->nullable();
            $table->string('sitelink_2_desc_1', 35)->nullable();
            $table->string('sitelink_2_desc_2', 35)->nullable();
            $table->string('sitelink_2_url', 250)->nullable();

            $table->string('sitelink_3_title', 25)->nullable();
            $table->string('sitelink_3_desc_1', 35)->nullable();
            $table->string('sitelink_3_desc_2', 35)->nullable();
            $table->string('sitelink_3_url', 250)->nullable();

            $table->string('sitelink_4_title', 25)->nullable();
            $table->string('sitelink_4_desc_1', 35)->nullable();
            $table->string('sitelink_4_desc_2', 35)->nullable();
            $table->string('sitelink_4_url', 250)->nullable();

            $table->boolean('is_seller_rating_active')->default(false);
            $table->tinyInteger('seller_rating')->default(0);

            $table->string('review_text', 55)->nullable();
            $table->string('review_source', 55)->nullable();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->softDeletes();
            $table->timestamps();

            // foreign-key constrain
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('google_text_ads');
    }
}
