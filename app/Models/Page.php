<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Page extends Model
{
    use NodeTrait;
    use HasFactory;

    public function pages_standard(): MorphToMany
    {
        return $this->morphedByMany(PageStandard::class, 'pageable');
    }

    public function pages_special(): MorphToMany
    {
        return $this->morphedByMany(PageSpecial::class, 'pageable');
    }
}
