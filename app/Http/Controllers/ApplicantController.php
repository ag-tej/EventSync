<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Applicant;
use App\Models\Application;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicantController extends Controller
{
    public function apply($slug)
    {
        $event = Event::where('slug', $slug)->first();
        $questions = Application::where('event_id', $event->id)->get();
        $hasApplied = Applicant::where('user_id', Auth::user()->id)->where('event_id', $event->id)->first();
        $answers = Answer::where('user_id', Auth::user()->id)->where('event_id', $event->id)->get();
        return view('user.apply', compact('event', 'questions', 'hasApplied', 'answers'));
    }

    public function submit(Request $request)
    {
        $questions = Application::where('event_id', $request->event_id)->get();
        foreach ($questions as $question) {
            $id = $question->id;
            $answer = 'answer_' . $id;
            $validated = $request->validate([
                $answer => 'required',
            ]);
        }
        foreach ($questions as $question) {
            $id = $question->id;
            $answer = 'answer_' . $id;
            $newData = new Answer;
            $newData->application_id = $id;
            $newData->event_id = $request->event_id;
            $newData->user_id = $request->user_id;
            $newData->answer = $request->$answer;
            $newData->save();
        }
        $applicant = new Applicant;
        $applicant->user_id = $request->user_id;
        $applicant->event_id = $request->event_id;
        $applicant->save();
        return redirect()->back()->with('success', 'Application submitted.');
    }

    public function withdraw($slug)
    {
        $event = Event::where('slug', $slug)->first();
        $answers = Answer::where('user_id', Auth::user()->id)->where('event_id', $event->id)->get();
        $applicant = Applicant::where('user_id', Auth::user()->id)->where('event_id', $event->id)->first();
        foreach ($answers as $answer) {
            $answer->delete();
        }
        $applicant->delete();
        return redirect()->back()->with('danger', 'Application withdrawn.');
    }

    public function myEvents()
    {
        $applicants = Applicant::where('user_id', Auth::user()->id)->get();
        return view('user.my_events', compact('applicants'));
    }
}
