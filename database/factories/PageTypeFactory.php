<?php

namespace Database\Factories;

use App\Models\PageType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class PageTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PageType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [];
    }
}
