<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Risk extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'risks';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'control_key_id',
        'probability_id',
        'impact_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function control_key()
    {
        return $this->belongsTo(ControlKey::class, 'control_key_id');
    }

    public function probability()
    {
        return $this->belongsTo(Probability::class, 'probability_id');
    }

    public function impact()
    {
        return $this->belongsTo(Impact::class, 'impact_id');
    }
}
