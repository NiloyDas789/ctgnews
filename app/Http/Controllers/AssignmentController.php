<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;
use DateTime;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use Illuminate\Contracts\Validation\Validator;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignments= Assignment::orderBy('created_at','DESC')->paginate(20);
        return view('data.assignment_data',compact('assignments'));
    }

    /**
     * Show the assignment for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create.assignment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $assignment= Assignment::create([
            'assignment' =>$request->assignment,
            'reporter' =>$request->reporter,
            'start' =>$request->start,
            'submission' =>$request->submission,

            'days'=> '0',
            'value' => '0',
        ]);


        $start = $request->start;
        $submission = $request->submission;
        $datetime1 =  Carbon::now();
        $datetime2 = new DateTime($submission);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');
        $assignment->days = $interval->format('%a');
        $assignment->save();





        Session::flash('success', 'Data Submitted Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(Assignment $assignment)
    {
        //
    }

    /**
     * Show the assignment for editing the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assignment $assignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assignment $assignment)
    {
        $assignment->value =$request->value;

        $assignment->save();

        Session::flash('success', 'Assignment Published Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assignment $assignment)
    {
        //
    }

    public function search()
    {
        $search_text= $_GET['query'];

        $assignments= Assignment::where('assignment','LIKE', '%'.$search_text.'%')->get();
        return view('data.search2',compact('assignments'));

    }
}
