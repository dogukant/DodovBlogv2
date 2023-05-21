<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Contact;

use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Validator;

use App\Models\Article;
use App\Models\Category;
use App\Models\Abouts;

class Homepage extends Controller

{

    public function __construct()
    {
        view()->share('categories',Category::inRandomOrder()->get());
    }

    public function index()
    {
        $data['articles']=Article::orderBy('created_at','DESC')->paginate(2);
        return view('front.index', $data);
    }

    public function single($slug)
    {
        $article = Article::whereSlug($slug)->first() ?? abort(403,'böyle bir yazı bulunamadı');
        return view('front.single', ['article' => $article]);
    }

    public function category($slug)
    {
        $category = Category::whereSlug($slug)->first() ?? abort(403, 'Bu kategoriye ait yazı bulunamadı');
        $data['category']= $category;
        $data['articles']=Article::where('category_id',$category->id)->orderBy('created_at', 'DESC')->get();
        return view('front.category', $data);
    }

    public function abouts()
    {
        $about = Abouts::all()->first();
        return view('front.about', compact('about'));
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function contactpost(ContactRequest $request)
    {
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);
        return redirect()->back();
    }
}
