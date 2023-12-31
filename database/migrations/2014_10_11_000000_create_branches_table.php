<?php

use App\Models\Branch;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->timestamps();
        });

        foreach (
            [
                "NJ",
                "Medan",
                "Samarinda",
                "CO",
                "Makassar",
                "Semarang",
                "Bali",
                "Batam"
            ] as $data
        ) {
            Branch::create([
                "name" => $data
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('branches');
    }
};
