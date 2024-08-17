<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterTim extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'mst_tim';
    protected $primaryKey = 'tim_id';
    protected $fillable = ['tim_id', 'tim_nama'];
}
