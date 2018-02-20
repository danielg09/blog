<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use App\Article;
use Illuminate\Support\Facades\Auth;
use App\Image; 
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ArticleRequest;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        // 
         $articles = Article::search($request->title)->orderBy('id','ASC')->paginate(5);
         return view('admin.articles.index')->with('articles',$articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::orderBy('name','ASC')->get();
        $tags = Tag::orderBy('name','ASC')->get();
        return view('admin.articles.create')->with('categories',$categories)->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {   
    
        /*Codigo facilito*/
        //Manipulacion de imagenes
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            //creale un nombre unico imagen
            $name = 'blogDaniel'. time() . '.' . $file->getClientOriginalExtension();
            //ruta donde queremos guardar la imagen
            //public_path() ruta donde esta nuestro proyecto
            $path = public_path() . '\images\articles';
            $file->move($path,$name);
        }

        

        //Aprendible

        //dd($request->file('image')->storeAs('public','article_'.$request->title.'_'.time().'.'.$request->file('image')->extension()));
        //otros
        //dd(Storage::disk('articles')->put('article_'.$request->title.'_'.time().'.'.$request->file('image')->extension() , $request->file('image')));

        $article = new Article();

        $article->title = $request->title;
        $article->content = $request->content;
        $article->category_id = $request->category;
        $article->user_id = Auth::id();
        $article->save();

        $article->tags()->attach($request->tags);

        $image = new Image();
        $image->article()->associate($article);
        $image->name ='/images/articles/'.$name; 
        $image->save();

        flash()->overlay('Articulo '. $article->title.' registrado', 'Articulo ha sido registrado');
 
        return redirect()->route('admin.articles.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categories = Category::orderBy('name','ASC')->get();
        $tags = Tag::orderBy('name','ASC')->get();
        $article = Article::find($id);
        return view('admin.articles.edit')->with('article',$article)->with('categories',$categories)->with('tags',$tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $article = Article::find($id);

        $article->title = $request->title;
        $article->content = $request->content;
        $article->category_id = $request->category;
        $article->user_id = Auth::id();
        $article->save();

        $article->tags()->sync($request->tags);

        flash()->overlay('Articulo '. $article->title.' actualizado', 'Articulo ha sido actualizado');
 
        return redirect()->route('admin.articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $article = Article::find($id);
        $article->delete();

        flash()->overlay('Articulo '. $article->title.' borrado', 'Articulo ha sido borrado');
 
        return redirect()->route('admin.articles.index');
    }
}
