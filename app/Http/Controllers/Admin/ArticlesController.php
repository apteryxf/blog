<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use Session;

class ArticlesController extends Controller
{
    public $validateRules = [
        'title' => 'required',
        'body' => 'max:500'
    ];

    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->paginate(5);
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->validateRules);
        Article::create($request->all());
        Session::flash('flash_message', '記事を作成しました。');
        return redirect('admin/articles');
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.articles.show', compact('article'));
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->validateRules);
        $article = Article::findOrFail($id);
        $article->update($request->all());

        Session::flash('flash_message', '記事を更新しました。');
        return back();
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete($id);
        Session::flash('flash_message', '記事を削除しました。');
        return back();
    }
}
