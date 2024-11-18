<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Storage;
use App\University;
use App\UniversityProgram;
use App\UniversityProgramType;
use App\UniversityProgramSubjectType;
use Illuminate\Support\Facades\DB;
use App\Services\FileUploadService;

class UniversityProgramController extends Controller
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
        $universityPrograms = UniversityProgram::active()->with(['universityProgramType', 'university'])->latest()->get();
        return view('universityProgram.index', compact('universityPrograms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $universities                   = University::all();
        $universityProgramTypes         = UniversityProgramType::all();
        $universityProgramSubjectTypes  = UniversityProgramSubjectType::all();
        return view('universityProgram.create', compact(['universities', 'universityProgramTypes', 
                                                        'universityProgramSubjectTypes']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'meta_description' => $request->title,
            'meta_keywords' => $request->title,
            'status' => 1
        ]);
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:400'],
            'university_program_type_id' => ['required'],
            'university_program_subject_type_id' => ['required'],
            'university_id' => ['required'],
            'img' => ['sometimes', 'file', 'mimes:jpg,jpeg,png', 'max:5120'],
            'status' => ['required'],
        ]);
        $universityProgram = UniversityProgram::create($request->only(
            'title', 'university_id', 'university_program_type_id', 'description',
            'total_credit', 'total_year', 'admission_cost', 'total_cost', 'admission_link',
            'online_form_link', 'web_link', 'exam_system', 'exam_requirement', 'meta_description', 
            'meta_keywords', 'university_program_subject_type_id', 'status'
        ));
        if($request->hasFile('img')) {        
            $path = $this->fileUploadService->upload('UniversityProgram', $request->file('img'));
            Storage::create([
                'storageable_id'    => $universityProgram->id,
                'storageable_type'  => 'App\UniversityProgram',
                'file_type'         => $request->file('img')->extension(),
                'path'              => $path
            ]);
        }
        return redirect()->route('universityPrograms.index');
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
    public function edit(Request $request, UniversityProgram $universityProgram)
    {
        $universities                   = University::all();
        $universityProgramTypes         = UniversityProgramType::all();
        $universityProgramSubjectTypes  = UniversityProgramSubjectType::all();
        $universityProgramStorages      = $universityProgram->storages;
        $storagePath = ($universityProgramStorages->isNotEmpty()) ? $universityProgramStorages[0]->path : null;
        return view('universityProgram.edit', compact(['universityProgram', 'universities', 'storagePath', 
                                                    'universityProgramTypes', 'universityProgramSubjectTypes']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UniversityProgram $universityProgram)
    {
        $request->merge([
            'meta_description' => $request->title,
            'meta_keywords' => $request->title,
            'status' => 1,
        ]);
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:400'],
            'university_program_type_id' => ['required'],
            'university_program_subject_type_id' => ['required'],
            'university_id' => ['required'],
            'img' => ['sometimes', 'file', 'mimes:jpg,jpeg,png', 'max:5120'],
            'status' => ['required'],
        ]);

        $oldStorages        = $universityProgram->storages;
        $oldStoragesPath    = ($oldStorages->isNotEmpty()) ? $oldStorages[0]->path : null;

        if ($request->hasFile('img')) {           
            $path = $this->fileUploadService->upload('UniversityProgram', $request->file('img'));
            $this->fileUploadService->destroy($oldStoragesPath);
            if($universityProgram->storages->isNotEmpty()){
                $universityProgram->storages()->update(['path' => $path]);
            } else {
                Storage::create([
                    'storageable_id'    => $universityProgram->id,
                    'storageable_type'  => 'App\UniversityProgram',
                    'file_type'         => $request->file('img')->extension(),
                    'path'              => $path
                ]);
            }
        }
        $s = $universityProgram->update($request->only([
            'title', 'university_id', 'university_program_type_id', 'description',
            'total_credit', 'total_year', 'admission_cost', 'total_cost', 'admission_link',
            'online_form_link', 'web_link', 'exam_system', 'exam_requirement', 'meta_description', 
            'meta_keywords', 'university_program_subject_type_id', 'status'
        ]));

        return redirect()->route('universityPrograms.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UniversityProgram $universityProgram)
    {   
        $oldStorages = $universityProgram->storages;
        $oldStoragesPath = ($oldStorages->isNotEmpty()) ? $oldStorages[0]->path : null;

        if($oldStoragesPath){
            $this->fileUploadService->destroy($oldStoragesPath);
        }

        $universityProgram->storages()->delete();
        $universityProgram->delete();

        return redirect()->route('universityPrograms.index');
    }

    public function softDelete($id)
    {   $universityProgram = UniversityProgram::find($id);
        $universityProgram->update([
            'status' => 0
        ]);
        return redirect()->route('universityPrograms.index');
    }
}
