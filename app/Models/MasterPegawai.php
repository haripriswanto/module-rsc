<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterPegawai extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'pegawai';
    protected $primaryKey = 'peg_id';
    protected $fillable = ['peg_id', 'peg_nama'];
}
