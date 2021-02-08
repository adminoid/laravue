<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\PageSpecial;
use App\Models\PageStandard;
use App\Models\PageType;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $standardType = PageType::create([
            'model' => 'PageStandard',
            'vue_component' => 'PageStandard.vue',
            'template' => 'Standard',
        ]);

        $specialType = PageType::create([
            'model' => 'PageSpecial',
            'vue_component' => 'PageSpecial.vue',
            'template' => 'Special',
        ]);

        for ($i = 0; $i <= 4; $i++) {
            if ($i === 0 || $i === 4) {
                ${"page_" . $i} = PageSpecial::create(['special_field' => 'special field value ' . $i]);
            }
            else {
                ${"page_" . $i} = PageStandard::create(['standard_field' => 'standard field value ' . $i]);
            }
        }

        $mainPage = Page::create(['title' => 'Main page']);
        $mainPage->wrap($specialType, $page_0, $node = false);

        $childPage1 = Page::create(['title' => 'child page one']);
        $childPage1->wrap($standardType, $page_1, $mainPage);
        $childPage1->appendToNode($mainPage)->save();

        $childPage2 = Page::create(['title' => 'child page two']);
        $childPage2->wrap($standardType, $page_2, $mainPage);
        $childPage2->appendToNode($mainPage)->save();

        $grandChildPage3 = Page::create(['title' => 'grand child page one']);
        $grandChildPage3->wrap($standardType, $page_3, $childPage1);
        $grandChildPage3->appendToNode($childPage1)->save();

        $grandChildPage4 = Page::create(['title' => 'grand child page two']);
        $grandChildPage4->wrap($specialType, $page_4, $childPage2);
        $grandChildPage4->appendToNode($childPage2)->save();

    }
}
