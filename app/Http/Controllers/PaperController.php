<?php

namespace App\Http\Controllers;

use App\Models\PastPapers;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PaperController extends Controller
{
    //
    public function index(Request $request)
    {
    $subjectId = $request->query('subject');
    $gradeId = $request->query('grade');
    $papers = DB::table('past_papers')
    ->join('subjects', 'past_papers.subjectId', '=', 'subjects.id')
    ->join('grade_classes', 'past_papers.classId', '=', 'grade_classes.id')
    ->where([
        ['past_papers.subjectId', '=', $subjectId],
        ['past_papers.classId', '=', $gradeId],
    ])
    ->select('past_papers.*', 'subjects.*', 'grade_classes.*')
    ->get();



    return view('papers.index', compact('papers'));
    }

    public function create()
    {
        return view('papers.new');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'paper_url' => 'required',
            'year' => 'required',
            'subjectId' => 'required',
            'price' => 'required',
            'classId' => 'required'
        ]);

        PastPapers::create($request->all());

        return redirect()->route('your_route_name.index')
            ->with('success', 'Record created successfully.');
    }

    public function show($id)
    {
        $data = PastPapers::where('id',$id)->first();
        return view('your_show_view', compact('data'));
    }

    public function edit($id)
    {
        $data = PastPapers::where('id',$id)->first();
        return view('your_edit_view', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'paper_url' => 'required',
            'year' => 'required',
            'subjectId' => 'required',
        ]);

        $data = PastPapers::where('id',$id)->first();
        $data->update($request->all());

        return redirect()->route('your_route_name.index')
            ->with('success', 'Record updated successfully.');
    }

    public function destroy($id)
    {
        $data = PastPapers::where('id',$id)->first();
        $data->delete();
        return redirect()->route('your_route_name.index')
            ->with('success', 'Record deleted successfully.');
    }
}
