<?php

namespace App\Http\Controllers\Admin;

use App\Models\Merchandise;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\CategoryMerchandise;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MerchandiseRequest;
use App\Models\MerchandiseImage;

class MerchandiseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Merchandise::with('categoryMerchandise', 'merchandiseImages')->latest()->get();
        if (request()->ajax()) {
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $actionEdit = route('merchandise.edit', $data->id);
                    $actionDelete = route('merchandise.destroy', $data->id);
                    return
                        view('components.action.edit', ['action' => $actionEdit]) .
                        view('components.action.delete', ['action' => $actionDelete, 'id' => $data->id]);
                })
                ->addColumn('category', function ($data) {
                    return $data->categoryMerchandise->name ?? '-';
                })
                ->editColumn('description', function ($data) {
                    return $data->description ? $data->description : '-';
                })
                ->addColumn('image', function ($data) {
                    // $data = MerchandiseImage::where('merchandise_id', $data->id)->first();
                    // return $data ? '<img src="' . asset($data->image) . '" width="100px" height="100px">' : '-';
                    // show only 1 image from merchandise images
                    $data = MerchandiseImage::where('merchandise_id', $data->id)->first();
                    return $data ? '<img src="' . asset($data->image) . '" width="100px" height="100px">' : '-';
                })
                ->rawColumns(['action', 'category', 'image', 'description'])
                ->make(true);
        }
        return view('admins.merchandise.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoryMerchandise = CategoryMerchandise::all();
        return view('admins.merchandise.create-edit', compact('categoryMerchandise'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MerchandiseRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($request->name);
        $i = 1;
        while (Merchandise::where('slug', $data['slug'])->first()) {
            $data['slug'] = $data['slug'] . '-' . $i++;
        }
        $merchandise =  Merchandise::create($data);
        if ($request->hasFile('image')) {
            // unlink image from storage
            foreach ($request->file('image') as $image) {
                $foto = $image->move('storage/images/merchandise', $image->getClientOriginalName());
                MerchandiseImage::create([
                    'merchandise_id' => $merchandise->id,
                    'image' => $foto,
                ]);
            }
        }
        return redirect()->route('merchandise.index')->with('success', 'Berhasil menambah merchandise');
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
    public function edit(Merchandise $merchandise)
    {
        $categoryMerchandise = CategoryMerchandise::all();
        return view('admins.merchandise.create-edit', compact('merchandise', 'categoryMerchandise'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(MerchandiseRequest $request, Merchandise $merchandise)
    {
        $merchandise->update($request->validated());
        // if has request images 
        if ($request->hasFile('image')) {
            // unlink image from storage
            if (!empty($merchandise->merchandiseImages)) {
                foreach ($merchandise->merchandiseImages as $image) {
                    file_exists($image->image) ? unlink($image->image) : null;
                }
                $merchandise->merchandiseImages()->delete();
            }
            // delete all images
            $merchandise->merchandiseImages()->delete();
            foreach ($request->file('image') as $image) {
                $foto = $image->move('storage/images/merchandise', $image->getClientOriginalName());
                MerchandiseImage::create([
                    'merchandise_id' => $merchandise->id,
                    'image' => $foto,
                ]);
            }
        }
        return redirect()->route('merchandise.index')->with('success', 'Berhasil mengubah merchandise');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Merchandise $merchandise)
    {
        if (!empty($merchandise->merchandiseImages)) {
            foreach ($merchandise->merchandiseImages as $image) {
                file_exists($image->image) ? unlink($image->image) : null;
            }
            $merchandise->merchandiseImages()->delete();
        }
        $merchandise->delete();
        return redirect()->route('merchandise.index')->with('success', 'Berhasil menghapus merchandise');
    }
}
