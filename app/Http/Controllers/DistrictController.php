<?php

namespace App\Http\Controllers;

use App\Http\Requests\DistrictStoreRequest;
use App\Http\Requests\DistrictUpdateRequest;
use App\Models\District;
use App\Models\Divison;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DistrictController extends Controller
{
    public function index(Request $request): View
    {
        $districts = District::with('divison')->latest()->get();

        return view('district.index', compact('districts'));
    }

    public function create(Request $request): View
    {
        $divisons = Divison::all();

        return view('district.create', compact('divisons'));
    }

    public function store(DistrictStoreRequest $request): RedirectResponse
    {
        $district = District::create($request->validated());

        $request->session()->flash('district.title', $district->title);

        return redirect()->route('districts.index');
    }

    public function show(Request $request, District $district): View
    {
        return view('district.show', compact('district'));
    }

    public function edit(Request $request, District $district): View
    {
        $divisons = Divison::all();

        return view('district.edit', compact('divisons', 'district'));
    }

    public function update(DistrictUpdateRequest $request, District $district): RedirectResponse
    {
        $district->update($request->validated());

        $request->session()->flash('district.id', $district->id);

        return redirect()->route('districts.index');
    }

    public function destroy(Request $request, District $district): RedirectResponse
    {
        $district->delete();

        return redirect()->route('districts.index');
    }
}
