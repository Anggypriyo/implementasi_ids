<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page_tittle')</title>

    @include('layout/css_global')
    
    @yield('custom_css')
</head>

<body>
    <div id="app">
        @include('layout/sidebar')
        <div id="main">

            @include('layout/navbar')

            <div class="main-content container-fluid">
                <div class="page-title">
                    <h3>@yield('tittle')</h3>
                </div>
                <section class="section">
                    @yield('content')
                </section>
            </div>

            
            @include('layout/footer')
        </div>
    </div>
    
    @include('layout/js_global')
    @yield('custom_js')
</body>

</html>