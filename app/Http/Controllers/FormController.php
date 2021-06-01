<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use Illuminate\Contracts\Validation\Validator;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms= Form::orderBy('created_at','DESC')->paginate(20);
        return view('data.data',compact('forms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form= Form::create([
            'assignment' =>$request->assignment,
            'reporters' =>$request->reporters,
            'start' =>$request->start,
            'submission' =>$request->submission,
            'value' => '0',
        ]);

        Session::flash('success', 'Data Submitted Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form $form)
    {
        $form->value =$request->value;

        $form->save();

        Session::flash('success', 'Assignment Published Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
        //
    }

    public function search()
    {
        $search_text= $_GET['query'];

        $forms= Form::where('assignment','LIKE', '%'.$search_text.'%')->get();
        return view('data.search',compact('forms'));

    }
}
