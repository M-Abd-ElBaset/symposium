<?php

namespace App\Http\Controllers;

use App\Enums\TalkType;
use App\Models\Talk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class TalkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('talks.index', ['talks' => Auth::user()->talks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('talks.create', ['talk'=> new Talk()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'type'=> ['required', Rule::enum(TalkType::class)],
            'length'=> '',
            'abstract'=> '',
            'organizer_notes'=> '',
        ]);

        Auth::user()->talks()->create($data);

        return redirect()->route('talks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Talk $talk)
    {
        return view('talks.show', ['talk' => $talk]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Talk $talk)
    {
        return view('talks.edit', ['talk' => $talk]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Talk $talk)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'type'=> ['required', Rule::enum(TalkType::class)],
            'length'=> '',
            'abstract'=> '',
            'organizer_notes'=> '',
        ]);

        $talk->update($data);

        return redirect()->route('talks.show', ['talk' => $talk]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Talk $talk)
    {
        if($talk->user_id == Auth::id())
        {
            $talk->delete();
        }
        return redirect()->route('talks.index');
    }
}
