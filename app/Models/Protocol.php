<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Protocol extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'protocols';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'workspace_id',
        'capital_id',
        'macroprocess_id',
        'title',
        'index',
        'control_manager',
        'control_deputy',
        'status_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function workspace()
    {
        return $this->belongsTo(Workspace::class, 'workspace_id');
    }

    public function capital()
    {
        return $this->belongsTo(Capital::class, 'capital_id');
    }

    public function macroprocess()
    {
        return $this->belongsTo(Macroprocess::class, 'macroprocess_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
