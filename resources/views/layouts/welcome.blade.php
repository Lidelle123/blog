<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    @vite('resources/css/app.css')

</head>

<body>
    <div>
        <header>
            @include('layouts.menu')
        </header>

        <!-- Topic Nav -->
        <nav class="w-full py-4 border-t border-b bg-gray-100" x-data="{ open: false }">
            <div class="block sm:hidden">
                <a href="#"
                    class=" md:hidden text-base font-bold uppercase text-center flex justify-center items-center"
                    @click="open = !open">
                    Topics <i :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas ml-2"></i>
                </a>
            </div>
            <div :class="open ? 'block' : 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
                <div
                    class="w-full container mx-auto flex flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
                    @foreach ($allCategories as $category)
                        <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">{{ $category->name }}</a>
                    @endforeach
                </div>
            </div>
        </nav>
    </div>


    <div class="grid-cols-1 sm:grid md:grid-cols-2">
        @forelse ($annonces as $annonce)
            @if (Auth::check() && $annonce->user_id === Auth::user()->id)
                <div
                    class="mx-3 mt-6 flex flex-col self-start rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 sm:shrink-0 sm:grow sm:basis-0">
                    <a href="#">
                        <img class="rounded-t-lg w-full h-[500px]" src="{{ asset('storage/' . $annonce->image) }}"
                            alt="Hollywood Sign on The Hill" />
                    </a>
                    <div class="p-6">
                        <a href="#"
                            class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $annonce->category->name }}</a>
                        <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
                            {{ $annonce->title }}
                        </h5>
                        <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                            {{ $annonce->description }}
                        </p>
                        <p href="#" class="text-sm pb-3">
                            By <a href="#" class="font-semibold hover:text-gray-800">{{ $annonce->user->name }} on
                                {{ $annonce->created_at }}</a>
                        </p>
                        <div style="justify-content: space-evenly">
                            <button class="text-blue-700 hover:underline mb-2 focus:outline-none toggle-comments">
                                show comments
                            </button>
                            @include('layouts.commentModal')
                            <div class="comments hidden">
                                @foreach ($annonce->comments as $comment)
                                    <div class="mb-2">
                                        <strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            @elseif (!Auth::check())
                <div
                    class="mx-3 mt-6 flex flex-col self-start rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 sm:shrink-0 sm:grow sm:basis-0">
                    <a href="#">
                        <img class="rounded-t-lg w-full h-[500px]" src="{{ asset('storage/' . $annonce->image) }}"
                            alt="Hollywood Sign on The Hill" />
                    </a>
                    <div class="p-6">
                        <a href="#"
                            class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $annonce->category->name }}</a>
                        <h5 class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
                            {{ $annonce->title }}
                        </h5>
                        <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                            {{ $annonce->description }}
                        </p>
                        <p href="#" class="text-sm pb-3">
                            By <a href="#" class="font-semibold hover:text-gray-800">{{ $annonce->user->name }}
                                on
                                {{ $annonce->created_at }}</a>
                        </p>
                        <div style="justify-content: space-evenly">
                            <button class="text-blue-700 hover:underline mb-2 focus:outline-none toggle-comments">
                                show comments
                            </button>
                            <div class="comments hidden">
                                @foreach ($annonce->comments as $comment)
                                    <div class="mb-2">
                                        <strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            @endif
        @empty
            <div>No Ads</div>
        @endforelse
    </div>





    <!-- Pagination -->
    <div class="flex items-center py-10" style="justify-content: center">
        <ul class="flex">
            @foreach (range(1, $annonces->lastPage()) as $page)
                <li class="mr-5">
                    <a href="{{ $annonces->url($page) }}"
                        class="h-10 w-10 {{ $page == $annonces->currentPage() ? 'bg-blue-800 text-white' : 'bg-white hover:bg-blue-600 text-gray-800 hover:text-white' }} font-semibold text-sm flex items-center justify-center">{{ $page }}</a>
                </li>
            @endforeach
        </ul>
    </div>

    <script>
        @if (session('success'))
            Toastify({
                text: '{{ session('success') }}',
                backgroundColor: 'green',
                close: true,
                duration: 30000, // 30 seconds
            }).showToast();
        @endif

        @if ($errors->any())
            var errorMessage = '<ul>';
            @foreach ($errors->all() as $error)
                errorMessage += '<li>{{ $error }}</li>';
            @endforeach
            errorMessage += '</ul>';

            Toastify({
                text: errorMessage,
                backgroundColor: 'red',
                close: true,
                duration: 30000, // 30 seconds
                gravity: 'top', // You can customize the position
            }).showToast();
        @endif

        const addCommentButton = document.querySelector('.add-comment-button');
    const commentModal = document.querySelector('#commentModal');

    addCommentButton.addEventListener('click', () => {
        commentModal.classList.remove('hidden');
    });

    // Ajoutez également le code pour fermer le modal si besoin
    const closeModalButton = commentModal.querySelector('[data-modal-hide="authentication-modal"]');
    closeModalButton.addEventListener('click', () => {
        commentModal.classList.add('hidden');
    });
    </sc>

</body>

</html>
