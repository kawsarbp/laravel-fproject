<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Mockery\Exception;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(8);
        return view('admin.category.manage', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:categories',
            'status' => 'required|string'
        ]);

        $name = $request->name;
        try {
            Category::create([
                'user_id' => auth()->id(),
                'name' => $name,
                'slug' => strtolower(str_replace(' ', '-', $name)),
                'status' => $request->status,
            ]);
            session()->flash('type', 'success');
            session()->flash('message', 'Category Save Success');
        } catch (Exception $exception) {
            session()->flash('type', 'danger');
            session()->flash('message', $exception->getMessage());
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        if ($category)
            return view('admin.category.show', compact('category'));
        else
            return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        if ($category)
            return view('admin.category.edit', compact('category'));
        else
            return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|unique:categories',
            'status' => 'required|string'
        ]);
        try {
            $find = Category::find($id);
            $find->user_id = auth()->id();
            $find->name = $request->name;
            $find->slug = strtolower(str_replace(' ', '-', $request->name));
            $find->status = $request->status;
            $find->update();

            session()->flash('type', 'success');
            session()->flash('message', 'Category Edit Success');
        } catch (Exception $exception) {
            session()->flash('type', 'danger');
            session()->flash('message', $exception->getMessage());
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            $category = Category::find($id);
            $category->delete();

            session()->flash('type', 'success');
            session()->flash('message', 'Category Delete Success');
        } catch (Exception $exception) {
            session()->flash('type', 'danger');
            session()->flash('message', $exception->getMessage());
        }
        return redirect()->back();
    }
}
