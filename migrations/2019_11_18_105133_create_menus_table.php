<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('pagebuilder.storage.database.prefix') . 'menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 512)->unique();
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->enum('is_active', ['active', 'inactive'])->nullable();
            $table->foreign('created_by')->references('id')->on('users')->nullable();
            $table->unsignedBigInteger('edited_by');
            $table->foreign('edited_by')->references('id')->on('users')->nullable();
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
        Schema::dropIfExists(config('pagebuilder.storage.database.prefix') . 'menus');
    }
}
