<?php

use App\Models\User;
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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250);

            $table->string('type', 10)->default('property');
            $table->integer('type_id')->index()->nullable();
            $table->foreignIdFor(User::class, 'owner_id')->index()->nullable();
            $table->float('monthly_payment')->nullable();

            $table->float('rent')->nullable();
            $table->string('rent_frequency')->nullable();
            $table->date('available_from')->nullable();

            $table->jsonb('address')->nullable();
            $table->jsonb('meta')->nullable();
            $table->foreignIdFor(User::class, 'created_by')->index();
            $table->softDeletes()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
