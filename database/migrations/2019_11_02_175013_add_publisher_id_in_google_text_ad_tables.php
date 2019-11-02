<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPublisherIdInGoogleTextAdTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('google_text_ads', function (Blueprint $table) {
            $table->unsignedBigInteger('publisher_id')->nullable()->before('created_by');
            $table->foreign('publisher_id')->references('id')->on('publishers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('google_text_ads', function (Blueprint $table) {
            $this->dropColumn('publisher_id');
            $this->dropForeign('google_text_ads_publisher_id_foreign');
        });
    }
}
