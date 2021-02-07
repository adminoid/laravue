<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PageType extends Model
{
    use HasFactory;

    public function pages() : hasMany
    {
        return $this->hasMany(Page::class);
    }
}
