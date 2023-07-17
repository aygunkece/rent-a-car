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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('land_phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('tax_department')->nullable();
            $table->string('tax_number')->nullable();
            $table->text('address')->nullable();
            $table->string('website')->nullable();
            $table->boolean('confirm')->default(0)->comment("ön onaydan geçmiş firmanın bilgilerinin kontrol edildikten sonraki onay durumu");
            $table->boolean('pre_confirm')->default(0)->comment("ilk defa kayıt olacak firmanın ön bilgilerinin onay durumu");
            $table->boolean('status')->default(0)->comment("firmanın aktif veya pasif olma durumu");
            $table->boolean('approve_agreement')->default(0);
            $table->string('auth_email');
            $table->string('auth_name');
            $table->string('auth_phone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
