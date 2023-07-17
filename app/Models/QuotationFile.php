<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationFile extends Model {
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "quotation_id",
        "file",
        "modifier_id",
        "created_at",
        "updated_at"
    ];

    public function getFileAttribute() {
        return env("APP_URL") . "/storage/quotations/" . $this->attributes["file"];
    }

    public function quotation() {
        return $this->belongsTo(Quotation::class, "quotation_id");
    }
}
