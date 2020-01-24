<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Article;
use App\Category;
use App\Tag;
use App\User;
use Alert;
use DB;
use yajra\Datatables\Datatables;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');
        return view('admin.dashboard');
    }

    public function artikel()
    {   
        $users = User::get();
        $articles = Article::latest()->get();
        $tags = Tag::all();

        
        return view('admin.postingan.artikel',compact('articles', 'users', 'tags'));
    }

    public function serverside()
    {
        $articles = Article::with('user','tag');


        return \DataTables::eloquent($articles)
        ->addIndexColumn()
        ->addColumn('title', function ($articles){
            return "<a href='#'>$articles->title</a>";
        })
        ->addColumn('article', function ($articles){
            return $articles->article;
        })
        ->addColumn('created_at', function ($articles){
            return $articles->created_at->diffForHumans();
        })
        ->addColumn('updated_at', function ($articles){
            return $articles->updated_at->format('Y-m-d');
        })
        ->addColumn('user.name', function ($articles){
            return ucwords($articles->user['name']);
        })
        ->addColumn('status', function ($articles){
            if ($articles->status == 'publish') {
                return "<span class='text-success'>$articles->status</span>";
            }
            elseif ($articles->status == 'draft') {
                return "<span class='text-danger'>$articles->status</span>";
            }
        })
        ->rawColumns(['no','title','article','created_at','updated_at','user_id', 'status'])
        ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.postingan.tambah', compact('categories', 'tags'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validate = $this->validate($request, [
        //     'title' => 'required|max:255',
        //     'article' => 'required',
        //     'status' => 'required',
        //     'category_id' => 'required',

        // ]);
        
        $article = Article::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'article' => $request->article,
            'status' => $request->status,
            'category_id' => $request->category,
            'user_id' => auth()->id(),

        ]);

        $article->tag()->attach($request->tag);

        

        return redirect()->route('artikel');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        Alert::success('Berhasil hore','Sip');
        return redirect()->back();
    }
}
