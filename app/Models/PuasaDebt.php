<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuasaDebt extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'total_hutang', 'sisa_hutang', 'target_selesai'];

    public function logs()
    {
        return $this->hasMany(PuasaLog::class)->orderBy('tanggal', 'desc');
    }
}