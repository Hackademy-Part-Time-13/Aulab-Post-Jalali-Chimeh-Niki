<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrati</title>
    @vite(['resources/css/app.css','resources/js/app.js','resources/js/auth/register.js'])
</head>
<body class="auth-font vh-100">
    
    <div class="container justify-content-center align-items-center h-100">
        <div class="row justify-content-center align-items-center g-2 h-100">
        {{-- FORM --}}
            <div class="col-12 col-md-6">
                <div class="row">
                    <div class="col-12">
                        <div class="border rounded p-3">
                            {{-- TITLE + LOGO --}}
                            <div class="d-flex justify-content-between">

                                <h1 class="auth-title">Register</h1>
                                
                                <img class="img-fluid" src="{{ Vite::asset('resources/assets/auth/The-Aulab-Post-logo.png') }}" alt="The Aulab Post logo">
                                
                                
                            </div>
                            {{-- LOGIN LINK --}}
                            <p class="mb-2">If you already have an account registered</p>
                            <p class="mb-2">You can <strong><a class="auth-link" href="{{ route('login') }}">Login here!</a></strong></p>

                            {{-- FORM CLASSIC --}}
                            <form action="/register" method="POST">
                                @csrf
                                {{-- NAME --}}
                                <div class="input-group mb-3">

                                    <span class="input-group-text bg-white border-top-0 border-start-0 border-end-0">
                                        <img class="img-fluid" src="{{ Vite::asset('resources/assets/auth/user.svg') }}" alt="user">
                                    </span>
                                    <div class="form-floating">
                                        <input
                                        type="text"
                                        class="form-control border-top-0 border-start-0 border-end-0 "
                                        name="name"
                                        id="name"
                                        placeholder="Name"
                                        />
                                        <label for="name" class="form-label">Name</label>
                                    </div>
                                </div>
                                {{-- EMAIL --}}
                                <div class="input-group mb-3">

                                    <span class="input-group-text bg-white border-top-0 border-start-0 border-end-0">
                                        <img class="img-fluid" src="{{ Vite::asset('resources/assets/auth/message.svg') }}" alt="letter">
                                    </span>
                                    <div class="form-floating">
                                        <input
                                        type="email"
                                        class="form-control border-top-0 border-start-0 border-end-0 @error('email') is-invalid @enderror"
                                        name="email"
                                        id="email"
                                        placeholder="email"
                                        />
                                        <label for="email" class="form-label">Email</label>
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>

                                </div>

                                {{-- PASSWORD --}}
                                <div class="input-group mb-3">

                                    <span class="input-group-text bg-white border-top-0 border-start-0 border-end-0">
                                        <img class="img-fluid" src=" {{ Vite::asset('resources/assets/auth/padlock.svg') }}" alt="lock">
                                    </span>
                                    <div class="form-floating">
                                        <input
                                        type="password"
                                        class="form-control border-top-0 border-start-0 border-end-0 @error('password') is-invalid @enderror"
                                        name="password"
                                        id="password"
                                        placeholder="password"
                                        />
                                        <label for="password" class="form-label">Password</label>

                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>

                                    <span class="input-group-text bg-white border-top-0 border-start-0 border-end-0">
                                        <img class="img-fluid" role="button" src="{{ Vite::asset('resources/assets/auth/password-show-toggle.svg') }}" alt="lock" id="password-show-toggle">
                                    </span>

                                </div>

                                {{-- PASSWORD CONFIRM--}}
                                <div class="input-group mb-3">

                                    <span class="input-group-text bg-white border-top-0 border-start-0 border-end-0">
                                        <img class="img-fluid" src=" {{ Vite::asset('resources/assets/auth/padlock.svg') }}" alt="lock">
                                    </span>
                                    <div class="form-floating">
                                        <input
                                        type="password"
                                        class="form-control border-top-0 border-start-0 border-end-0 @error('password_confirmation') is-invalid @enderror"
                                        name="password_confirmation"
                                        id="password_confirmation"
                                        placeholder="password"
                                        />
                                        <label for="password_confirmation" class="form-label">Conferma Password</label>

                                        @error('password_confirmation')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>

                                    <span class="input-group-text bg-white border-top-0 border-start-0 border-end-0">
                                        <img class="img-fluid" role="button" src="{{ Vite::asset('resources/assets/auth/password-show-toggle.svg') }}" alt="lock" id="password-confirmation-show-toggle">
                                    </span>

                                </div>
                                {{-- SUBMIT BUTTON --}}
                                <button type="submit" class="w-100 auth-button my-3">Login</button>

                                {{-- FORM MODERN --}}
                                
                                <div class="d-flex justify-content-center">
                                    <div class="text-center">
                                        <p>or continue with</p>
                                        <a href="{{route('auth.google')}}">
                                            <img class="img-fluid me-3 " role="button" style="height: 74px;" src="{{ Vite::asset('resources/assets/auth/google.svg') }}" alt="Google">
                                        </a>
                                    </div>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        {{-- IMG --}}
            <div class="col-md-6 d-none d-md-block">
                
                <img class="img-fluid" src="{{ Vite::asset('resources/assets/auth/talking-people.png') }}" alt="Two people discussing ideas they read in a blog">
                
            </div>
        </div>
        
    </div>
    

</body>
</html>