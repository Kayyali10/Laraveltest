<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
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
}