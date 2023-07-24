<?php

use App\Enums\PropertyStatusEnum;
use App\Enums\PropertyTypeEnum;
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
        Schema::create('property_characteristics', function (Blueprint $table) {
            $table->unsignedBigInteger('property_id')->unique();
            $table->float('price')->required();
            $table->integer('bedrooms')->required();
            $table->integer('bathrooms')->required();
            $table->float('sqft')->required();
            $table->float('price_sqft')->required();
            $table->enum('property_type',[PropertyTypeEnum::FULL->value,
                PropertyTypeEnum::SEMI->value,
                PropertyTypeEnum::TERRANCE->value,
                PropertyTypeEnum::BUNGALOW->value,
            ])->default(PropertyTypeEnum::FULL->value);
            $table->enum('status',[PropertyStatusEnum::SOLD->value,
                PropertyStatusEnum::SALE->value,
                PropertyStatusEnum::HOLD->value,
            ])->default(PropertyStatusEnum::SOLD->value);
            $table->foreign('property_id')
                ->references('id')
                ->on('properties')
                ->cascadeOnDelete();
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_characteristics');
    }
};
