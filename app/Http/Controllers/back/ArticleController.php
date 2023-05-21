<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;



class ArticleController extends Controller
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

    public function articles()
    {
        $articles = Article::orderBy('created_at', 'Asc')->get();
        return view('back.articles.articles', ['articles' => $articles]);
    }

    public function articleCreate()
    {
        $categories = Category::all();
        return view('back.articles.articlecreate', ['categories' => $categories]);
    }

    public function createPost(ArticleRequest $request)
    {
        Article::create([
            'title' => $request->title,
            'content' => $request->article,
            'category_id' => $request->category,
            'slug' => str::slug($request->title),
        ]);
        return redirect()->route('admin.index')->with('success', 'Yazı başarıyla oluşturuldu');
    }

    public function edit($id)
    {
        $articles = Article::find($id);
        $categories = Category::all();
        return view('back.articles.edit', compact('categories','articles'));
    }

    public function update(ArticleRequest $request)
    {
        $articles = Article::find($request->article_id);
        $photo = Article::find($request->article_id);
        $articles->update([
            'title' => $request->title,
            'content' => $request->article,
            'category_id' => $request->category,
            'slug' => str::slug($request->title),
            'image' => $request->image,
         ]);

        return redirect()->route('admin.articles')->with('success', 'Yazı başarıyla güncellendi');
    }

    public function destroy(Request $request)
    {
        $articles = Article::find($request->article_id);
        $articles->delete();

        return redirect()->route('admin.articles')->with('success', 'Yazı silinenler sayfasına gönderildi.');
    }

    public function trashed()
    {
        $articles = Article::onlyTrashed()->get();

        return view('back.articles.trashed', compact('articles'));
    }

    public function hardDelete(Request $request)
    {
        $articles = Article::onlyTrashed()->find($request->article_id);
        $articles -> forceDelete();

        return redirect()->back();
    }

    public function recover($id)
    {
        Article::onlyTrashed()->find($id)->restore();
        return redirect()->back();
    }

    public function categories()
    {
        $categories = Category::all();
        return view('back.categories.categories', ['categories' => $categories]);
    }

    public function categoriescreate()
    {
        $categories = Category::all();
        return view('back.categories.categoriescreate', ['categories' => $categories]);
    }

    public function categoryPost(CategoryRequest $request)
    {
        Category::create([
            'name' => $request->name,
            'slug' => str::slug($request->name),
        ]);
        return redirect()->route('admin.categories');
    }

    public function categoriesEdit($id)
    {
        $categories = Category::all()->first();
        $data = Category::query()->with('articles')->whereId($id)->firstOrFail();

        return view('back.categories.categoriesedit', compact('data', 'categories'));
    }

    public function categorydelete(Request $request)
    {
        $categories = Category::find($request->category_id);
        $categories->delete();

        return redirect()->route('admin.categories');
    }

    public function categoryTrashed()
    {
        $categories = Category::onlyTrashed()->get();

        return view('back.categories.categorytrashed', compact('categories'));
    }

    public function categoryForcedelete(Request $request)
    {
        $categories = Category::onlyTrashed()->find($request->category_id);
        $count=$categories->articleCount();
        Article::where('category_id',$categories->id)->update(['category_id'=>1]);

        $categories->forceDelete();

        return redirect()->route('admin.categorytrashed');
    }

    public function categoryRecover($id)
    {
        Category::onlyTrashed()->find($id)->restore();
        return redirect()->back();
    }
}


