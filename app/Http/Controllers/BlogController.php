<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Cloudinary\Api\Upload\UploadApi;

class BlogController extends Controller
{

    public function index()
    {
        $blog = Blog::all(); // Lấy tất cả bài viết
        return view('blog/list', compact('blog'));
    }

    public function create()
    {
        return view('blog/create');
    }


    public function store(Request $request)
    {
        // Xác thực dữ liệu đầu vào 
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'category' => 'required',
            'image' => 'required',
            'description' => 'required',
            'content' => 'required',
        ]);

        // Tải hình ảnh lên Cloudinary
        $uploadedFileUrl = (new \Cloudinary\Api\Upload\UploadApi())->upload($request->file('image')->getRealPath(), [
            'folder' => 'blog/images/'
        ]);
        // Tạo bài viết mới
        $blog = new \App\Models\Blog;
        $blog->title = $validatedData['title'];
        $blog->category = $validatedData['category'];
        $blog->image = $uploadedFileUrl['url']; // Lưu URL hình ảnh từ Cloudinary
        $blog->description = $validatedData['description'];
        $blog->content = $validatedData['content'];
        $blog->save();
         // "url": "http://res.cloudinary.com/akuroblog/image/upload/v1709957310/user-image/dwcf3pukmbwxnhji112j.png"
        // Cuối cùng, chuyển hướng người dùng với một thông báo
        return redirect()->route('blog.list')->with('success', 'Bài viết đã được tạo thành công!');
    }


    public function edit(Blog $blog)
    {
        return view('blog.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'content' => 'required',
        ]);
        $blog->update($request->all());
        return redirect()->route('blog.list')->with('success', 'Bài viết đã được cập nhật thành công!');
    }

    public function show(Blog $blog)
    {
        return view('blog.read', compact('blog'));
    }
}

