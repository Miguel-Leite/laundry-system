<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Clothing extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clothings', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("description")->nullable();
            $table->string("color");
            $table->integer("size");
            $table->boolean("iron");
            $table->string("image");
            $table->foreignId('users_id')->constrained()->cascadeOnDelete();
            $table->foreignId('fabrics_id')->constrained()->cascadeOnDelete();
            $table->foreignId('categories_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('clothings');
    }
}
