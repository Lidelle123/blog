<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <header>
        @include('layouts.menu')
    </header>

    <div class="bg-teal-500 from-fuchsia-300 to-sky-500">
        <section id="login" class="p-4 flex flex-col justify-center min-h-screen max-w-md mx-auto">
            <div class="p-6 bg-sky-100 rounded">
                <div class="flex items-center justify-center font-black m-3 mb-12">
                    <h1 class="tracking-wide text-3xl text-gray-900">Publish Here</h1>
                </div>
                <form id="publish" action="{{ route('store') }}" method="POST" class="flex flex-col justify-center"
                    enctype="multipart/form-data">
                    @csrf

                    <label class="text-sm font-medium">Title</label>
                    <input
                        class="mb-3 px-2 py-1.5
                        mb-3 mt-1 block w-full px-2 py-1.5 border border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400
                        focus:outline-none
                        focus:border-sky-500
                        focus:ring-1
                        focus:ring-sky-500
                        focus:invalid:border-red-500 focus:invalid:ring-red-500"
                        type="text" name="title" placeholder="enter a title" required>
                    <label class="text-sm font-medium">Description</label>
                    <textarea
                        class="mb-3 mt-1 block w-full px-2 py-1.5 border border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400 focus:outline-none focus:border-sky-500 focus:ring-1
                        focus:ring-sky-500
                        focus:invalid:border-red-500 focus:invalid:ring-red-500"
                        name="description" placeholder="Write a description" required></textarea>

                    <label class="text-sm font-medium">Category</label>
                    <select
                        class="mb-3 mt-1 block w-full px-2 py-1.5 border border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:invalid:border-red-500 focus:invalid:ring-red-500"
                        name="category_id">
                        @foreach ($allCategories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    <label class="text-sm font-medium">Image</label>
                    <input
                        class="mb-3 px-2 py-1.5
                            mb-3 mt-1 block w-full px-2 py-1.5 border border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400
                            focus:outline-none
                            focus:border-sky-500
                            focus:ring-1
                            focus:ring-sky-500
                            focus:invalid:border-red-500 focus:invalid:ring-red-500"
                        type="file" name="image" accept="image/jpeg, image/png, image/jpg, image/gif"
                        placeholder="choose a image" required>
                    <button
                        class="px-4 py-1.5 rounded-md shadow-lg bg-gradient-to-r from-pink-600 to-red-600 font-medium text-gray-100 block transition duration-300"
                        type="submit">save </button>
                    <!-- Affichage des erreurs dans un toast -->
                    <!-- Affichage des erreurs dans un toast en bas -->
                    @if ($errors->any())
                        <div class="mt-4 bg-red-500 text-white p-2 rounded">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </form>
            </div>
        </section>
    </div>
</body>

</html>
