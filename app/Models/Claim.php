<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Claim extends Model
{
    protected $fillable = [
        'item_report_id',
        'claimant_id',
        'reason',
    ];

    protected function casts(): array
    {
        return [
            'responded_at' => 'datetime',
            'finder_confirmed_at' => 'datetime',
            'claimant_confirmed_at' => 'datetime',
            'contact_responded_at' => 'datetime',
        ];
    }

    public function itemReport(): BelongsTo
    {
        return $this->belongsTo(ItemReport::class);
    }

    public function claimant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'claimant_id');
    }
}
