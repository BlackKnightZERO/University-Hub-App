<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Division;
use App\University;
use App\UniversityProgram;
use App\Helpers\NumberHelper;

class FrontEndController extends Controller
{
    public function landingPage() {
        $universities = University::active()->with(['division', 'storages'])
                                    ->withCount(['universityPrograms' => function ($query) {
                                        $query->where('status', 1);
                                    }])
                                    ->limit(8)
                                    ->get();
        foreach ($universities as $university) {
            $university->university_programs_count = NumberHelper::convertToBangla($university->university_programs_count);
        }
        $universitiesWithAttribute  = $universities->map(function ($university) {
            $university->img_path   = !$university->storages->isEmpty() ? $university->storages[0]->path : 'placeholder-sm.jpg';
            return $university;
        });
        $divisions = Division::with(['universities.universityFundType'])->get();
        $divisionResult = $divisions->map(function ($division) {
            $governmentCount = $division->universities->filter(function ($university) {
                return $university->universityFundType && $university->universityFundType->title === 'সরকারি' && $university->status == 1;
            })->count();

            $nonGovernmentCount = $division->universities->filter(function ($university) {
                return $university->universityFundType && $university->universityFundType->title === 'বেসরকারি' && $university->status == 1;
            })->count();

            return [
                'id'            => $division->id,
                'division_name' => $division->division_name_bn,
                'government_universities_count' => NumberHelper::convertToBangla($governmentCount),
                'non_government_universities_count' => NumberHelper::convertToBangla($nonGovernmentCount),
            ];
        });
        return view('welcome', compact(['divisionResult', 'universities']));
    }

    public function divisionWiseUniversityPage(string $id) {
        $universities   = University::active()->with(['division', 'storages'])
                                    ->withCount(['universityPrograms' => function ($query) {
                                        $query->where('status', 1);
                                    }])
                                    ->where('division_id', $id)
                                    ->get();
        foreach ($universities as $university) {
            $university->university_programs_count = NumberHelper::convertToBangla($university->university_programs_count);
        }
        $division       = Division::find($id);
        $universitiesWithAttribute = $universities->map(function ($university) {
            $university->img_path = !$university->storages->isEmpty() ? $university->storages[0]->path : 'placeholder-sm.jpg';
            return $university;
        });
        return view('division-info', compact(['universities', 'division']));
    }

    public function universityDetailsPage(string $id) {
        $university = University::active()->with(['division', 'storages', 'universityProgramTypes', 
                                        'universityType', 'universityFundType', 
                                        'universityPrograms.universityProgramSubjectType',
                                        'universityPrograms' => function ($query) {
                                            $query->where('status', 1);
                                        },])
                                ->withCount(['universityPrograms' => function ($query) {
                                    $query->where('status', 1);
                                }])
                                ->find($id);
        $university->university_programs_count = NumberHelper::convertToBangla($university->university_programs_count);
        $university->seat_count = NumberHelper::convertToBangla($university->seat_count);
        $university->img_path = !$university->storages->isEmpty() ? $university->storages[0]->path : 'placeholder-sm.jpg';
        $universityProgramSubjectTitle = [];
        foreach($university->universityPrograms as $universityPrograms){
            $title = $universityPrograms->universityProgramSubjectType->title;
            if (!in_array($title, $universityProgramSubjectTitle)) {
                $universityProgramSubjectTitle[] = $title;
            }
        }
        return view('university-info', compact(['university', 'universityProgramSubjectTitle']));
    }

    public function universityProgramDetailsPage(string $id) {
        $universityProgram = UniversityProgram::active()->with(['universityProgramSubjectType', 'universityProgramType', 
                                                    'university', 'storages'])
                                                    ->find($id);
        $universityProgram->total_year = NumberHelper::convertToBangla($universityProgram->total_year);
        $universityProgram->total_credit = NumberHelper::convertToBangla($universityProgram->total_credit);
        $relatedPrograms = UniversityProgram::active()->with(['universityProgramSubjectType', 'universityProgramType', 'university'])
                                            ->where('university_id', $universityProgram->university_id)
                                            ->where('university_program_subject_type_id', $universityProgram->university_program_subject_type_id)
                                            ->where('id', '!=', $universityProgram->id)
                                            ->get();
        $universityProgram->img_path = !$universityProgram->storages->isEmpty() ? $universityProgram->storages[0]->path : 'placeholder-sm.jpg';
        return view('program-info', compact(['universityProgram', 'relatedPrograms']));
    }

    public function universityListPage() {
        $universities = University::active()->with(['division', 'storages'])
                                    ->withCount(['universityPrograms' => function ($query) {
                                        $query->where('status', 1);
                                    }])
                                    ->limit(8)
                                    ->get();
        foreach ($universities as $university) {
            $university->university_programs_count = NumberHelper::convertToBangla($university->university_programs_count);
        }
        $universitiesWithAttribute  = $universities->map(function ($university) {
            $university->img_path   = !$university->storages->isEmpty() ? $university->storages[0]->path : 'placeholder-sm.jpg';
            return $university;
        });
        return view('university-list', compact(['universities']));
    }

    public function programListPage() {
        $universityPrograms = UniversityProgram::active()->with(['universityProgramSubjectType', 'universityProgramType', 
                                                    'university', 'storages', ])
                                                    ->get();
        $universityProgramsWithAttribute  = $universityPrograms->map(function ($universityProgram) {
            $universityProgram->img_path   = !$universityProgram->storages->isEmpty() ? $universityProgram->storages[0]->path : 'placeholder-sm.jpg';
            return $universityProgram;
        });
        return view('program-list', compact(['universityPrograms']));
    }
}
