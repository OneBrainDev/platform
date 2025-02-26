<?php declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class () extends Migration {
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clinics');
    }
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clinics', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 100);
            $table->string('address1', 50);
            $table->string('address2', 50)->nullable();
            $table->string('city', 50);
            $table->string('state', 2);
            $table->string('zip_code', 10);
            $table->json('business_hours')->nullable();
            $table->timestamps();
        });
    }
};
