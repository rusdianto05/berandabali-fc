<?php

namespace App\Http\Controllers\Admin;

use App\Models\Galery;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GaleryRequest;
use App\Models\GaleryImage;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = GaleryImage::latest()->get();
        if (request()->ajax()) {
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $actionDelete = route('galery.destroy', $data->id);
                    return
                        view('components.action.delete', ['action' => $actionDelete, 'id' => $data->id]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admins.galery.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.galery.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GaleryRequest $request)
    {
        $data = $request->validated();
        $data['image'] = 'storage/' . $request->file('image')->store('images/galery', 'public');
        $galery = GaleryImage::create($data);
        return redirect()->route('galery.index')->with('success', 'Foto Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GaleryImage $galery)
    {
        file_exists($galery->image) ? unlink($galery->image) : '';
        $galery->delete();
        return redirect()->route('galery.index')->with('success', 'Foto Berhasil Dihapus');
    }
}
