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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('name')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('phone_number')->nullable();
            
            // Поля для бизнес-аккаунта
            $table->string('full_name')->nullable(); // Используется для бизнес-аккаунта
            $table->string('company_name')->nullable();
            $table->string('vat_number')->nullable(); // VAT Number для бизнеса
            $table->text('address')->nullable();
            $table->string('town_city')->nullable();
            $table->string('state_country')->nullable();
            $table->string('postcode')->nullable();
            $table->string('country')->nullable();
            
            // Дополнительные поля
            $table->boolean('is_business')->default(false); // Флаг для определения типа аккаунта
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
