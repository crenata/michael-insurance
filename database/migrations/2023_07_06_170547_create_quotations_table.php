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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string("no_quotation");
            $table->string("name");
            $table->longText("address");
            $table->string("kelurahan");
            $table->string("kecamatan");
            $table->string("city");
            $table->string("province");
            $table->date("start_date");
            $table->date("end_date");
            $table->string("cob");
            $table->string("coverage");
            $table->unsignedBigInteger("vehicle_type_id");
            $table->unsignedBigInteger("plat_id");
            $table->unsignedBigInteger("vsi");
            $table->unsignedDouble("total_premium");
            $table->string("flood");
            $table->string("earthquake");
            $table->string("srcc");
            $table->string("tns");
            $table->string("others");
            $table->string("tpl");
            $table->unsignedBigInteger("tpl_limit")->nullable();
            $table->string("tpl_to_passenger");
            $table->unsignedBigInteger("tpl_to_passenger_limit")->nullable();
            $table->string("dpa");
            $table->unsignedBigInteger("dpa_limit")->nullable();
            $table->string("ppa");
            $table->unsignedBigInteger("ppa_limit")->nullable();
            $table->string("file");
            $table->timestamps();

            $table->foreign("vehicle_type_id")->references("id")->on("vehicle_types")->onDelete("cascade");
            $table->foreign("plat_id")->references("id")->on("plats")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};
