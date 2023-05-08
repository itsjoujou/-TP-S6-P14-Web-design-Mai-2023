<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ArticleController extends Controller
{
    public function index() {
        $articles = Cache::remember('articles', 120, function () {
            return Article::with('article_category', 'user')->get();
        });

        $response = response()->view('articles_index', ['articles' => $articles]);
        $response->header('Cache-Control', 'max-age=3600, public');

        return $response;
    }

    public function show($slug) {
        $id = explode("-", $slug)[0];

        $article = Cache::remember('article-'.$id, 120, function () use ($id) {
            return Article::with('article_category', 'user')->find($id);
        });

        $categories = Cache::remember('categories', 120, function () {
            return ArticleCategory::all();
        });

        $response = response()->view('articles_show', [
            'article' => $article,
            'categories' => $categories
        ]);
        $response->header('Cache-Control', 'max-age=3600, public');
        
        return $response;
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
