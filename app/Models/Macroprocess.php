<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Macroprocess extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'macroprocesses';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'capital_id',
        'index',
        'name_en',
        'name_it',
        'name_de',
        'name_fr',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function capital()
    {
        return $this->belongsTo(Capital::class, 'capital_id');
    }
}
