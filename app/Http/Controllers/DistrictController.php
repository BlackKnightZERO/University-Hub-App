<?php

namespace App\Http\Controllers;

use App\Http\Requests\DistrictStoreRequest;
use App\Http\Requests\DistrictUpdateRequest;
use App\Models\District;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DistrictController extends Controller
{
    public function index(Request $request): Response
    {
        $districts = District::all();

        return view('district.index', compact('districts'));
    }

    public function create(Request $request): Response
    {
        $districts = District::all();

        return view('district.create', compact('divisions'));
    }

    public function store(DistrictStoreRequest $request): Response
    {
        $district = District::create($request->validated());

        $request->session()->flash('district.title', $district->title);

        return redirect()->route('district.index');
    }

    public function show(Request $request, District $district): Response
    {
        return view('district.show', compact('district'));
    }

    public function edit(Request $request, District $district): Response
    {
        $districts = District::all();

        return view('district.edit', compact('divisons', 'district'));
    }

    public function update(DistrictUpdateRequest $request, District $district): Response
    {
        $district->update($request->validated());

        $request->session()->flash('district.title', $district->title);

        return redirect()->route('district.index');
    }

    public function destroy(Request $request, District $district): Response
    {
        $district->delete();

        return redirect()->route('district.index');
    }
}
