@if (Auth::check()) <!-- Kiểm tra xem người dùng đã đăng nhập chưa -->
    @if (Auth::user()->role == 0)
        return redirect('/');
    @else
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Danh sách bài viết</title>
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
            <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

        </head>

        <body>
            <header>
                @include('components.navbar')
            </header>
            <main>
                <body class="bg-gray-100 font-sans leading-normal tracking-normal">
                    <div class="container mx-auto p-8">
                        <div class="flex flex-wrap -mx-2">
                            <div class="w-full px-2">
                                <div class="bg-white p-5 rounded shadow-lg">
                                    <h2 class="text-3xl font-semibold mb-4">Tạo bài viết mới</h2>
                                    <form action="{{ route('blog.store') }}" method="POST"
                                        enctype="multipart/form-data" onsubmit="submitForm()">
                                        @csrf
                                        <input type="hidden" id="content" name="content">
                                        <div class="mb-4">
                                            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                                                Tiêu đề
                                            </label>
                                            <input
                                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                id="title" name="title" type="text" placeholder="Post Title">
                                        </div>
                                        <div class="mb-4">
                                            <label class="block text-gray-700 text-sm font-bold mb-2" for="category">
                                                Thể loại
                                            </label>
                                            <select
                                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                id="category" name="category">
                                                <option>Blog</option>
                                                <option>Product</option>
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                                                Ảnh bìa
                                            </label>
                                            <input type="file" id="image" name="image"
                                                accept="image/png, image/jpeg, image/gif"
                                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                        </div>
                                        <div class="mb-4">
                                            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                                                Mô tả
                                            </label>
                                            <textarea
                                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                id="description" name="description" placeholder="Brief description"></textarea>
                                        </div>
                                        <div class="mb-4">
                                            <label class="block text-gray-700 text-sm font-bold mb-2" for="content">
                                                Nội dung
                                            </label>
                                            <div id="editor"
                                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline h-96">
                                            </div>
                                        </div>

                                        <div class="flex items-center justify-between">
                                            <button
                                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                            type="reset">
                                            Clear
                                            </button>
                                            <button type="submit"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                                Đăng bài
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </body>
            </main>
            <footer>
                @include('components.footer')
            </footer>
            <script>
                var quill = new Quill('#editor', {
                    theme: 'snow',
                    modules: {
                        toolbar: [
                            ['bold', 'italic', 'underline', 'strike'], // toggled buttons
                            ['blockquote', 'code-block'],
                            [{
                                'header': 1
                            }, {
                                'header': 2
                            }], // custom button values
                            [{
                                'list': 'ordered'
                            }, {
                                'list': 'bullet'
                            }],
                            [{
                                'script': 'sub'
                            }, {
                                'script': 'super'
                            }], // superscript/subscript
                            [{
                                'indent': '-1'
                            }, {
                                'indent': '+1'
                            }], // outdent/indent
                            [{
                                'direction': 'rtl'
                            }], // text direction
                            [{
                                'size': ['small', false, 'large', 'huge']
                            }], // custom dropdown
                            [{
                                'header': [1, 2, 3, 4, 5, 6, false]
                            }],
                            [{
                                'color': []
                            }, {
                                'background': []
                            }], // dropdown with defaults from theme
                            [{
                                'font': []
                            }],
                            [{
                                'align': []
                            }],
                            ['link', 'image', 'video'], // add 'image' here
                            ['clean'] // remove formatting button
                        ]
                    }
                });

                function submitForm() {
                    // Populate hidden form on submit
                    var content = document.querySelector('input[name=content]');
                    content.value = quill.root.innerHTML;
                }

                function selectLocalImage() {
                    const input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.click();

                    input.onchange = () => {
                        const file = input.files[0];

                        // Step 2: Upload the file to your server
                        const formData = new FormData();
                        formData.append('image', file);

                        // Example: Post the image to a server
                        fetch('/your-upload-endpoint', {
                                method: 'POST',
                                body: formData
                            })
                            .then(response => response.json())
                            .then(result => {
                                if (result.success && result.url) {
                                    // Step 3: Insert the image URL into the editor
                                    const range = quill.getSelection();
                                    quill.insertEmbed(range.index, 'image', result.url);
                                } else {
                                    console.error('Upload failed');
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });
                    };
                }

                // Register the image button to call selectLocalImage() on click
                quill.getModule('toolbar').addHandler('image', () => {
                    selectLocalImage();
                });
            </script>

        </body>

        </html>
    @endif
@endif
