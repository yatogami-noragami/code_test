<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    // item List Page
    public function list()
    {


        $items = Item::orderBy('id', 'asc')
            ->paginate(10);

        $items->appends(request()->all());
        $tabName = "item";
        return view('admin.item.list', compact('items',  'tabName'));
    }

    // item Create Page
    public function createPage()
    {
        $categories = Category::orderBy('name')->get();
        $tabName = "item";
        return view('admin.item.create', compact('tabName', 'categories'));
    }

    public function create(Request $request)
    {

        $this->itemValidationCheck($request);
        $data = $this->requestItemCreate($request);


        $fileName = uniqid() . '_' . $request->itemName . '_' . $request->itemPhoto->getClientOriginalName();
        $request->file('itemPhoto')->storeAs('public', $fileName);
        $data['photo'] = $fileName;

        item::create($data);
        $message = 'Item ' . $data['name'] . ' is added successfully';
        return redirect()->route('item#list')->with(['Message' => $message]);
    }

    // Validation and Return
    private function itemValidationCheck($request)
    {
        Validator::make($request->all(), [
            'itemName' => 'required',
            'itemCategory' => 'required',
            'itemPrice' => 'required|numeric',
            'itemDescription' => 'required',
            'itemPhoto' => 'required|mimes:jpg,jpeg,png|file',
        ])->validate();
    }

    private function requestItemCreate($request)
    {
        return [
            'name' => $request->itemName,
            'category' => $request->itemCategory,
            'price' => $request->itemPrice,
            'description' => $request->itemDescription,
        ];
    }

    // item View Page
    public function viewPage($id)
    {
        $tabName = "item";
        $item = Item::where('id', $id)->first();
        return view('admin.item.view', compact('item', 'tabName'));
    }

    // item Edit Page
    public function editPage($id)
    {
        $categories = Category::orderBy('name')->get();
        $tabName = "item";
        $item = item::where('id', $id)->first();
        return view('admin.item.edit', compact('item', 'categories', 'tabName'));
    }

    public function edit(Request $request, $id)
    {
        $this->itemEditCheck($request);
        $data = $this->editReturn($request);

        if ($request->hasFile('itemPhoto')) {
            $oldPhoto = Item::where('id', $id)->first();
            $oldPhoto = $oldPhoto->photo;
            $fileName = uniqid() . '_' . $request->itemName . '_' . $request->itemPhoto->getClientOriginalName();
            $request->file('itemPhoto')->storeAs('public', $fileName);
            $data['photo'] = $fileName;
            Storage::delete('public/' . $oldPhoto);
        }

        item::where('id', $id)->update($data);
        $message = 'Item ' . $data['name'] . ' is edited successfully';

        return redirect()->route('item#list')->with(['Message' => $message]);
    }

    // Validation and Return
    private function itemEditCheck($request)
    {
        Validator::make($request->all(), [
            'itemName' => 'required',
            'itemCategory' => 'required',
            'itemPrice' => 'required|numeric',
            'itemDescription' => 'required',
            'itemPhoto' => 'mimes:jpg,jpeg,png|file',
        ])->validate();
    }


    private function editReturn($request)
    {
        return [
            'name' => $request->itemName,
            'category' => $request->itemCategory,
            'price' => $request->itemPrice,
            'description' => $request->itemDescription,
        ];
    }

    // item List Delete
    public function delete($id)
    {
        item::where('id', $id)->delete();
        $message = 'Item is deleted successfully';
        return redirect()->route('item#list')->with(['Message' => $message]);
    }
}
