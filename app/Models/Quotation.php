<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model {
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "no_quotation",
        "name",
        "address",
        "kelurahan",
        "kecamatan",
        "city",
        "province",
        "start_date",
        "end_date",
        "cob",
        "coverage",
        "vehicle_type_id",
        "plat_id",
        "vsi",
        "flood",
        "earthquake",
        "srcc",
        "tns",
        "others",
        "tpl",
        "tpl_limit",
        "tpl_to_passenger",
        "tpl_to_passenger_limit",
        "dpa",
        "dpa_limit",
        "ppa",
        "ppa_limit",
        "created_at",
        "updated_at"
    ];

    public function vehicleType() {
        return $this->belongsTo(VehicleType::class, "vehicle_type_id");
    }

    public function plat() {
        return $this->belongsTo(Plat::class, "plat_id");
    }
}
