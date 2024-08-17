<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrxTimPegawai extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'trx_tim_peg';
    protected $primaryKey = 'tim_peg_id';
    protected $fillable = ['tim_id', 'peg_id'];
}
