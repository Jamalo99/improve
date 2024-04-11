<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FraudAnswer extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'fraud_answers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'question_id',
        'protocol_id',
        'fraud_question_id',
        'answer',
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

    public function protocol()
    {
        return $this->belongsTo(Protocol::class, 'protocol_id');
    }

    public function fraud_question()
    {
        return $this->belongsTo(FraudQuestion::class, 'fraud_question_id');
    }
}
