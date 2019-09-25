<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="container mt-5">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block mt-5">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                    {{ $message }}
                </div>
                @endif
                <div class="card mb-3">
                    <div class="card-header bg-primary text-white"><h3>Contact Us</h3></div>
                    <div class="card-body">
                        <form action="{{ url('contact') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input type="text" id="subject" name="subject" class="form-control" placeholder="Subject" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea name="message" id="message" class="form-control" cols="30" rows="10" placeholder="Enter your message here"></textarea>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Send">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </body>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</html>
