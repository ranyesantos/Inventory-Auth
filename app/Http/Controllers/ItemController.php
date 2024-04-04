<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::orderBy('value', 'asc')->get();;
        return view('items.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $value = $request->input('value');
        $sell = $request->input('sell');

        if (!empty($name) && !empty($description) && !empty($sell) && !empty($value)){
            Item::create($request->all());
            return redirect()->route('items-index');
        } else {
            return view('items.errors', ['erro' => "Todos os campos devem ser preenchidos"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Item::where('id', $id)->first();
        return view('items.show', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = Item::where('id', $id)->first();
        $name = $request->input('name');
        $description = $request->input('description');
        $value = $request->input('value');
        $sell = $request->input('sell');
        $change = false;

        if (!empty($name) && !empty($description) && !empty($sell) && !empty($value)){

            if ($item['name'] != $request ['name']) {
                $change = true;

            } elseif ($item['description'] != $request ['description']) {
                $change = true;

            } elseif ($item['sell'] != $request ['sell']) {
                $change = true;

            } elseif ($item['value'] != $request ['value']) {
                $change = true;

            } else {
                return view('items.errors', ['erro' => "Nenhum campo alterado"]);
            }

        } else {
            return view('items.errors', ['erro' => "Todos os campos devem ser preenchidos"]);
        }

        if ($change == true){
            Item::where('id', $id)->first()->update([
                'name' => $request->name,
                'description' => $request->description,
                'value' => $request->value,
                'sell' => $request->sell
            ]);
            return redirect()->route('items-index');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Item::where('id', $id)->delete();
        return redirect()->route('items-index');
    }
}
