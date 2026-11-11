<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\User;

class ProjectsController extends Controller
{
  // 1. Index (Read All Projects)  
  public function index()
  {
    $projects = Auth::user()->projects;
    return view('projects.index', compact('projects'));
  }

  // 2. Create (Show Form)
  public function create()
  {
    return view('projects.create');
  }

  // 3. Store (Save Projects) | Validate Form

  public function store(Request $request)
  {
    // 1. Validate Form
    $validated = $request->validate([
      'title' => 'required|string|max:255',
      'description' => 'required|string',
    ]);

     // 2. Get User
    // $user = User::findOrFail(1);

    // 3. Create Project
    Auth::user()->projects()->create([
      'title' => $validated['title'],
      'description' => $validated['description'],
      'status' => 'pending'
    ]);

    // 4. Redirect
    return redirect()
      ->route('projects.index')
      ->with('success', 'Project created successfully.');
  }

  // 4. Edit (Show Edit Form)
  public function edit(Project $project){

  return view('projects.edit',compact('project'));

  }

      // 5. Update (Save Edited project)

      public function update(Request $request, Project $project)
      {
        // 1. Validate Form
        $validated = $request->validate([
          'title' => 'required|string|max:255',
          'description' => 'required|string',
        ]);

        // 2. Update Project
        $project->update($validated);

        // 3. Redirect
        return redirect()
          ->route('projects.index')
          ->with('success', 'Project updated successfully.');
      }

          // 6. Destroy (Delete Projects)

          public function destroy(Project $project)
          {
            // 1. Delete Project
            $project->delete();

            // 2. Redirect
            return redirect()
              ->route('projects.index')
              ->with('success', 'Project deleted successfully.');
          } 




}
