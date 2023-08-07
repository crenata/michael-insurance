<?php

use App\Models\CoverageRate;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('coverage_rates', function (Blueprint $table) {
            $table->id();
            $table->string("coverage");
            $table->unsignedBigInteger("zone");
            $table->unsignedBigInteger("category");
            $table->unsignedDouble("rate");
            $table->timestamps();
        });

        foreach (
            [
                ["coverage" => "Comprehensive", "zone" => 1, "category" => 1, "rate" => 0.0382],
                ["coverage" => "Comprehensive", "zone" => 1, "category" => 2, "rate" => 0.0267],
                ["coverage" => "Comprehensive", "zone" => 1, "category" => 3, "rate" => 0.0218],
                ["coverage" => "Comprehensive", "zone" => 1, "category" => 4, "rate" => 0.0120],
                ["coverage" => "Comprehensive", "zone" => 1, "category" => 5, "rate" => 0.0105],
                ["coverage" => "Comprehensive", "zone" => 2, "category" => 1, "rate" => 0.0326],
                ["coverage" => "Comprehensive", "zone" => 2, "category" => 2, "rate" => 0.0247],
                ["coverage" => "Comprehensive", "zone" => 2, "category" => 3, "rate" => 0.0208],
                ["coverage" => "Comprehensive", "zone" => 2, "category" => 4, "rate" => 0.0120],
                ["coverage" => "Comprehensive", "zone" => 2, "category" => 5, "rate" => 0.0105],
                ["coverage" => "Comprehensive", "zone" => 3, "category" => 1, "rate" => 0.0253],
                ["coverage" => "Comprehensive", "zone" => 3, "category" => 2, "rate" => 0.0269],
                ["coverage" => "Comprehensive", "zone" => 3, "category" => 3, "rate" => 0.0179],
                ["coverage" => "Comprehensive", "zone" => 3, "category" => 4, "rate" => 0.0114],
                ["coverage" => "Comprehensive", "zone" => 3, "category" => 5, "rate" => 0.0105],
                ["coverage" => "TLO", "zone" => 1, "category" => 1, "rate" => 0.0047],
                ["coverage" => "TLO", "zone" => 1, "category" => 2, "rate" => 0.0063],
                ["coverage" => "TLO", "zone" => 1, "category" => 3, "rate" => 0.0041],
                ["coverage" => "TLO", "zone" => 1, "category" => 4, "rate" => 0.0025],
                ["coverage" => "TLO", "zone" => 1, "category" => 5, "rate" => 0.0020],
                ["coverage" => "TLO", "zone" => 2, "category" => 1, "rate" => 0.0065],
                ["coverage" => "TLO", "zone" => 2, "category" => 2, "rate" => 0.0044],
                ["coverage" => "TLO", "zone" => 2, "category" => 3, "rate" => 0.0038],
                ["coverage" => "TLO", "zone" => 2, "category" => 4, "rate" => 0.0025],
                ["coverage" => "TLO", "zone" => 2, "category" => 5, "rate" => 0.0020],
                ["coverage" => "TLO", "zone" => 3, "category" => 1, "rate" => 0.0051],
                ["coverage" => "TLO", "zone" => 3, "category" => 2, "rate" => 0.0044],
                ["coverage" => "TLO", "zone" => 3, "category" => 3, "rate" => 0.0029],
                ["coverage" => "TLO", "zone" => 3, "category" => 4, "rate" => 0.0023],
                ["coverage" => "TLO", "zone" => 3, "category" => 5, "rate" => 0.0020]
            ] as $data
        ) {
            CoverageRate::create([
                "coverage" => $data["coverage"],
                "zone" => $data["zone"],
                "category" => $data["category"],
                "rate" => $data["rate"]
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coverage_rates');
    }
};
