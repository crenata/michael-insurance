<?php

use App\Models\Plat;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('plats', function (Blueprint $table) {
            $table->id();
            $table->string("plat");
            $table->unsignedBigInteger("zone");
            $table->string("province");
            $table->timestamps();
        });

        foreach (
            [
                ["plat" => "A", "zone" => "2", "province" => "Banten"],
                ["plat" => "AA", "zone" => "3", "province" => "Central Java"],
                ["plat" => "AB", "zone" => "3", "province" => "Yogyakarta"],
                ["plat" => "AD", "zone" => "3", "province" => "Central Java"],
                ["plat" => "AE", "zone" => "3", "province" => "East Java"],
                ["plat" => "AG", "zone" => "3", "province" => "East Java"],
                ["plat" => "B", "zone" => "2", "province" => "Jakarta"],
                ["plat" => "BA", "zone" => "1", "province" => "West Sumatera"],
                ["plat" => "BB", "zone" => "1", "province" => "North Sumatera"],
                ["plat" => "BD", "zone" => "1", "province" => "Bengkulu"],
                ["plat" => "BE", "zone" => "1", "province" => "Lampung"],
                ["plat" => "BG", "zone" => "1", "province" => "South Sumatera"],
                ["plat" => "BH", "zone" => "1", "province" => "Jambi"],
                ["plat" => "BL", "zone" => "1", "province" => "Aceh"],
                ["plat" => "BM", "zone" => "1", "province" => "Riau"],
                ["plat" => "BN", "zone" => "1", "province" => "Bangka Belitung"],
                ["plat" => "BP", "zone" => "1", "province" => "Riau Islands"],
                ["plat" => "D", "zone" => "2", "province" => "West Java"],
                ["plat" => "DA", "zone" => "3", "province" => "South Kalimantan"],
                ["plat" => "DB", "zone" => "3", "province" => "North Sulawesi"],
                ["plat" => "DC", "zone" => "3", "province" => "West Sulawesi"],
                ["plat" => "DD", "zone" => "3", "province" => "South Sulawesi"],
                ["plat" => "DE", "zone" => "3", "province" => "Maluku"],
                ["plat" => "DG", "zone" => "3", "province" => "North Maluku"],
                ["plat" => "DH", "zone" => "3", "province" => "East Nusa Tenggara"],
                ["plat" => "DK", "zone" => "3", "province" => "Bali"],
                ["plat" => "DL", "zone" => "3", "province" => "North Sulawesi"],
                ["plat" => "DM", "zone" => "3", "province" => "Gorontalo"],
                ["plat" => "DN", "zone" => "3", "province" => "Central Sulawesi"],
                ["plat" => "DP", "zone" => "3", "province" => "South Sulawesi"],
                ["plat" => "DR", "zone" => "3", "province" => "West Nusa Tenggara"],
                ["plat" => "DT", "zone" => "3", "province" => "Southeast Sulawesi"],
                ["plat" => "DW", "zone" => "3", "province" => "South Sulawesi"],
                ["plat" => "E", "zone" => "2", "province" => "West Java"],
                ["plat" => "EA", "zone" => "3", "province" => "West Nusa Tenggara"],
                ["plat" => "EB", "zone" => "3", "province" => "East Nusa Tenggara"],
                ["plat" => "ED", "zone" => "3", "province" => "East Nusa Tenggara"],
                ["plat" => "F", "zone" => "2", "province" => "West Java"],
                ["plat" => "G", "zone" => "3", "province" => "Central Java"],
                ["plat" => "H", "zone" => "3", "province" => "Central Java"],
                ["plat" => "K", "zone" => "3", "province" => "Central Java"],
                ["plat" => "KB", "zone" => "3", "province" => "West Kalimantan"],
                ["plat" => "KH", "zone" => "3", "province" => "Central Kalimantan"],
                ["plat" => "KT", "zone" => "3", "province" => "East Kalimantan"],
                ["plat" => "KU", "zone" => "3", "province" => "North Kalimantan"],
                ["plat" => "L", "zone" => "3", "province" => "East Java"],
                ["plat" => "M", "zone" => "3", "province" => "East Java"],
                ["plat" => "N", "zone" => "3", "province" => "East Java"],
                ["plat" => "P", "zone" => "3", "province" => "East Java"],
                ["plat" => "PA", "zone" => "3", "province" => "Central Papua"],
                ["plat" => "PB", "zone" => "3", "province" => "West Papua"],
                ["plat" => "R", "zone" => "3", "province" => "Central Java"],
                ["plat" => "S", "zone" => "3", "province" => "East Java"],
                ["plat" => "T", "zone" => "2", "province" => "West Java"],
                ["plat" => "W", "zone" => "3", "province" => "East Java"],
                ["plat" => "Z", "zone" => "2", "province" => "West Java"]
            ] as $data
        ) {
            Plat::create([
                "plat" => $data["plat"],
                "zone" => $data["zone"],
                "province" => $data["province"]
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plats');
    }
};
