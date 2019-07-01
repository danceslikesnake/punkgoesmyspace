<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Blog;
use App\BannerAd;

class BlogsController extends Controller
{
    public function index()
    {
        $profile = Profile::find(1);
        $blogs = Blog::all();

        $get_banner_ad = BannerAd::where('is_active', '1')->get();
        if(count($get_banner_ad) ==  0) {
            $banner_ad = null;
        } else {
            $banner_ad = $get_banner_ad[0];
        }

        return view('pages.blogs.index')
            ->with('blogs', $blogs)
            ->with('profile', $profile)
            ->with('banner_ad', $banner_ad);
    }

    public function show($id)
    {
        $profile = Profile::find(1);
        $blog = Blog::find($id);

        $get_banner_ad = BannerAd::where('is_active', '1')->get();
        if(count($get_banner_ad) ==  0) {
            $banner_ad = null;
        } else {
            $banner_ad = $get_banner_ad[0];
        }

        return view('pages.blogs.show')
            ->with('blog', $blog)
            ->with('profile', $profile)
            ->with('banner_ad', $banner_ad);
    }

    public function cms_index()
    {
        $blogs = Blog::all();

        return view('auth.blogs.index')->with('blogs', $blogs);
    }

    public function create()
    {
        return view('auth.blogs.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'blog_title' => 'required',
            'blog_body' => 'required',
        ]);

        $blog = new Blog;
        $blog->blog_title = $request->input('blog_title');
        $blog->blog_body = $request->input('blog_body');

        $blog->save();

        return redirect('admin/blogs')->with('success', 'Your blog post has been created');
    }

    public function edit($id)
    {
        $blog = Blog::find($id);

        return view('auth.blogs.edit')->with('blog', $blog);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'blog_title' => 'required',
            'blog_body' => 'required',
        ]);

        $blog = Blog::find($id);
        $blog->blog_title = $request->input('blog_title');
        $blog->blog_body = $request->input('blog_body');

        $blog->save();

        return redirect('admin/blogs/edit/'.$id)->with('success', 'Your blog post has been edited');
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();

        return redirect('admin/blogs')->with('success', 'Blog post deleted');
    }
}
