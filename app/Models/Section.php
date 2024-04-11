<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'sections';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'control_key_id',
        'title_en',
        'title_it',
        'title_de',
        'title_fr',
        'display_order',
        'original',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function control_key_reference()
    {
        return $this->belongsTo(ControlKey::class, 'control_key_reference_id');
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'section_id', 'id');
    }
}
