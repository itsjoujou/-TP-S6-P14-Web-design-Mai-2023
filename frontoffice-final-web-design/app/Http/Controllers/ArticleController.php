<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index() {
        return view('articles_index',[
            'articles' => Article::with('article_category', 'user')->get()
        ]);
    }

    public function show($slug) {
        $id = explode("-", $slug)[0];

        return view('articles_show', [
            'article' => Article::with('article_category', 'user')->find($id),
            'categories' => ArticleCategory::all()
        ]);
    }

    public function search(Request $request) {
        $keyword = $request->keyword;

        $query = Article::with('article_category', 'user'); 

        if (!empty(trim($keyword))) {
            $query->whereRaw('UPPER(title) LIKE ?', ['%'. strtoupper($keyword) .'%'])
                    ->orWhereRaw('UPPER(summary) LIKE ?', ['%'. strtoupper($keyword) .'%'])
                    ->orWhereRaw('UPPER(content) LIKE ?', ['%'. strtoupper($keyword) .'%'])
                    ->orWhereHas('user', function ($q) use ($keyword) {
                        $q->whereRaw('UPPER(first_name) LIKE ?', ['%'. strtoupper($keyword) .'%'])
                            ->orWhereRaw('UPPER(last_name) LIKE ?', ['%'. strtoupper($keyword) .'%']);
                    })
                    ->orWhereHas('article_category', function ($q) use ($keyword) {
                        $q->whereRaw('UPPER(category_label) LIKE ?', ['%'. strtoupper($keyword) .'%']);
                    });
        }

        return view('articles_index',[
            'articles' => $query->get(),
        ]);
    }
}
