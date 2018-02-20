<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\Tag;
use Carbon\Carbon;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        Carbon::setLocale('es');
    }

    public function index()
    {
        //
        $articles = Article::orderBy('id','DESC')->paginate(2);


        return view('welcome')->with('articles',$articles);
    }

    public function searchCategory($name)
    {
        $category = Category::SearchCategory($name)->first();

        $articles = $category->articles()->orderBy('id','DESC')->paginate(2);


        return view('welcome')->with('articles',$articles);
    }

    public function searchTag($name)
    {
        $tag = Tag::SearchTag($name)->first();

        $articles = $tag->articles()->orderBy('id','DESC')->paginate(2);


        return view('welcome')->with('articles',$articles);
    }
    
    public function viewArticle($slug)
    {
        $article = Article::findBySlugOrFail($slug);
        return view('article')->with('article',$article);
    }
    
}
