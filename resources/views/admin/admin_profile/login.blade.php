
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>NUFC-TMIS</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/jasny-bootstrap.min.css') }}">
        <style>
        </style>
    </head>
    <body>
        <div class="container mt-5">
            <div class="container-fluid">
                <div class="row mt-5">
                    <div class="col-md-6 m-auto mt-5">
                        <h1 class="text-center">NUCSF TMIS</h3>
                        <div class="card  mb-4">
                            <div class="card-header bg-primary text-white">
                                <i class="fas fa-user fa-fw"></i>
                                Login
                            </div>
                            <div class="card-body table-responsive">
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="mt-2 mt-2">
                                        <label for="thesis_name">Email</label>
                                        <input type="email" class="form-control" 
                                        id="email" class="block mt-1 w-full" 
                                        type="email" name="email" :value="old('email')" 
                                        required autofocus autocomplete="username" 
                                        >
                                    </div>
                                    <div class="mt-2 mt-2">
                                        <label for="thesis_name">Password</label>
                                        <input type="password" class="form-control" 
                                            id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="current-password" 
                                        >
                                    </div>
                                    {{-- <a href="{{ route('register') }}">register</a> --}}
                                    <div class="mt-2 mt-2">
                                        <input type="submit" class="btn btn-primary" value="Sign in">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>    
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
    <script src="{{  asset('/js/jquery.min.js')}}"></script>
    <script src="{{ asset('/js/popper.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
</html>