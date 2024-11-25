<?php

use App\Models\HomestayOwner;
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
        Schema::create('homestays', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('cover_photo');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->foreignIdFor(HomestayOwner::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homestays');
    }
};
