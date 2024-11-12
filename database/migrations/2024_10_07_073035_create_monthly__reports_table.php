<?php

use App\Models\Homestay;
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
        Schema::create('monthly__reports', function (Blueprint $table) {
            $table->id();
            $table->integer('total_booking');
            $table->double('total_profit');
            $table->double('total_expenses');
            $table->date('date');
            $table->foreignIdFor(Homestay::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthly__reports');
    }
};
