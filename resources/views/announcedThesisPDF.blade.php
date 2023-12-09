
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>NUFC-TMIS</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
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
            <h1>Announced Thesis List</h1>
            <div class="card-body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="padding:3px; border:1px solid black">Id</th>
                            <th style="padding:3px; border:1px solid black">Name</th>
                            <th style="padding:3px; border:1px solid black">Description</th>
                            <th style="padding:3px; border:1px solid black">Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($thesises as $thesis)
                            <tr>
                                <td style="padding:3px; border:1px solid black">{{ $thesis->id }}</td>
                                <td style="padding:3px; border:1px solid black">{{ $thesis->name }}</td>
                                <td style="padding:3px; border:1px solid black">{{ $thesis->description }}</td>
                                <td style="padding:3px; border:1px solid black">{{ $thesis->type }}</td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
    <script src="{{  asset('/js/jquery.min.js')}}"></script>
    <script src="{{ asset('/js/popper.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
</html>
