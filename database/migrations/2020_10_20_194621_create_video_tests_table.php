<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_tests', function (Blueprint $table) {
            $table->id();
            $table->string('src_360')->nullable();
            $table->string('src_480')->nullable();
            $table->string('src_720')->nullable();
            $table->string('real_path')->nullable();
            $table->string('original_name');
            $table->datetime('uploaded_at')->nullable();
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
        Schema::dropIfExists('video_tests');
    }
}
