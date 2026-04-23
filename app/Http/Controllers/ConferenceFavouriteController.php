<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConferenceFavouriteController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Conference $conference)
    {
        Auth::user()->favouritedConferences()->attach($conference->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Conference $conference)
    {
        Auth::user()->favouritedConferences()->detach($conference->id);
    }
}
