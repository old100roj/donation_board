<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name = "viewport" content="width=device-width, install-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<div id="app">
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ route('donates.index') }}">{{__('Donations')}}</a>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('donates.create') }}">{{__('Make Donation')}}</a>
            </li>
        </ul>
        <button
            type="button"
            class="btn btn-primary"
            data-toggle="modal"
            data-target="#exampleModal"
            data-whatever="@mdo"
        >Open modal for search</button>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="get" action="{{ route('donates.index') }}">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Search</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="search" class="col-form-label">Text Search:</label>
                                <input type="text" class="form-control" id="search" name="search">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Search by amount:</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="col-md-6">min</div>
                                        <input type="number" class="form-control" id="min_amount" name="min_amount">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-6">max</div>
                                        <input type="number" class="form-control" id="max_amount" name="max_amount">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Search by date:</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="col-md-6">min</div>
                                        <input type="date" class="form-control" id="min_date" name="min_date">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-6">max</div>
                                        <input type="date" class="form-control" id="max_date" name="max_date">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <br/>
    <div class="container-fluid">
        @yield('content')
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        const getParams = ['search', 'min_amount', 'max_amount', 'min_date', 'max_date'];
        const url = new URL(window.location);
        let paramValue = null;

        for (let param of getParams) {
            paramValue = url.searchParams.get(param);

            if (paramValue !== null) {
                $('#' + param).val(paramValue);
            }
        }
    });
</script>
</body>
</html>
