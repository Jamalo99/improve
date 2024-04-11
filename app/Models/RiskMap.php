<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RiskMap extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'risk_maps';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'workspace_id',
        'capital_id',
        'macroprocess_id',
        'probability_id',
        'impact_id',
        'risk_owner',
        'desc_risk',
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

    public function probability()
    {
        return $this->belongsTo(Probability::class, 'probability_id');
    }

    public function impact()
    {
        return $this->belongsTo(Impact::class, 'impact_id');
    }

    public function controlkeys()
    {
        return $this->belongsToMany(ControlKey::class);
    }
}
