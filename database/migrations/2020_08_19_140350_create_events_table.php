<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {

            $table->id();
            $table->text('name');
            $table->text('description')->nullable();
            $table->datetime('event_datetime')->nullable();
            $table->boolean('status')->default(0);
            $table->integer('duration')->nullable();
            $table->integer('registrations')->default(0);
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('type_id')->nullable();
            $table->text('created_by')->nullable();
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('type_id')
                ->references('id')->on('types')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('events');
        Schema::enableForeignKeyConstraints();
    }
}
