<!-- This button is used to open the dialog -->
<button id="open" class="px-5 py-2 bg-indigo-500 hover:bg-indigo-700 text-white cursor-pointer rounded-md">
    Add comment
</button>

<!-- Overlay element -->
<div id="overlay" class="fixed hidden z-40 w-screen h-screen inset-0 from-fuchsia-300 to-sky-500"></div>

<!-- The dialog -->
<div id="dialog" style="justify-content: center"
    class="hidden fixed z-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 bg-sky-100 from-fuchsia-300 to-sky-500 rounded-md px-8 py-6 space-y-5 drop-shadow-lg">
    <div class="flex items-center justify-center font-black m-3 mb-12">
        <h1 class="tracking-wide text-3xl text-gray-900">ADD A COMMENT</h1>
    </div>
    <label class="text-sm font-medium">content</label>
    <textarea
        class="mb-3 mt-1 block w-full px-2 py-1.5 border border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400 focus:outline-none focus:border-sky-500 focus:ring-1
         focus:ring-sky-500
         focus:invalid:border-red-500 focus:invalid:ring-red-500"
        name="content" placeholder="Write your comment here"></textarea>
    <div class="flex justify-between items-center">
        <!-- This button is used to close the dialog -->
        <button id="close" class="px-5 py-2 bg-indigo-500 hover:bg-indigo-700 text-white cursor-pointer rounded-md">
            Close</button>

        <form id="comment" action="{{ route('addComment') }}" method="POST">
            @csrf
            <input type="hidden" name="annonce_id" value="{{ $annonce->id }}">
            <button
                class="px-4 py-1.5 rounded-md shadow-lg bg-gradient-to-r from-pink-600 to-red-600 font-medium text-gray-100 block transition duration-300"
                type="submit">Save</button>
        </form>
    </div>

</div>

<!-- Javascript code -->
