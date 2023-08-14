<nav class="flex items-center justify-between flex-wrap bg-teal-500 p-6">
    @if (Auth::check())
        <div class="flex items-center">
            <a href="javascript:history.back()" class="text-white hover:text-teal-200 mr-2">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <img class="w-12 h-12 rounded-full mr-2" src="{{ asset('storage/' . Auth::user()->image) }}"
                alt="Profile Image">
            <div>
                <p class="text-base font-medium text-white">{{ Auth::user()->name }}</p>
                <p class="text-sm text-teal-200">{{ Auth::user()->email }}</p>
                <p class="text-xs" style="color: green">online</p>

            </div>
        </div>
        <div>
            <a href="{{ route('annonce.publish') }}"
                class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">Publish</a>
        </div>

        <div>
            <a href="{{ route('auth.logout') }}"
                class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">Logout</a>
        </div>
    @else
        <div class="flex items-center">
            <a href="javascript:history.back()" class="text-white hover:text-teal-200 mr-2">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <img class="w-10 h-10 rounded-full mr-2" src="{{ asset('assets/images/vane2.png') }}" alt="Profile Image">
            <div>
                <p class="text-sm font-medium text-white">DVL</p>
                <p class="text-xs text-teal-200">vanelladzikang1@gmail.com</p>
            </div>
        </div>
        <div>
            <a href="{{ route('auth.register') }}"
                class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">Register/Login</a>
        </div>
    @endif
    <div class="block lg:hidden">
        <button
            class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <title>Menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            </svg>
        </button>
    </div>



</nav>
<div class="flex flex-col items-center py-12">
    <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="#">
        DVL Blog
    </a>
    <p class="text-lg text-gray-600">
        computer science student
    </p>
</div>
