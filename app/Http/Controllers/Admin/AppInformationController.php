<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\AppInformation;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AppInformationRequest;
use App\Models\AppSetting;

class AppInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appInformation = AppInformation::first();
        return view('admins.app-information.create-edit', compact('appInformation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AppInformationRequest $request)
    {
        $appInformation = AppInformation::first();
        $appInformation->update($request->validated());
        return redirect()->route('app-information.index')->with('success', 'Berhasil menambah Informasi Aplikasi');
    }

    public function privacyPolicy()
    {
        $appInformation = AppInformation::first();
        return view('admins.app-information.privacy-policy', compact('appInformation'));
    }

    public function termsAndConditions()
    {
        $appInformation = AppInformation::first();
        return view('admins.app-information.terms-and-conditions', compact('appInformation'));
    }    

}
