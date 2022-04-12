<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = Feedback::all();

        $columns = [
            'No',
            'Name',
            'Email',
            'Message',
            ''
        ];

        return view('feedbacks.index', compact('feedbacks', 'columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);

        Feedback::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ]);

        return redirect()->route('dashboard')->with('success',['Feedback Sent']); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        return view('feedbacks.edit', compact('feedback'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        $request->validate([
            'star' => 'required',
            'comment' => 'required'
        ]);

        $feedback->star = $request->star;
        $feedback->comment = $request->comment;
        
        $feedback->save();

        return redirect()->route('feedbacks.index')->with('success',['Feedback Updated']); 

    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();

        return redirect()->route('feedbacks.index')->with('success',['Feedback Deleted']); 
    }
}
