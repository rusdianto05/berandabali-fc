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
        $data = Galery::with('images')->latest()->get();
        if (request()->ajax()) {
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $actionEdit = route('galery.edit', $data->id);
                    $actionDelete = route('galery.destroy', $data->id);
                    $actionShow = route('galery.show', $data->id);
                    return
                        view('components.action.edit', ['action' => $actionEdit]) .
                        view('components.action.delete', ['action' => $actionDelete, 'id' => $data->id]) .
                        view('components.action.show', ['action' => $data->id, 'id' => $data->id, 'label' => 'Lihat Foto']);
                })
                ->addColumn('foto', function ($data) {
                    $images = '';
                    foreach ($data->images as $key => $value) {
                        $images .= '<img src="' . asset($value->image) . '" class="mx-2" width="100px">';
                    }
                    return $images;
                })
                ->rawColumns(['action', 'foto'])
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
        $galery = Galery::create($request->validated());
        $this->storeImages($galery, $request->file('images'));

        return redirect()->route('galery.index')->with('success', 'Galery created successfully');
    }

    private function storeImages($galery, $images)
    {
        foreach ($images as $key => $value) {
            // if file_exist delete file
            $imagePath =  'storage/' . $value->store('images/galery', 'public');
            GaleryImage::create([
                'galery_id' => $galery->id,
                'image' => $imagePath,
            ]);
        }
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
    public function edit(Galery $galery)
    {
        return view('admins.galery.create-edit', compact('galery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GaleryRequest $request, Galery $galery)
    {
        $galery->update($request->validated());
        $galery->images()->delete();
        foreach ($request->file('images') as $key => $value) {
            $images = 'storage/' . $value->store('images/galery', 'public');
            GaleryImage::create([
                'galery_id' => $galery->id,
                'image' => $images,
            ]);
        }
        return redirect()->route('galery.index')->with('success', 'Galery updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galery $galery)
    {
        file_exists($galery->images->image) ? unlink($galery->images->image) : '';
        $galery->delete();
        return redirect()->route('galery.index')->with('success', 'Galery deleted successfully');
    }
}
