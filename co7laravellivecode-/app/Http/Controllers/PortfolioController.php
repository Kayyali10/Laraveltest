<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PortfolioController extends Controller
{
    public function home()
    {
        $user = Auth::user();
        $skills = $user->skills;
        return view('portfolio.home', compact('user', 'skills'));
    }

    public function projects()
    {
        // جلب المستخدم المسجل دخوله حالياً
        $user = Auth::user();
        // جلب المشاريع الخاصة بهذا المستخدم
       $projects = $user->projects;
        // إرسال المشاريع إلى صفحة Blade
       return view('portfolio.projects', compact('projects'));
    }

    public function contact (){
        return view('portfolio.contact');
    }

    
public function editProfile()
{
    $user = Auth::user();
    $user->load('skills');
    return view('portfolio.edit', compact('user'));
}

public function updateProfile(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'job_title' => 'nullable|string|max:255',
        'skills' => 'required|array|min:1',
        'skills.*' => 'required|string|max:255',
    ]);

    $user = Auth::user();

    $user->update([
        'name' => $validated['name'],
        'job_title' => $validated['job_title'] ?? null,
    ]);
      // Delete Old Skills
    $user->skills()->delete();

    // Insert New Skills
    foreach ($validated['skills'] as $skill) {

        $user->skills()->create([
            'name' => trim($skill),
        ]);

    }
    
    return redirect()
        ->route('home')
        ->with('success', 'Profile updated successfully.');
}
}