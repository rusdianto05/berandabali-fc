<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CategoryArticle;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Article::with('categoryArticle')->latest()->get();
        if (request()->ajax()) {
                return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $actionEdit = route('article.edit', $data->id);
                    $actionDelete = route('article.destroy', $data->id);
                    return
                        view('components.action.edit', ['action' => $actionEdit]) .
                        view('components.action.delete', ['action' => $actionDelete, 'id' => $data->id]) ;
                })
                ->addColumn('image', function ($data) {
                    return '<img src="' . asset($data->image) . '" width="100px">';
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }
        return view('admins.article.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = CategoryArticle::all();
        return view('admins.article.create-edit', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(ArticleRequest $request)
   {
       $data = $request->validated();
       $data['slug'] = $this->generateUniqueSlug($request->title);
       $data['image'] = 'storage/' . $request->file('image')->store('images/articles', 'public');
       Article::create($data);
       return redirect()->route('article.index')->with('success', 'Article created successfully');
   }
   
   // Generate a unique slug
   private function generateUniqueSlug($title)
   {
       $slug = Str::slug($title);
       $no = 0;
       while (Article::where('slug', $slug)->first()) {
           $no++;
           $slug = Str::slug($title) . '-' . $no;
       }
       return $slug;
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
    public function edit(Article $article)
    {
        $categories = CategoryArticle::all();
        return view('admins.article.create-edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = 'storage/' . $request->file('image')->store('images/articles', 'public');
        }
        $article->update($data);
        return redirect()->route('article.index')->with('success', 'Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('article.index')->with('success', 'Article deleted successfully');
    }
}
