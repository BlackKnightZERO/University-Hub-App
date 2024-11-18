<?php

namespace App\Http\Controllers;

use App\University;
use App\Division;
use App\Storage;
use App\UniversityFundType;
use App\UniversityProgramType;
use App\UniversityType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\FileUploadService;
use App\Helpers\NumberHelper;

class UniversityController extends Controller
{
    private $fileUploadService;

    public function __construct(FileUploadService $fileUploadService){
        $this->fileUploadService = $fileUploadService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $universities = University::active()
                                    ->with(['division', 'universityType', 'universityFundType'])
                                    ->withCount(['universityPrograms' => function ($query) {
                                        $query->where('status', 1);
                                    }])
                                    ->latest()
                                    ->get();
        foreach ($universities as $university) {
            $university->university_programs_count = NumberHelper::convertToBangla($university->university_programs_count);
        }
        return view('university.index', compact('universities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $divisions              = Division::all();
        $universityFundTypes    = UniversityFundType::all();
        $universityProgramTypes = UniversityProgramType::all();
        $universityTypes        = UniversityType::all();
        return view('university.create', compact(['divisions','universityFundTypes', 'universityProgramTypes', 'universityTypes']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'meta_description' => $request->title,
            'meta_keywords' => $request->title,
            'status' => 1,
        ]);
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:400'],
            'university_fund_type_id' => ['required'],
            'division_id' => ['required'],
            'university_type_id' => ['required'],
            'university_program_type_id' => ['required', 'array', 'min:1'],
            'meta_description' => ['required'],
            'meta_keywords' => ['required'],
            'img' => ['sometimes', 'file', 'mimes:jpg,jpeg,png', 'max:5120'],
            'status' => ['required'],
        ]);
        DB::beginTransaction();
        try {
            $university = University::create($request->only([
                'title', 'division_id', 'university_fund_type_id', 'university_type_id',
                'university_program_type_id', 'description', 'phone', 'contact',
                'short_links', 'gmap_link', 'web_link', 'email', 'email_register',
                'meta_description', 'meta_keywords','seat_count', 'status'
            ]));
            $university->universityProgramTypes()->sync($request->university_program_type_id);
            if($request->hasFile('img')) {        
                $path = $this->fileUploadService->upload('University', $request->file('img'));
                Storage::create([
                    'storageable_id'    => $university->id,
                    'storageable_type'  => 'App\University',
                    'file_type'         => $request->file('img')->extension(),
                    'path'              => $path
                ]);
            }
            $request->session()->flash('university.title', $university->title);
        DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
        return redirect()->route('universities.index');
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
    public function edit(Request $request, University $university)
    {
        $divisions                  = Division::all();
        $universityFundTypes        = UniversityFundType::all();
        $universityProgramTypes     = UniversityProgramType::all();
        $universityTypes            = UniversityType::all();
        $selectedProgramTypes       = $university->universityProgramTypes->pluck('id')->toArray();
        $universityStorages         = $university->storages;
        $storagePath = ($universityStorages->isNotEmpty()) ? $universityStorages[0]->path : null;
        return view('university.edit', compact(['university', 'selectedProgramTypes', 'storagePath', 'divisions','universityFundTypes', 'universityProgramTypes', 'universityTypes']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, University $university)
    {
        $request->merge([
            'meta_description' => $request->title,
            'meta_keywords' => $request->title,
            'status' => 1,
        ]);
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:400'],
            'university_fund_type_id' => ['required'],
            'division_id' => ['required'],
            'university_type_id' => ['required'],
            'university_program_type_id' => ['required', 'array', 'min:1'],
            'meta_description' => ['required'],
            'meta_keywords' => ['required'],
            'img' => ['sometimes', 'file', 'mimes:jpg,jpeg,png', 'max:5120'],
            'status' => ['required'],
        ]);

        $oldStorages        = $university->storages;
        $oldStoragesPath    = ($oldStorages->isNotEmpty()) ? $oldStorages[0]->path : null;

        if ($request->hasFile('img')) {           
            $path = $this->fileUploadService->upload('University', $request->file('img'));
            $this->fileUploadService->destroy($oldStoragesPath);
            if($university->storages->isNotEmpty()){
                $university->storages()->update(['path' => $path]);
            } else {
                Storage::create([
                    'storageable_id'    => $university->id,
                    'storageable_type'  => 'App\University',
                    'file_type'         => $request->file('img')->extension(),
                    'path'              => $path
                ]);
            }
        }

        $university->update($request->only([
            'title', 'division_id', 'university_fund_type_id', 'university_type_id',
            'university_program_type_id', 'description', 'phone', 'contact',
            'short_links', 'gmap_link', 'web_link', 'email', 'email_register',
            'meta_description', 'meta_keywords', 'seat_count', 'status'
        ]));

        if($request->input('university_program_type_id')) {
            $university->universityProgramTypes()->sync($request->university_program_type_id);
        }


        return redirect()->route('universities.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    public function destroy(University $university)
    {
        $universityPrograms = $university->universityPrograms;

        foreach($universityPrograms as $universityProgram) {
            $oldStorages = $universityProgram->storages;
            $oldStoragesPath = ($oldStorages->isNotEmpty()) ? $oldStorages[0]->path : null;

            if($oldStoragesPath){
                $this->fileUploadService->destroy($oldStoragesPath);
            }
            $universityProgram->storages()->delete();
        }

        $oldStorages = $university->storages;
        $oldStoragesPath = ($oldStorages->isNotEmpty()) ? $oldStorages[0]->path : null;

        if($oldStoragesPath){
            $this->fileUploadService->destroy($oldStoragesPath);
        }

        $university->storages()->delete();

        $university->universityPrograms()->delete();
        $university->delete();

        return redirect()->route('universities.index');
    }

    public function softDelete($id) {
        $university = University::find($id);
        $universityPrograms = $university->universityPrograms;
        foreach($universityPrograms as $universityProgram) {
            $universityProgram->update(['status' => 0]);
        }
        $university->update([
            'status' => 0
        ]);
        return redirect()->route('universities.index');
    }
}
