<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Models\Item;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    /**
     * display a listing of the items ordered by price asc
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $items = Item::orderBy('price', 'asc')->get();
        return view('items.index', ['items' => $items]);
    }

    /**
     * show the form for creating a new resource
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * register a new item in the database
     * @param \App\Http\Requests\ItemRequest $request
     * @return RedirectResponse
     */
    public function store(ItemRequest $request)
    {
        Item::create($request->validated);
        return redirect()->route('items-index');
    }

    /**
     * show details of a specific item
     * @param string $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(string $id)
    {
        $item = Item::where('id', $id)->first();
        return view('items.show', ['item' => $item]);
    }

    /**
     * show the form for editing the specified item.
     * @param string $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(string $id)
    {
        $item = Item::findOrFail($id);

        return view('items.edit', ['item' => $item]);
    }

    /**
     * update data of a specific item
     * @param \App\Http\Requests\ItemRequest $request
     * @param string $id
     * @return RedirectResponse
     */
    public function update(ItemRequest $request, string $id)
    {
        Item::where('id', $id)->first()->update($request->validated());
        return redirect()->route('items-index');
    }

    /**
     * delete a specific item
     * @param string $id
     * @return RedirectResponse
     */
    public function destroy(string $id)
    {
        Item::where('id', $id)->delete();
        return redirect()->route('items-index');
    }
}
