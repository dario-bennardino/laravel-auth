<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Functions\Helper as Help;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // prima di inserire una nuovo progetto verifico che non sia presente
        // se esiste ritorno alla index con un messaggio di errore
        // se non esiste la salvo e ritorno alla index con un messaggio di success
        $exixts = Project::where('title', $request->title)->first();
        if ($exixts) {
            return redirect()->route('admin.projects.index')->with('error', 'Progetto già esistente');
        } else {
            $new = new Project();
            $new->title = $request->title;
            $new->slug = Help::generateSlug($new->title, Project::class);
            $new->description = $request->description;
            $new->creation_date = $request->creation_date;
            $new->save();

            return redirect()->route('admin.projects.index')->with('success', 'Progetto creato correttamente');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
