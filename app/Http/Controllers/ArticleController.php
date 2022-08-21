<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\MediaController;


class ArticleController extends Controller
{
    public function latest()
    {
        $articles = Article::orderBy('created_at','desc')->take(20)->get();
        return view('articles.latest',compact("articles"));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $articles = Article::orderBy('created_at','desc')->paginate(20);
        return view('articles.index',compact("articles"),compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('articles.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'category' => 'required|exists:categories,name',
            'sellprice' => 'min:0|required|numeric',
            'buyprice' => 'min:0|required|numeric',
            'media' => 'required|min:1|max:4',
            'description' => 'max:255'
        ]);
        //needed variables
        $lastId = Article::all()->last()->id ?? 0;   
        $categoryId = Category::where('name',$request->category)->get()->toArray()[0]['id'];
        $code = substr($request->category, 0, 2) . substr($request->sellprice, 0, 3) . (int)$lastId + 1;
        //instacing article
        $article = Article::create([
            'code' => $code,
            'description' => $request->description,
            'buyprice' => $request->buyprice,
            'sellprice' => $request->sellprice
        ]);
        $article->save();
        // attach article to categorie
        $article->categories()->attach($categoryId);
        //save and attach media to article
        $controller = new MediaController();
        $infos = $controller->save($request->media,$code,$request->color);
        // dd($infos);
        foreach ($infos as $info){
            $media = new Media();
            $media->imgpath = $info[0];
            $media->extension = $info[1];
            $article->medias()->save($media);
        }
        //finaly save the article
        return redirect()->back(); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $Article)
    {        
        return view('articles.show',compact('Article'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        dd("t'est dans edite");
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $Article)
    {
        $mediaspath = [];
        foreach ($Article->medias as $media){
            $mediaspath[] = $media->imgpath;
        }
        (new MediaController())->destroy($mediaspath);
        $Article->delete();
        return redirect()->back();
    }

    function search(Request $request){
        // dd($request->input('query'));
        if($request->input('query')){
            // %'.$request->input('query').'%' = '%'.$request->input('query').'%';
            return view('articles.search',['articles' => Article::where('code','like','%'.$request->input('query').'%')
            ->orWhere('sellprice','like','%'.$request->input('query').'%')
            ->orWhere('buyprice','like','%'.$request->input('query').'%')
            ->orWhere('description','like','%'.$request->input('query').'%')->paginate(20)
            ]);
        }else{
            return view('articles.search');
        }
    }
}
