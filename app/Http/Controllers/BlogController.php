<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Api\Admin\AdminApi;
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

        // Tạo bài viết mới
        $blog = new Blog;
        $blog->title = $validatedData['title'];
        $blog->category = $validatedData['category'];
        $blog->description = $validatedData['description'];
        $blog->content = $validatedData['content'];

        // Lưu bài đăng
        $blog->save();

        // Upload hình ảnh lên Cloudinary và lưu URL
        $uploadedFileUrl = (new UploadApi())->upload($request->file('image')->getRealPath(), [
            'folder' => 'blog/id_'.$blog->id
        ]);

        // Cập nhật URL hình ảnh vào bài đăng
        $blog->image = $uploadedFileUrl['url'];
        $blog->save();
        // Tải hình ảnh lên Cloudinary

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


    
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $folderBlog = 'blog/id_'.$id;
        
        $url = $blog->image;
        $extension_pos = strrpos($url, '.');
        $last_slash_pos = strrpos($url, '/', $extension_pos - strlen($url) - 1);

        $id_image = substr($url, $last_slash_pos + 1, $extension_pos - $last_slash_pos - 1);

        (new UploadApi())->destroy($folderBlog . '/' . $id_image);
        (new AdminApi())->deleteFolder($folderBlog);
        $blog->delete();
        return redirect()->route('blog.list')->with('success', 'Blog và tất cả các hình ảnh liên quan đã được xóa thành công.');
    }

    public function show(Blog $blog)
    {
        return view('blog.read', compact('blog'));
    }
}

