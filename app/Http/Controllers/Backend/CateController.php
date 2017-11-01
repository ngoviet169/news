<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cates = Category::all();

        return view('admin.category.list')->with(compact('cates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:category,name'
        ]);

        $input = $request->only('name');
        $cate = new Category();
        $status = $cate->create($input);

        if (!$status) {
            $fail = 'Sorry, somethings went wrong :(';
            return view('admin.category.form')->with(compact('fail'));
        }

        return redirect()->route('cate.index')->with('noti', 'Add Category successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cateDetail = Category::find($id);

        return view('admin.category.form')->with(compact('cateDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:category,name'
        ]);

        $cate = Category::find($id);
        $input = $request->only('name');
        $status = $cate->update($input);

        if (!$status) {
            return redirect()->route('cate.edit', $id)->with('danger', 'Sorry, somethings went wrong :(');
        }

        return redirect()->route('cate.index')->with('noti', 'Update Category successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cate = Category::find($id);
        $status = $cate->delete();

        if (!$status) {
            return redirect()->route('cate.index', $id)->with('danger', 'Sorry, somethings went wrong :(');
        }

        return redirect()->route('cate.index')->with('noti', 'Delete Category successfully !');
    }
}
