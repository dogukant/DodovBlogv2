<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use App\Models\Abouts;
use App\Models\Article;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class index extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check()) {
                $user = Auth::user();
                view()->share('user', $user);
            }
            return $next($request);
        });
    }
    public function index()
    {
        $categories = Category::all();
        return view('back.index', ['categories' => $categories]);
    }

    public function aboutedit()
    {
        $about = Abouts::all()->first();

        return view('back.aboutedit', ['about' => $about]);
    }

    public function aboutupdate(AboutRequest $request)
    {
        $about = Abouts::find($request->about_id);
        $about->update([
            'title' => $request->title,
            'content' => $request->description,
        ]);

        return redirect()->route('admin.aboutedit');
    }

    public function contactforms()
    {
        $contacts = Contact::all();

        return view('back.contactforms', ['contacts' => $contacts]);
    }
}
