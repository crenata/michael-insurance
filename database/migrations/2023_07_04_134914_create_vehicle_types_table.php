<?php

use App\Models\VehicleBrand;
use App\Models\VehicleModel;
use App\Models\VehicleType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehicle_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("model_id");
            $table->string("name");
            $table->unsignedBigInteger("seat");
            $table->unsignedBigInteger("price");
            $table->year("year");
            $table->timestamps();

            $table->foreign("model_id")->references("id")->on("vehicle_models")->onDelete("cascade");
        });

        foreach (
            [
                [
                    "name" => "Honda",
                    "models" => [
                        [
                            "name" => "ACCORD",
                            "types" => [
                                [
                                    "name" => "Accord 1.5 Turbo CVT",
                                    "seat" => 4,
                                    "price" => 787300000,
                                    "year" => 2020
                                ]
                            ]
                        ],
                        [
                            "name" => "BR-V",
                            "types" => [
                                [
                                    "name" => "All New Honda BR-V S MT",
                                    "seat" => 6,
                                    "price" => 281100000,
                                    "year" => 2020
                                ],
                                [
                                    "name" => "All New Honda BR-V E MT",
                                    "seat" => 6,
                                    "price" => 295300000,
                                    "year" => 2020
                                ],
                                [
                                    "name" => "All New Honda BR-V E CVT",
                                    "seat" => 6,
                                    "price" => 305300000,
                                    "year" => 2020
                                ],
                                [
                                    "name" => "All New Honda BR-V Prestige CVT",
                                    "seat" => 6,
                                    "price" => 327600000,
                                    "year" => 2020
                                ],
                                [
                                    "name" => "All New Honda BR-V Prestige CVT with Honda Sensing",
                                    "seat" => 6,
                                    "price" => 348600000,
                                    "year" => 2020
                                ]
                            ]
                        ],
                        [
                            "name" => "BRIO",
                            "types" => [
                                [
                                    "name" => "Brio S MT",
                                    "seat" => 4,
                                    "price" => 157900000,
                                    "year" => 2020
                                ],
                                [
                                    "name" => "Brio E MT",
                                    "seat" => 4,
                                    "price" => 171600000,
                                    "year" => 2020
                                ],
                                [
                                    "name" => "Brio E CVT",
                                    "seat" => 4,
                                    "price" => 188000000,
                                    "year" => 2020
                                ],
                                [
                                    "name" => "Brio RS MT",
                                    "seat" => 4,
                                    "price" => 217600000,
                                    "year" => 2020
                                ],
                                [
                                    "name" => "Brio RS CVT",
                                    "seat" => 4,
                                    "price" => 227600000,
                                    "year" => 2020
                                ],
                                [
                                    "name" => "Brio RS MT Urbanite Edition",
                                    "seat" => 4,
                                    "price" => 227400000,
                                    "year" => 2020
                                ],
                                [
                                    "name" => "Brio RS CVT Urbanite Edition",
                                    "seat" => 4,
                                    "price" => 237400000,
                                    "year" => 2020
                                ]
                            ]
                        ],
                        [
                            "name" => "CITY",
                            "types" => [
                                [
                                    "name" => "All New City",
                                    "seat" => 4,
                                    "price" => 373900000,
                                    "year" => 2021
                                ]
                            ]
                        ],
                        [
                            "name" => "CITY HATCHBACK",
                            "types" => [
                                [
                                    "name" => "City Hatchback RS MT",
                                    "seat" => 4,
                                    "price" => 333600000,
                                    "year" => 2021
                                ],
                                [
                                    "name" => "City Hatchback RS CVT",
                                    "seat" => 4,
                                    "price" => 343600000,
                                    "year" => 2021
                                ],
                                [
                                    "name" => "New City Hatchback RS CVT with Honda Sensing",
                                    "seat" => 4,
                                    "price" => 362600000,
                                    "year" => 2021
                                ]
                            ]
                        ],
                        [
                            "name" => "CIVIC HATCHBACK",
                            "types" => [
                                [
                                    "name" => "Civic Hatchback RS",
                                    "seat" => 4,
                                    "price" => 512800000,
                                    "year" => 2019
                                ]
                            ]
                        ],
                        [
                            "name" => "CR-V",
                            "types" => [
                                [
                                    "name" => "New CR-V 2.0L",
                                    "seat" => 4,
                                    "price" => 515900000,
                                    "year" => 2021
                                ],
                                [
                                    "name" => "New CR-V 1.5L Turbo",
                                    "seat" => 4,
                                    "price" => 590900000,
                                    "year" => 2021
                                ],
                                [
                                    "name" => "New CR-V 1.5L Turbo Prestige",
                                    "seat" => 4,
                                    "price" => 653400000,
                                    "year" => 2021
                                ],
                                [
                                    "name" => "New CR-V 1.5L Black Edition",
                                    "seat" => 4,
                                    "price" => 668400000,
                                    "year" => 2021
                                ]
                            ]
                        ],
                        [
                            "name" => "HR-V",
                            "types" => [
                                [
                                    "name" => "All New HR-V S CVT",
                                    "seat" => 4,
                                    "price" => 364900000,
                                    "year" => 2021
                                ],
                                [
                                    "name" => "All New HR-V E CVT",
                                    "seat" => 4,
                                    "price" => 384900000,
                                    "year" => 2021
                                ],
                                [
                                    "name" => "All New HR-V SE CVT",
                                    "seat" => 4,
                                    "price" => 405100000,
                                    "year" => 2022
                                ],
                                [
                                    "name" => "All New HR-V Turbo RS",
                                    "seat" => 4,
                                    "price" => 515900000,
                                    "year" => 2022
                                ]
                            ]
                        ],
                        [
                            "name" => "JAZZ",
                            "types" => [
                                [
                                    "name" => "Jazz MT",
                                    "seat" => 4,
                                    "price" => 256500000,
                                    "year" => 2020
                                ],
                                [
                                    "name" => "Jazz CVT",
                                    "seat" => 4,
                                    "price" => 267000000,
                                    "year" => 2020
                                ],
                                [
                                    "name" => "Jazz RS MT",
                                    "seat" => 4,
                                    "price" => 289500000,
                                    "year" => 2020
                                ],
                                [
                                    "name" => "Jazz RS CVT",
                                    "seat" => 4,
                                    "price" => 300000000,
                                    "year" => 2020
                                ]
                            ]
                        ],
                        [
                            "name" => "MOBILIO",
                            "types" => [
                                [
                                    "name" => "Mobilio S MT",
                                    "seat" => 6,
                                    "price" => 229900000,
                                    "year" => 2022
                                ]
                            ]
                        ],
                        [
                            "name" => "ODYSSEY",
                            "types" => [
                                [
                                    "name" => "New Odyssey 2.4L Prestige",
                                    "seat" => 5,
                                    "price" => 899000000,
                                    "year" => 2021
                                ]
                            ]
                        ],
                        [
                            "name" => "WR-V",
                            "types" => [
                                [
                                    "name" => "WR-V 1.5L E",
                                    "seat" => 4,
                                    "price" => 271900000,
                                    "year" => 2023
                                ],
                                [
                                    "name" => "WR-V 1.5L RS",
                                    "seat" => 4,
                                    "price" => 289900000,
                                    "year" => 2023
                                ],
                                [
                                    "name" => "WR-V 1.5L RS with Honda Sensing",
                                    "seat" => 4,
                                    "price" => 309900000,
                                    "year" => 2023
                                ]
                            ]
                        ],
                    ]
                ],
                [
                    "name" => "Toyota",
                    "models" => [
                        [
                            "name" => "AGYA",
                            "types" => [
                                [
                                    "name" => "Agya 1.2 G MT",
                                    "seat" => 4,
                                    "price" => 159000000,
                                    "year" => 2020
                                ],
                                [
                                    "name" => "Agya 1.2 G AT",
                                    "seat" => 4,
                                    "price" => 173300000,
                                    "year" => 2020
                                ],
                                [
                                    "name" => "Agya 1.2 G Sport MT",
                                    "seat" => 4,
                                    "price" => 165000000,
                                    "year" => 2020
                                ],
                                [
                                    "name" => "Agya 1.2 G Sport AT",
                                    "seat" => 4,
                                    "price" => 181500000,
                                    "year" => 2020
                                ]
                            ]
                        ],
                        [
                            "name" => "ALPHARD",
                            "types" => [
                                [
                                    "name" => "Alphard 2.5 X AT",
                                    "seat" => 6,
                                    "price" => 1189000000,
                                    "year" => 2021
                                ],
                                [
                                    "name" => "Alphard 2.5 G AT",
                                    "seat" => 6,
                                    "price" => 1344000000,
                                    "year" => 2021
                                ],
                                [
                                    "name" => "Alphard 3.5 Q AT",
                                    "seat" => 6,
                                    "price" => 1621000000,
                                    "year" => 2021
                                ]
                            ]
                        ],
                        [
                            "name" => "AVANZA",
                            "types" => [
                                [
                                    "name" => "All New Avanza 1.3 E MT",
                                    "seat" => 6,
                                    "price" => 233100000,
                                    "year" => 2021
                                ],
                                [
                                    "name" => "All New Avanza 1.3 E CVT",
                                    "seat" => 6,
                                    "price" => 247800000,
                                    "year" => 2021
                                ],
                                [
                                    "name" => "All New Avanza 1.5 G MT",
                                    "seat" => 6,
                                    "price" => 255100000,
                                    "year" => 2021
                                ],
                                [
                                    "name" => "All New Avanza 1.5 G CVT",
                                    "seat" => 6,
                                    "price" => 268800000,
                                    "year" => 2021
                                ],
                                [
                                    "name" => "All New Avanza 1.5 G CVT TSS",
                                    "seat" => 6,
                                    "price" => 295800000,
                                    "year" => 2021
                                ]
                            ]
                        ],
                        [
                            "name" => "C-HR",
                            "types" => [
                                [
                                    "name" => "All New C-HR Single Tone",
                                    "seat" => 4,
                                    "price" => 517300000,
                                    "year" => 2021
                                ],
                                [
                                    "name" => "All New C-HR Dual Tone",
                                    "seat" => 4,
                                    "price" => 518800000,
                                    "year" => 2021
                                ]
                            ]
                        ],
                        [
                            "name" => "C-HR HYBRID",
                            "types" => [
                                [
                                    "name" => "All New C-HR Hybrid Non Premium Color",
                                    "seat" => 4,
                                    "price" => 586200000,
                                    "year" => 2021
                                ],
                                [
                                    "name" => "All New C-HR Hybrid Premium Color",
                                    "seat" => 4,
                                    "price" => 587700000,
                                    "year" => 2021
                                ]
                            ]
                        ],
                        [
                            "name" => "CALYA",
                            "types" => [
                                [
                                    "name" => "New Calya 1.2 E MT",
                                    "seat" => 6,
                                    "price" => 160900000,
                                    "year" => 2021
                                ],
                                [
                                    "name" => "New Calya E MT",
                                    "seat" => 6,
                                    "price" => 163800000,
                                    "year" => 2021
                                ],
                                [
                                    "name" => "New Calya G MT",
                                    "seat" => 6,
                                    "price" => 169400000,
                                    "year" => 2021
                                ]
                            ]
                        ],
                        [
                            "name" => "CAMRY",
                            "types" => [
                                ["name" => "Camry 2.5 V AT", "seat" => 4, "price" => 741000000, "year" => 2021],
                                ["name" => "Camry 2.5 G AT", "seat" => 4, "price" => 741700000, "year" => 2021]
                            ]
                        ],
                        [
                            "name" => "CAMRY HYBRID",
                            "types" => [
                                ["name" => "Camry 2.5 Hybrid AT", "seat" => 4, "price" => 874600000, "year" => 2021]
                            ]
                        ],
                        [
                            "name" => "COROLLA ALTIS",
                            "types" => [
                                ["name" => "New Corolla Altis 1.8 V", "seat" => 4, "price" => 514200000, "year" => 2021]
                            ]
                        ],
                        [
                            "name" => "COROLLA CROSS",
                            "types" => [
                                ["name" => "Corolla Cross 1.8 AT", "seat" => 4, "price" => 463510000, "year" => 2021],
                                ["name" => "Corolla Cross 1.8 Hybrid AT", "seat" => 4, "price" => 540900000, "year" => 2021]
                            ]
                        ],
                        [
                            "name" => "FORTUNER",
                            "types" => [
                                ["name" => "Fortuner 4X2 2.4 G MT DSL", "seat" => 6, "price" => 548600000, "year" => 2021],
                                ["name" => "Fortuner 4X2 2.4 G AT DSL", "seat" => 6, "price" => 566300000, "year" => 2021],
                                ["name" => "Fortuner 4x2 2.4 VRZ AT DSL", "seat" => 6, "price" => 574600000, "year" => 2021],
                                ["name" => "Fortuner 4x2 2.4 GR Sport AT DSL", "seat" => 6, "price" => 624950000, "year" => 2021],
                                ["name" => "Fortuner 4x2 2.7 GR Sport AT", "seat" => 6, "price" => 588650000, "year" => 2021],
                                ["name" => "Fortuner 4X4 2.8 GR Sport AT DSL", "seat" => 6, "price" => 715350000, "year" => 2021],
                                ["name" => "Fortuner 4x2 2.8 GR Sport AT DSL", "seat" => 6, "price" => 624950000, "year" => 2021],
                                ["name" => "Fortuner 4x2 2.8 VRZ AT DSL", "seat" => 6, "price" => 606200000, "year" => 2021],
                                ["name" => "Fortuner 4x4 2.8 GR Sport AT LUX", "seat" => 6, "price" => 719143000, "year" => 2021]
                            ]
                        ],
                        [
                            "name" => "HIACE",
                            "types" => [
                                ["name" => "Commuter Manual", "seat" => 10, "price" => 545000000, "year" => 2021],
                                ["name" => "Premio", "seat" => 10, "price" => 630000000, "year" => 2021]
                            ]
                        ],
                        [
                            "name" => "HILUX",
                            "types" => [
                                ["name" => "D Cab 2.4 V 4x4 DSL AT", "seat" => 4, "price" => 513600000, "year" => 2021]
                            ]
                        ],
                        [
                            "name" => "HILUX S CAB",
                            "types" => [
                                ["name" => "S Cab 2.0 L MT", "seat" => 3, "price" => 269900000, "year" => 2021],
                                ["name" => "S Cab 2.4 DSL MT", "seat" => 3, "price" => 290900000, "year" => 2021],
                                ["name" => "S Cab 2.4 DSL 4x4 MT", "seat" => 3, "price" => 393800000, "year" => 2021]
                            ]
                        ],
                        [
                            "name" => "KIJANG INNOVA",
                            "types" => [
                                ["name" => "Kijang Innova 2.0 G MT", "seat" => 6, "price" => 369600000, "year" => 2022],
                                ["name" => "Kijang Innova 2.0 G Luxury MT", "seat" => 6, "price" => 374452000, "year" => 2022],
                                ["name" => "Kijang Innova 2.0 G AT", "seat" => 6, "price" => 389900000, "year" => 2022],
                                ["name" => "Kijang Innova 2.0 G Luxury AT", "seat" => 6, "price" => 396300000, "year" => 2022],
                                ["name" => "Kijang Innova 2.4 G MT DIESEL", "seat" => 6, "price" => 397100000, "year" => 2022],
                                ["name" => "Kijang Innova 2.0 V MT", "seat" => 6, "price" => 422900000, "year" => 2022],
                                ["name" => "Kijang Innova 2.0 V Luxury MT", "seat" => 6, "price" => 429123000, "year" => 2022],
                                ["name" => "Kijang Innova 2.4 G AT DIESEL", "seat" => 6, "price" => 418000000, "year" => 2022],
                                ["name" => "Kijang Innova 2.0 V AT", "seat" => 6, "price" => 442700000, "year" => 2022],
                                ["name" => "Kijang Innova 2.0 V Luxury AT", "seat" => 6, "price" => 449200000, "year" => 2022],
                                ["name" => "Kijang Innova 2.4 V MT DIESEL", "seat" => 6, "price" => 452500000, "year" => 2022],
                                ["name" => "Kijang Innova 2.4 V AT DIESEL", "seat" => 6, "price" => 471900000, "year" => 2022]
                            ]
                        ],
                        [
                            "name" => "LAND CRUISER",
                            "types" => [
                                ["name" => "Land Cruiser 300 VX-R 4x4 AT", "seat" => 7, "price" => 2415000000, "year" => 2021],
                                ["name" => "Land Cruiser 300 GR-S 4x4 AT", "seat" => 7, "price" => 2466000000, "year" => 2021]
                            ]
                        ],
                        [
                            "name" => "RAIZE",
                            "types" => [
                                ["name" => "1.0T G MT ONE TONE", "seat" => 4, "price" => 251900000, "year" => 2021],
                                ["name" => "1.0T G MT TWO TONE", "seat" => 4, "price" => 254500000, "year" => 2021],
                                ["name" => "1.0T G CVT ONE TONE", "seat" => 4, "price" => 266900000, "year" => 2021],
                                ["name" => "1.0T G CVT TWO TONE", "seat" => 4, "price" => 269500000, "year" => 2021],
                                ["name" => "1.0T GR CVT ONE TONE", "seat" => 4, "price" => 280800000, "year" => 2021],
                                ["name" => "1.0T GR CVT TWO TONE", "seat" => 4, "price" => 283400000, "year" => 2021],
                                ["name" => "1.0T GR CVT TSS ONE TONE", "seat" => 4, "price" => 302500000, "year" => 2021],
                                ["name" => "1.0T GR CVT TSS TWO TONE", "seat" => 4, "price" => 305100000, "year" => 2021],
                                ["name" => "1.2 G MT ONE TONE", "seat" => 4, "price" => 232400000, "year" => 2021],
                                ["name" => "1.2 G CVT ONE TONE", "seat" => 4, "price" => 247300000, "year" => 2021]
                            ]
                        ],
                        [
                            "name" => "RUSH",
                            "types" => [
                                ["name" => "Rush G MT", "seat" => 6, "price" => 278800000, "year" => 2021],
                                ["name" => "Rush G AT", "seat" => 6, "price" => 289600000, "year" => 2021],
                                ["name" => "Rush 1.5 S MT GR SPORT", "seat" => 6, "price" => 291500000, "year" => 2021],
                                ["name" => "Rush 1.5 S AT GR SPORT", "seat" => 6, "price" => 302200000, "year" => 2021]
                            ]
                        ],
                        [
                            "name" => "SIENTA",
                            "types" => [
                                ["name" => "Sienta 1.5 V CVT", "seat" => 6, "price" => 325400000, "year" => 2021],
                                ["name" => "Sienta 1.5 Q CVT", "seat" => 6, "price" => 347000000, "year" => 2021],
                                ["name" => "Sienta 1.5 V CVT WELCAB", "seat" => 6, "price" => 419000000, "year" => 2021]
                            ]
                        ],
                        [
                            "name" => "SUPRA",
                            "types" => [
                                ["name" => "Supra GR 3.0L AT", "seat" => 1, "price" => 2188000000, "year" => 2022]
                            ]
                        ],
                        [
                            "name" => "VELLFIRE",
                            "types" => [
                                ["name" => "2.5 G AT Non Premium Color", "seat" => 5, "price" => 1359000000, "year" => 2022],
                                ["name" => "2.5 G AT Premium Color", "seat" => 5, "price" => 1362000000, "year" => 2022]
                            ]
                        ],
                        [
                            "name" => "VELOZ",
                            "types" => [
                                ["name" => "All New Veloz MT", "seat" => 6, "price" => 286000000, "year" => 2022],
                                ["name" => "All New Veloz CVT", "seat" => 6, "price" => 301700000, "year" => 2022],
                                ["name" => "All New Veloz Q CVT", "seat" => 6, "price" => 309100000, "year" => 2022],
                                ["name" => "All New Veloz Q CVT TSS", "seat" => 6, "price" => 331100000, "year" => 2022]
                            ]
                        ],
                        [
                            "name" => "VENTURER",
                            "types" => [
                                ["name" => "Venturer 2.0 AT", "seat" => 6, "price" => 494400000, "year" => 2022],
                                ["name" => "Venturer 2.4 AT DIESEL", "seat" => 6, "price" => 527200000, "year" => 2022]
                            ]
                        ],
                        [
                            "name" => "VIOS",
                            "types" => [
                                ["name" => "Vios 1.5 E MT", "seat" => 4, "price" => 314900000, "year" => 2022],
                                ["name" => "Vios 1.5 G CVT", "seat" => 4, "price" => 355200000, "year" => 2022],
                                ["name" => "Vios 1.5 G TSS CVT", "seat" => 4, "price" => 368400000, "year" => 2022]
                            ]
                        ],
                        [
                            "name" => "VOXY",
                            "types" => [
                                ["name" => "2.0 CVT Non Premium color", "seat" => 6, "price" => 579500000, "year" => 2022]
                            ]
                        ],
                        [
                            "name" => "YARIS",
                            "types" => [
                                ["name" => "New Yaris G CVT 3 AB ", "seat" => 6, "price" => 295800000, "year" => 2022],
                                ["name" => "New Yaris 1.5 S CVT GR SPORT 7 AB", "seat" => 6, "price" => 325700000, "year" => 2022],
                                ["name" => "New Yaris 1.5 S M/T GR SPORT 3 AB", "seat" => 6, "price" => 308100000, "year" => 2022],
                                ["name" => "New Yaris 1.5 S CVT GR SPORT 3 AB", "seat" => 6, "price" => 320300000, "year" => 2022]
                            ]
                        ]
                    ]
                ]
            ] as $data
        ) {
            $brand = VehicleBrand::create([
                "name" => $data["name"]
            ]);
            foreach ($data["models"] as $mdl) {
                $model = VehicleModel::create([
                    "brand_id" => $brand->id,
                    "name" => $mdl["name"]
                ]);
                foreach ($mdl["types"] as $type) {
                    VehicleType::create([
                        "model_id" => $model->id,
                        "name" => $type["name"],
                        "seat" => $type["seat"],
                        "price" => $type["price"],
                        "year" => $type["year"]
                    ]);
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_types');
    }
};
