<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model {
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "model_id",
        "name",
        "seat",
        "price",
        "year",
        "created_at",
        "updated_at"
    ];

    public function model() {
        return $this->belongsTo(VehicleModel::class, "model_id");
    }
}
