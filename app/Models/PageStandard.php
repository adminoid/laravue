<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class PageStandard extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function page() : morphOne
    {
        return $this->morphOne(Page::class, 'pageable');
    }
}
