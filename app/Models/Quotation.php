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
        "nama",
        "cob",
        "alamat",
        "kelurahan",
        "kecamatan",
        "kota",
        "provinsi",
        "start_date",
        "end_date",
        "created_at",
        "updated_at"
    ];
}
