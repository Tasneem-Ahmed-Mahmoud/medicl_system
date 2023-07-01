<?php

namespace App\Http\Controllers;
use Log;
use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Http\Requests\FeedbackRequest;
class FeedbackController extends Controller
{
    
    public function index()
    {
        $feedbacks=Feedback::paginate(5,['name','email','subject','message','id']);
        
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(FeedbackRequest $request)
    {
         return response($request->all());
        $feedback=Feedback::create([
             'name'=>$request->name,
             'email'=>$request->email,
             'subject'=>$request->subject,
             'message'=>$request->message
        ]);
        if($feedback){

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback)
    {
        //
    }
}
