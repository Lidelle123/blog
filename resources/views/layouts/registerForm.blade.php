<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
						initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('assets/css/registerStyle.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    @vite('resources/css/app.css')




</head>

<body>
    <header>
        @include('layouts.menu')

    </header>

    <!-- container div -->
    <div class=" flex justify-center items-center h-full">
        <div class="loginContainer bg-teal-500 ">

            <!-- upper button section to select
   the login or signup form -->
            <div class="slider"></div>
            <div class="btn">
                <button class="login">Login</button>
                <button class="signup">Signup</button>
            </div>

            <!-- Form section that contains the
   login and the signup form -->
            <div class="form-section">

                <!-- login form -->
                <form id="login" action="{{ route('auth.login') }}" method="POST"
                    class="flex flex-col justify-center">
                    @csrf
                    <div class="login-box">
                        <input type="email" name="email" class="email ele" placeholder="youremail@email.com">
                        <input type="password" name="password" class="password ele" placeholder="password">
                        <button type="submit" class="clickbtn">Login</button>
                    </div>
                </form>

                <!-- signup form -->
                <form id="register" action="{{ route('auth.store') }}" method="POST"
                    class="flex flex-col justify-center" enctype="multipart/form-data">
                    @csrf
                    <div class="signup-box">
                        <input type="text" name="name" class="name ele" placeholder="Enter your name" required>
                        <input type="email" name="email" class="email ele" placeholder="youremail@email.com"
                            required>
                        <input type="password" name="password" class="password ele" placeholder="password" required>
                        <input type="password" name="confirm" class="password ele" placeholder="Confirm password"
                            required>
                        <input type="file" name="image" class="name ele"
                            accept="image/jpeg, image/png, image/jpg, image/gif" placeholder="choose a profile"
                            required>
                        <button type="submit" class="clickbtn">Signup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/registerScript.js') }}"></script>
    <script>
        @if (session('success'))
            Toastify({
                text: '{{ session('success') }}',
                backgroundColor: 'green',
                close: true,
                duration: 3000, // 3 seconds
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
                duration: 3000, // 3 seconds
                gravity: 'top',
            }).showToast();
        @endif
    </script>

</body>

</html>
