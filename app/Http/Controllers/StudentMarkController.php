<?php

namespace App\Http\Controllers;

use App\Models\StudentMark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentMarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $marks = StudentMark::with('student','term')->paginate(5);
        return view('pages.student-mark.list', compact('marks'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = DB::table('students')->get();
        $terms = DB::table('terms')->where('status','active')->get();
        return view('pages.student-mark.new', compact('students','terms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'term_id' => 'required',
            'maths' => 'required',
            'science' => 'required',
            'history' => 'required',
        ],  [
            'student_id.required' => 'student field is required',
            'term_id.required' => 'term field is required',
        ]);
        StudentMark::create($request->all());
        return redirect()->route('student-mark.index')
        ->with('success', 'student mark created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentMark $studentMark)
    {
        $students = DB::table('students')->get();
        $terms = DB::table('terms')->where('status','active')->get();
        return view('pages.student-mark.edit', compact('studentMark','students','terms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentMark $studentMark)
    {
        $request->validate([
            'student_id' => 'required',
            'term_id' => 'required',
            'maths' => 'required',
            'science' => 'required',
            'history' => 'required',
        ], [
            'student_id.required' => 'student field is required',
            'term_id.required' => 'term field is required',
        ]);
        $studentMark->update($request->all());

        return redirect()->route('student-mark.index')
            ->with('success', 'Student mark updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentMark $studentMark)
    {
        $studentMark->delete();

        return redirect()->route('student-mark.index')
            ->with('success', 'Student mark deleted successfully');
    }
}
