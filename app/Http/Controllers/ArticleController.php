<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ArticleController extends Controller
{
    /**
     * 設定哪項功能不需登錄即可查看
     */
    public function __construct(){
        // 本句語法錯誤 可能是版本問題?
        // $this->middleware('auth')->except(methods:['index', 'show']);
        $this->middleware('auth')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        
        $articles = Article::with('user')->orderBy('start_time', 'desc')->paginate(10);
        return view('articles.index', ['articles' => $articles]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('articles.create');
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        $content = $request->validate([
            'title' => 'required',
            'content' => 'required|min:50',
            'summary' => 'required|min:10',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);

        auth() -> user() -> articles() -> create($content);
        return redirect() -> route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $article = auth() -> user() -> articles -> find($article);
        return view('articles.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article = auth() -> user() -> articles -> find($article); 
        $content = $request->validate([
            'title' => 'required',
            'content' => 'required|min:50',
			'summary' => 'required|min:10',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);
        $article -> update($content);
        return redirect() -> route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
