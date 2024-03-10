<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách bài viết</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <header>
        @include('components.navbar')
        @if (Auth::check())
            <!-- Kiểm tra xem người dùng đã đăng nhập chưa -->
            @if (Auth::user()->role == 0)
            @else
                <a href='\create-blog'
                    class="w-14 h-14 fixed bottom-5 right-5 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full justify-center items-center flex">
                    <i class="fas fa-pen"></i>
                </a>
            @endif
        @endif
    </header>
    <main class="font-baloo">
        <div class="container mx-auto px-4 mt-7 mb-10">
            <div class="flex justify-between items-center"">
                <div class="title-text mt-20 mb-20 border-b border-gray-500 w-1/3 font-semibold text-4xl pb-5 flex ">
                    Danh sách bài viết</div>
                <div class="flex">
                    <div class="flex border-b border-gray-500">
                        <input
                            class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                            type="text" placeholder="Tìm kiếm..." aria-label="Tìm kiếm">
                        <button
                            class="flex-shrink-0 bg-gray-700 hover:bg-gray-800 border-gray-700 hover:border-gray-700 text-sm border-4 text-white py-1 px-2 rounded"
                            type="button">
                            Tìm kiếm
                        </button>
                    </div>
                </div>

            </div>
            <div class="grid md:grid-cols-4 gap-4">

                @foreach ($blog as $blog)
                    <div class="max-w-sm rounded overflow-hidden shadow-lg">
                        <a href="{{ route('blog.read', $blog) }}">
                            <img class="w-full" src="{{ $blog->image }}" alt="Article image"
                                style="height: 13rem; object-fit: cover;">
                            <div class="px-6 py-4">
                                <div class="font-bold text-2xl mb-2">{{ $blog->title }}</div>
                                <div class="h-16">
                                    <p
                                        class="text-gray-700 text-base line-clamp-2 break-words overflow-hidden overflow-ellipsis">
                                        {{ $blog->description }}
                                    </p>
                                </div>
                                <p class="text-gray-600 text-xs text-right"> Updated at: {{ $blog->updated_at }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </main>
    <footer>
        @include('components.footer')
    </footer>
</body>

</html>
