<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Page extends Model
{
    use HasFactory;
    use NodeTrait;

    protected $guarded = [];

    public function page_type(): BelongsTo
    {
        return $this->belongsTo(PageType::class);
    }

    public function pageable() : morphTo
    {
        return $this->morphTo();
    }

    public function wrap($type, $pageable, $node = false): void
    {
        $this->page_type()->associate($type);
        $this->pageable()->associate($pageable)->save();
        if ($node) {
            $this->appendToNode($node)->save();
        }
    }
}
