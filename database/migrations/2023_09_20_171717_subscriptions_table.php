<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
           Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');            
            $table->string('product_id');
            $table->integer('strip_plan_id');            
            $table->timestamps();
        });
    }
};