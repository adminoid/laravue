<?php

namespace Tests\Feature;

use App\Models\Page;
use App\Models\PageStandard;
use App\Models\PageType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CheckPageRelations extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function test_page_polymorphic_relations()
    {
        $page = new Page(['title' => 'Page one']);
        $pageable = PageStandard::create(['standard_field' => 'standard field value']);
        $page->pageable()->associate($pageable)->save();
        self::assertEquals(1, $page->pageable()->count());
        self::assertEquals(1, $pageable->page()->count());
    }

    public function test_page_page_types_relations()
    {
        $pageType = PageType::create(['model' => 'test_model']);
        $pages = Page::factory()->count(3)->make(['title' => 'test_page']);
        $pageType->pages()->saveMany($pages);
        self::assertEquals(3, $pageType->pages()->count());
        self::assertEquals('test_page', $pageType->pages()->first()->title);

    }
}
