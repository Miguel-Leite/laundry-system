<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ToWash extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('to_washs', function (Blueprint $table) {
            $table->id();
            $table->date('start_date');
            $table->date('end_date');
            $table->date('returnned_to_the_client_date');
            $table->decimal('total',10);
            $table->decimal('total_paid',10);
            $table->foreignId('clients_id')->constrained()->cascadeOnDelete();
            $table->foreignId('clothings_id')->constrained()->cascadeOnDelete();
            $table->foreignId('services_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('to_washs');
    }
}
