<?php

use App\Models\TsiRate;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tsi_rates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("min");
            $table->unsignedBigInteger("max");
            $table->unsignedBigInteger("category");
            $table->timestamps();
        });

        foreach (
            [
                ["min" => 0, "max" => 125000000, "category" => 1],
                ["min" => 125000001, "max" => 200000000, "category" => 2],
                ["min" => 200000001, "max" => 400000000, "category" => 3],
                ["min" => 400000001, "max" => 800000000, "category" => 4],
                ["min" => 800000001, "max" => 999999999999, "category" => 4]
            ] as $data
        ) {
            TsiRate::create([
                "min" => $data["min"],
                "max" => $data["max"],
                "category" => $data["category"]
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tsi_rates');
    }
};
