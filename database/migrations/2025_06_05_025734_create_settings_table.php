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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('keyword')->nullable();
            $table->text('description')->nullable();
            $table->string('logo')->nullable();
            $table->string('icon')->nullable();
            $table->string('domain')->nullable();
            $table->string('author')->nullable();
            $table->enum('maintenance_mode', ['on', 'off'])->default('off');
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
        Schema::dropIfExists('settings');
    }
};
