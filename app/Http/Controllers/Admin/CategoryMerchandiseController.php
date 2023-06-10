<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\CategoryMerchandise;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryMerchandiseRequest;

class CategoryMerchandiseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CategoryMerchandise::latest();
        if (request()->ajax()) {
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $actionEdit = route('category-merchandise.edit', $data->id);
                    $actionDelete = route('category-merchandise.destroy', $data->id);
                    return
                        view('components.action.edit', ['action' => $actionEdit]) .
                        view('components.action.delete', ['action' => $actionDelete, 'id' => $data->id]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admins.merchandise.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.merchandise.category.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryMerchandiseRequest $request)
    {
        CategoryMerchandise::create($request->validated());
        return redirect()->route('category-merchandise.index')->with('success', 'Berhasil menambah kategori merchandise');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryMerchandise $categoryMerchandise)
    {
        return view('admins.merchandise.category.create-edit', compact('categoryMerchandise'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryMerchandiseRequest $request, CategoryMerchandise $categoryMerchandise)
    {
        $categoryMerchandise->update($request->validated());
        return redirect()->route('category-merchandise.index')->with('success', 'Berhasil mengubah kategori merchandise');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryMerchandise $categoryMerchandise)
    {
        $categoryMerchandise->delete();
        return redirect()->route('category-merchandise.index')->with('success', 'Berhasil menghapus kategori merchandise');
    }
}
