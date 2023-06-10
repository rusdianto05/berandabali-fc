<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\CategoryArticle;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryArticleRequest;

class CategoryArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CategoryArticle::latest()->get();
        if (request()->ajax()) {
                return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $actionEdit = route('category-article.edit', $data->id);
                    $actionDelete = route('category-article.destroy', $data->id);
                    return
                        view('components.action.edit', ['action' => $actionEdit]) .
                        view('components.action.delete', ['action' => $actionDelete, 'id' => $data->id]) ;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admins.article.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.article.category.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryArticleRequest $request)
    {
        CategoryArticle::create($request->validated());
        return redirect()->route('category-article.index')->with('success', 'Berhasil menambahkan kategori artikel');
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
    public function edit(CategoryArticle $categoryArticle)
    {
        return view('admins.article.category.create-edit', compact('categoryArticle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryArticleRequest $request, CategoryArticle $categoryArticle)
    {
        $categoryArticle->update($request->validated());
        return redirect()->route('category-article.index')->with('success', 'Berhasil mengubah kategori artikel');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryArticle $categoryArticle)
    {
        $categoryArticle->delete();
        return redirect()->route('category-article.index')->with('success', 'Berhasil menghapus kategori artikel');
    }
}
