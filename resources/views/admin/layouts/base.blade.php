<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Admin</title>
</head>
<body class="bg-secondary">
    <div class="container bg-gray-500">
        <header>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse d-flex align-items-center justify-content-between" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('products.index') }}">{{ __('front.products') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('services.index') }}">{{ __('front.services') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('products.create') }}">{{ __('front.add_product') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('services.create') }}">{{ __('front.add_service') }}</a>
                            </li>
                        </ul>
                        <a href="{{ route('export') }}"
                           class="btn btn-primary fw-medium">{{ __('front.export_catalog') }}</a>
                    </div>
                </div>
            </nav>
        </header>
        @yield('content')
    </div>
</body>
</html>
