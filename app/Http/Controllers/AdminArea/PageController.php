<?php

namespace App\Http\Controllers\AdminArea;

use App\Http\Controllers\Controller;
use App\Models\Page;
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
        return response(['msg' => 'success']);

        $id = $request->get('id');
        $index = $request->get('index');
        $parent = $request->get('parent');

        $node = Page::find($id);

        if ($index != intval($index)) {
            if ($parent == 'root') {
                $node->saveAsRoot();
            }
            else {
                $parent = Page::find($parent);
                $parent->appendNode($node);
            }
        }
        else {
            if ($parent == 'root') {
                $neighbors = Page::whereNull('parent_id')->orderBy('_lft')->get();
            }
            else {
                $neighbors = Page::find($parent)->sortChildren()->get();
            }

            // if newPosition is 0 - get first children and insert before them
            if ($index == 0) {
                $firstChildren = $neighbors[0];
                $node->beforeNode($firstChildren)->save();
            }
            // else - insert afterNode
            else {
                $neighbor = $neighbors[$index-1];
                $node->afterNode($neighbor)->save();
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // need to add special fields: id, _lft, parent_id
        return response()->json(
            Page::get(['id', '_lft', 'parent_id', 'title'])
//                ->map(function ($page) {
//                    $page['folder'] = $page->children()->exists();
//                    return $page;
//                })
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
     * @return \Illuminate\Http\JsonResponse
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
