<?php

namespace App\Http\Controllers;

use App\Division;
use App\Http\Requests\DivisonStoreRequest;
use App\Http\Requests\DivisonUpdateRequest;
use App\Models\Divison;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DivisonController extends Controller
{
    public function index(Request $request): View
    {
        $divisons = Divison::all();

        return view('divison.index', compact('divisons'));
    }

    public function create(Request $request): View
    {
        return view('divison.create');
    }

    public function store(DivisonStoreRequest $request): RedirectResponse
    {
        $divison = Divison::create($request->validated());

        $request->session()->flash('divison.title', $divison->title);

        return redirect()->route('divisons.index');
    }

    public function show(Request $request, Divison $divison): View
    {
        return view('divison.show', compact('divison'));
    }

    public function edit(Request $request, Divison $divison): View
    {
        return view('divison.edit', compact('divison'));
    }

    public function update(DivisonUpdateRequest $request, Divison $divison): RedirectResponse
    {
        $divison->update($request->validated());

        $request->session()->flash('divison.id', $divison->id);

        return redirect()->route('divisons.index');
    }

    public function destroy(Request $request, Divison $divison): RedirectResponse
    {
        $divison->delete();

        return redirect()->route('divisons.index');
    }
}
