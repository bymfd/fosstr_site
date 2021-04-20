<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Article;
use App\Models\Page;
use App\Models\Category;
use Illuminate\Http\Request;


class SitemapController extends Controller
{

    public function index(Request $r)
    {

        $posts = Article::orderBy('id','desc')->where('status', 1)->get();
        $pages = Page::orderBy('id','desc')->where('status', 1)->get();
        $category = Category::where('status', 1)->get();

        return response()->view('sitemap', compact('category','pages','posts'))
            ->header('Content-Type', 'text/xml');

    }
}
