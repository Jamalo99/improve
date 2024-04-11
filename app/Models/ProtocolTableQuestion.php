<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProtocolTableQuestion extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'protocol_table_questions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'protocol_id',
        'desc_activity',
        'desc_control',
        'support_info',
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

    public function protocol()
    {
        return $this->belongsTo(Protocol::class, 'protocol_id');
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
