<!DOCTYPE html>
<html lang="en">
    @include('layouts.partials.header')
    <body>   
        <div class="container-fluid">
            <div class="row">
                @yield('leftContent')
                @yield('rightContent')
            </div>
        </div>
        @include('layouts.partials.footer')
</html>



