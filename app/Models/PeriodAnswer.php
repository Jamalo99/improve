<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PeriodAnswer extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'period_answers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'question_id',
        'period',
        'answer',
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

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
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
