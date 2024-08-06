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
     * @var $items reiceves all the data from the database
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
     * @return mixed|RedirectResponse|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function store(ItemRequest $request)
    {

        try {

            Item::create($request->all());
            return redirect()->route('items-index');

        } catch (Exception $e) {

            return view('items.errors', ['errors' => $e->getMessage()]);

        }
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
     * @return mixed|RedirectResponse|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(string $id)
    {
        $item = Item::where('id', $id)->first();
        if (!empty($item)){
            return view('items.edit', ['item' => $item]);
        } else {
            return redirect()->route('items-index');
        }
    }

    /**
     * update data of a specific item
     * @param \App\Http\Requests\ItemRequest $request
     * @param string $id
     * @return mixed|RedirectResponse|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function update(ItemRequest $request, string $id)
    {
        try {
            Item::where('id', $id)->first()->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'sell' => $request->sell
            ]);
            return redirect()->route('items-index');

        } catch (Exception $e) {
            return view('items.errors', ['errors' => $e->getMessage()]);
        }
    }

    /**
     * delete a specific item
     * @param string $id
     * @return mixed|RedirectResponse
     */
    public function destroy(string $id)
    {
        Item::where('id', $id)->delete();
        return redirect()->route('items-index');
    }
}
