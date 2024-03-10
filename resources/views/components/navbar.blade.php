<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Micro+5&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400..800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('/css/app.css') }}">


<nav class="bg-black text-white p-3">
    <div class="container mx-auto flex justify-between items-center">
        <div class="flex items-center">
            
            <a href="https://t2082.github.io/info/" class="text-white mr-4 hover:text-gray-200" target="_blank">Giới thiệu</a>
            <a href="#" class="text-white mr-4 hover:text-gray-200">Liên hệ</a>
            <a href="#" class="text-white hover:text-gray-200">Ăn xin online</a>
        </div>

        <div class="flex items-center">
            <a href="https://facebook.com/t2082" class="text-white mr-4 hover:text-gray-200" target="_blank">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://www.instagram.com/akuro_t2082/" class="text-white mr-4 hover:text-gray-200" target="_blank">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https://github.com/t2082" class="text-white mr-4 hover:text-gray-200" target="_blank">
                <i class="fab fa-github"></i>
            </a>
            <a href="https://www.linkedin.com/in/t2082/" class="text-white hover:text-gray-200" target="_blank">
                <i class="fab fa-linkedin-in"></i>
            </a>
        </div>
    </div>
</nav>

<nav class="bg-gray-800 text-white w-full z-50" id="navbar">
    <div class="container mx-auto flex justify-between items-center">
        <a href='/' class="flex items-center">
            <img src="{{ asset('/images/akuro_user.png') }}" alt="Logo" class="h-12 w-12 mr-2 rounded-sm"> 
            <div style='font-family: "Micro 5", sans-serif; font-size: 400%'>AKURO</div>
        </a>

        <div class="flex items-center">
            <a href="/" class="linknav mr-4 font-baloo text-xl {{ Request::is('/') ? 'text-red-500 hover:text-red-600' : 'text-white  hover:text-gray-200'}}">| Trang chủ </a>
            <a href="/all-blog/" class="linknav mr-4 font-baloo text-xl {{ Request::is('all-blog') ? 'text-red-500 hover:text-red-600' : 'text-white  hover:text-gray-200'}}">| Tất cả blog </a>
            <a href="#" class="linknav mr-4 font-baloo text-xl {{ Request::is('/#') ? 'text-red-500 hover:text-red-600' : 'text-white  hover:text-gray-200'}}">| Nhạc của Tân </a>
            @if(Auth::check()) <!-- Kiểm tra xem người dùng đã đăng nhập chưa -->
                <p class="">|</p>
                @if(Auth::user()->role == 0)
                    <button onclick="toggleDropdown()" class="focus:outline-none linknav mx-4 font-baloo text-xl">
                        Xin chào <u>{{ Auth::user()->name }}</u>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownMenu" class="hidden absolute left-1/2 mt-2 w-28 bg-gray-900 rounded-md shadow-lg py-1 z-50">
                        <form method="POST" action="{{ route('logout') }}" class="block py-1 ">
                            @csrf
                            <button type="submit" class="w-full text-white font-baloo text-base hover:underline">Log Out</button>
                        </form>
                    </div>
                @else
                    <div id="name-admin" class="relative mx-4 font-micro text-3xl text-yellow-200">
                        <button onclick="toggleDropdown()" class="focus:outline-none">
                            <u >Administrator</u>
                        </button>
                        <div id="dropdownMenu" class="hidden absolute left-1/2 mt-2 w-28 bg-gray-900 rounded-md shadow-lg py-1 z-50">
                            <form method="POST" action="{{ route('logout') }}" class="block py-1 ">
                                @csrf
                                <button type="submit" class="w-full text-white font-baloo text-base hover:underline">Log Out</button>
                            </form>
                        </div>
                    </div>
                @endif
            @endif
        </div>
    </div>
</nav>

<script>
    window.addEventListener('scroll', function() {
        var navbar = document.getElementById('navbar');
        if (window.scrollY > 100) {
            navbar.classList.add('shadow-md', 'fixed', 'top-0');
        } else {
            navbar.classList.remove('shadow-md', 'fixed');
        }
    });
    function toggleDropdown() {
        var dropdownMenu = document.getElementById("dropdownMenu");
        if (dropdownMenu.classList.contains('hidden')) {
            dropdownMenu.classList.remove('hidden');
        } else {
            dropdownMenu.classList.add('hidden');
        }
    }

</script>

