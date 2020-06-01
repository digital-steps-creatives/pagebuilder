<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('pagebuilder.storage.database.prefix') . 'menu_item', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 512)->unique();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on(config('pagebuilder.storage.database.prefix') .'menus');
            $table->string('position')->nullable()->unique();
            $table->string('url')->nullable();
            $table->string('url_target')->nullable();
            $table->string('size')->nullable();
            $table->string('icon')->nullable();
            $table->unsignedBigInteger('created_by');
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
        Schema::dropIfExists(config('pagebuilder.storage.database.prefix') . 'menu_item');
    }
}
