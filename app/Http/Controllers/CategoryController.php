<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //    // Category List Page
    public function list()
    {


        $categories = Category::orderBy('id', 'asc')
            ->paginate(10);

        $categories->appends(request()->all());
        $tabName = "category";
        return view('admin.category.list', compact('categories',  'tabName'));
    }

    // Category Create Page
    public function createPage()
    {
        $tabName = "category";
        return view('admin.category.create', compact('tabName'));
    }

    public function create(Request $request)
    {

        $this->categoryValidationCheck($request);
        $data = $this->requestCategoryCreate($request);

        Category::create($data);
        $message = 'Category ' . $data['name'] . ' is added successfully';
        return redirect()->route('category#list')->with(['Message' => $message]);
    }

    // Validation and Return
    private function categoryValidationCheck($request)
    {
        Validator::make($request->all(), [
            'categoryName' => 'required|unique:categories,name',
        ])->validate();
    }

    private function requestCategoryCreate($request)
    {
        return [
            'name' => $request->categoryName,
        ];
    }

    // Category View Page
    public function viewPage($id)
    {
        $tabName = "category";
        $category = Category::where('id', $id)->first();
        return view('admin.category.view', compact('category', 'tabName'));
    }

    // Category Edit Page
    public function editPage($id)
    {
        $tabName = "category";
        $category = Category::where('id', $id)->first();
        return view('admin.category.edit', compact('category', 'tabName'));
    }

    public function edit(Request $request, $id)
    {
        $this->categoryEditCheck($request);
        $data = $this->editReturn($request);

        Category::where('id', $id)->update($data);
        $message = 'Category ' . $data['name'] . ' is edited successfully';

        return redirect()->route('category#list')->with(['Message' => $message]);
    }

    // Validation and Return
    private function categoryEditCheck($request)
    {
        Validator::make($request->all(), [
            'categoryName' => 'required',
        ])->validate();
    }


    private function editReturn($request)
    {
        return [
            'name' => $request->categoryName,
        ];
    }

    // Category List Delete
    public function delete($id)
    {
        Category::where('id', $id)->delete();
        $message = 'Category is deleted successfully';
        return redirect()->route('category#list')->with(['Message' => $message]);
    }
}
