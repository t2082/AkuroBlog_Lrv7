<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>

    <style>
        .fade {
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        .intro-text {
            font-family: "Baloo 2";
            font-optical-sizing: auto;
            color: rgba(255, 255, 255, 0.6);
            font-size: 1.2rem;
        }
    </style>

</head>

<body class="font-baloo">
    <header class="bg-gray-800">
        @include('components.navbar')
        <div class="container mx-auto flex pt-6 pb-24">
            <!-- Section left -->
            <div class="w-full md:w-1/2 flex flex-col items-center justify-center px-6">
                <h2 style='font-weight: 600; color: white; font-size: 43px'>
                    Chào mừng đến với trang của Akuro |</h2>
                <p class="intro-text mt-10 border-l border-gray-500 pl-10">" Xin chào và cảm ơn bạn đã ghé thăm!<br>
                    Trang web được tạo ra với mục đích chia sẻ về cuộc sống và sở thích cá nhân của tôi.<br>
                    Trong blog này, bạn sẽ tìm thấy những bài viết đa dạng từ chủ đề cá nhân, kinh nghiệm sống, đến các
                    bài phân tích sâu sắc về các vấn đề xã hội. <br>
                    Tôi tin rằng mỗi câu chuyện, mỗi trải nghiệm đều có giá trị riêng và mong muốn gửi chúng với bạn qua
                    từng dòng chữ.<br>
                    Nếu bạn có bất kỳ câu hỏi, ý kiến hoặc muốn chia sẻ với tôi, đừng ngại nhắn cho tôi thông qua những
                    liên kết bên trên<br>
                    Cảm ơn bạn đã ghé thăm trang. Tôi hy vọng bạn sẽ thấy nó thú vị! "</p>
                <p id="_author_" class="intro-text mt-10 pl-96 text-2xl">- Akuro -</p>
            </div>

            <!-- Section right -->
            <div class="w-full md:w-1/2 px-6">
                <div class="flex flex-wrap">
                    <div class="w-full">
                        <div class="relative">
                            <!-- Slideshow container -->
                            <div class="overflow-hidden rounded-lg relative w-full h-auto">
                                <!-- Slides -->
                                <div class="mySlides fade">
                                    <img src="{{ asset('/images/slide_1.jpg') }}" style="width:100%"
                                        class="w-[300px] h-[500px] object-cover">
                                </div>
                                <div class="mySlides fade">
                                    <img src="{{ asset('/images/slide_3.jpg') }}" style="width:100%"
                                        class="w-[300px] h-[500px] object-cover">
                                </div>
                                <div class="mySlides fade">
                                    <img src="{{ asset('/images/slide_4.jpg') }}" style="width:100%"
                                        class="w-[300px] h-[500px] object-cover">
                                </div>
                                <div class="mySlides fade">
                                    <img src="{{ asset('/images/slide_5.jpg') }}" style="width:100%"
                                        class="w-[300px] h-[500px] object-cover">
                                </div>
                                <a class="absolute top-1/2 left-0 bg-gray-200 text-black hover:text-white hover:bg-gray-800 p-3 cursor-pointer"
                                    onclick="currentSlides()">&#10094;</a>
                                <a class="absolute top-1/2 right-0 bg-gray-200 text-black hover:text-white hover:bg-gray-800 p-3 cursor-pointer"
                                    onclick="plusSlides()">&#10095;</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </header>
    <main class="bg-white">

        <h2 class="title-text text-center pt-5 pb-3">Các bài viết mới nhất</h2>
        <hr class="mx-96">
        <div class="container mx-auto px-4 mt-7 mb-10">
            <div class="grid md:grid-cols-3 gap-4">

                @foreach ($blog as $blog)
                    <div class=" rounded overflow-hidden shadow-xl border m-3 border-gray-200">
                        <a href="{{ route('blog.read', $blog) }}">
                            <img class="w-full" src="{{ $blog->image }}" alt="Article image"
                                style="height: 13rem; object-fit: cover;">
                            <div class="px-6 py-4">
                                <div class="font-semibold text-2xl mb-2">{{ $blog->title }}</div>
                                <div class="h-16">
                                    <p
                                        class="text-gray-700 text-base line-clamp-2 break-words overflow-hidden overflow-ellipsis">
                                        {{ $blog->description }}
                                    </p>
                                </div>
                                <p class="text-gray-600 text-xs text-right">Updated at: {{ $blog->updated_at }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <hr class="mx-48">

        {{-- PRODUCT --}}
        <h2 class="title-text text-center mt-5 mb-3">Các sản phẩm của Tân</h2>
        <hr class="mx-96">
        <div class="container mx-auto px-4 mt-7 pb-20">
            <div class="grid md:grid-cols-3 gap-4">
                <!-- Hiển thị các bài viết -->
                @foreach ($products as $product)
                    <div class=" rounded overflow-hidden shadow-xl border m-3 border-gray-200">
                        <a href="{{ route('blog.read', $blog) }}">
                            <img class="w-full" src="{{ $blog->image }}" alt="Article image"
                                style="height: 13rem; object-fit: cover;">
                            <div class="px-6 py-4">
                                <div class="font-semibold text-2xl mb-2">{{ $blog->title }}</div>
                                <div class="h-16">
                                    <p
                                        class="text-gray-700 text-base line-clamp-2 break-words overflow-hidden overflow-ellipsis">
                                        {{ $blog->description }}
                                    </p>
                                </div>
                                <p class="text-gray-600 text-xs text-right">Updated at: {{ $blog->updated_at }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    </main>

    @include('components.footer')

    <script>
        var slideIndex = 1;
        var slideTimer; // Biến để theo dõi bộ đếm thời gian

        showSlides(slideIndex);

        function plusSlides() {
            clearTimeout(slideTimer); // Reset bộ đếm thời gian khi thay đổi slide
            showSlides(slideIndex, false);
        }

        function currentSlides() {
            clearTimeout(slideTimer); // Reset bộ đếm thời gian khi thay đổi slide
            showSlides(slideIndex, true);
        }

        function showSlides(n, reverse) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            if (reverse) {
                slideIndex--;
            } else {
                slideIndex++;
            }
            if (slideIndex > slides.length) {
                slideIndex = 1
            } else if (slideIndex < 1) {
                slideIndex = slides.length
            }
            slides[slideIndex - 1].style.display = "block";

            slideTimer = setTimeout(showSlides, 5000); // Set lại bộ đếm thời gian cho slide tiếp theo
            console.log(slideIndex);
        }
    </script>
</body>

</html>
