<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PuasaLog extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['puasa_debt_id', 'tanggal', 'jumlah_hari'];

    public function debt()
    {
        return $this->belongsTo(PuasaDebt::class, 'puasa_debt_id');
    }
}