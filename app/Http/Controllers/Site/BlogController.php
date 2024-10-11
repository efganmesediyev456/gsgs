<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Entities\AboutPage;
use App\Models\Entities\Blog;
use App\Models\Entities\Menu;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $seo         = Menu::status()->whereSlug('blogs')->latest()->first();
        $items       = Blog::status()->orderBy("order")->paginate(6);

        return view('site.pages.blog.index', compact('items', 'seo') );
    }

    public function blog($lang,$blog)
    {
        $blog          = Blog::whereStatus(1)->whereSlug($blog)->firstOrFail();
        $seo           = $blog;
        $blog->view = $blog->view + 1;
        $blog->save();
        $previous      = Blog::whereStatus(1)
                                ->where('created_at', '<', $blog->created_at)
                                ->orderBy('created_at', 'desc')
                                ->first();
        $next          = Blog::whereStatus(1)
                                ->where('created_at', '>', $blog->created_at)
                                ->orderBy('created_at', 'asc')
                                ->first();
        $relatedBlogs = Blog::whereStatus(1)
                                ->where('id', '!=', $blog->id)
                                ->inRandomOrder()
                                ->limit(10)
                                ->get();
        $popularposts = Blog::whereStatus(1)
                                ->where('id', '!=', $blog->id)
                                ->inRandomOrder()
                                ->limit(6)
                                ->get();
        $latestBlogs = Blog::whereStatus(1)
                                ->orderBy('created_at', 'desc')
                                ->limit(10)
                                ->get();
        $array       = [];
        foreach($latestBlogs as $latest){
            $array[] = $latest->tags;
        }
        $array       = array_filter($array);
        $tagsString  = implode(',', $array);




        return view('site.pages.blog.single', compact('blog', 'previous','next', 'relatedBlogs', 'popularposts','tagsString', 'seo'));
    }
}
