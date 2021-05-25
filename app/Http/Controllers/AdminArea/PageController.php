<?php

namespace App\Http\Controllers\AdminArea;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function __construct()
    {
        $this->middleware(['admin']);
    }

    /**
     * Custom methods
     */
    public function move(Request $request)
    {
//        abort(403, 'test error');
//        return response(['msg' => 'success']);

        $id = $request->get('id');
        $index = $request->get('index');
        $parent = $request->get('parent');

        $page = Page::find($id);

        if ($parent == 'root') {
            $neighbors = Page::whereIsRoot()->orderBy('_lft')->get();
            if ($neighbors) {
                $page->insertBeforeNode($neighbors[$index]);
            } else {
                $page->saveAsRoot();
            }
        } else {
            $parentPage = Page::find($parent);
            $neighbors = $parentPage->children()->orderBy('_lft')->get();
            if ($neighbors->count() > 0) {
                $page->insertBeforeNode($neighbors[$index]);
            } else {
                $parentPage->appendNode($page);
            }
        }

        return response(['msg' => 'success']);
    }

    // todo: make method for getting incomplete tree
//    public function getList($id)
//    {
//        dd($id);
//    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        // need to add special fields: id, _lft, parent_id
        return response()->json(
            Page::defaultOrder()
                ->get(['id', '_lft', 'parent_id', 'title'])
                ->toTree()
                ->toArray()
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return JsonResponse
     */
    public function show(Page $page)
    {
//        return response()->json($page->id);
        return response()->json($page->with(['pageable', 'page_type'])->find($page->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }
}
