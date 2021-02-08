<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <style>
       html,body
{
    width: 100%;
    height: 100%;
    margin: 0px;
    padding: 0px;
    overflow-x: hidden; 
}
        </style>

        <style>
            body {
                font-family: 'Nunito';
                overflow: hidden;
                margin: 0px !important;
            }
            .topNav {
                width: 100%;

                background-color: #23272a;
                height: 50px;
                overflow: hidden;
                display: flex;
                flex-wrap: wrap;
                
            }

            .app-shortcut {
                height: 50px;
                width: 50px;
                margin-left: 3px;
                margin-right: 3px;
                position: relative;
            }
            .app-shortcut .logo {
                padding: 10px;
            }
            .app-shortcut .logo img {
                width: 100%; 
                height: 100%;
            }
            .app-shortcut .indicator {
                width: 100%; 
                height: 100%; 
                position: absolute; 
                left: 0; 
                top: 0;
                display: none;
            }
            .app-shortcut:hover .indicator {
                display: block;
            }
            .topNav .active .indicator {
                display: block;
            }

            #mainContent {
                height: 100vh;
                width: 100%;
                position: relative;
            
            }

        </style>
        @yield('styles')
    </head>
    <body>
        <div class="topNav">
            <a @if(\Route::current()->getName() == 'pages.home') class="app-shortcut active" @else class="app-shortcut" @endif href="/home">
                <div class="logo" style="padding: 10px;"><img src="/img/home-icon.png"></div>
                <img class="indicator" src="/img/arrow.png">
            </a>
            @foreach(config('hub.settings.public_apps') as $project_slug)
                <a @if(\Route::current()->getName() == ('apps.' . $project_slug)) class="app-shortcut active" @else class="app-shortcut" @endif href="/apps/{{$project_slug}}">
                    <div class="logo" style="padding: 10px;"><img src="/img/icon.png"></div>
                    <img class="indicator" src="/img/arrow.png">
                </a>
            @endforeach
        </div>
        <div id="mainContent">
        @yield('content') 
        </div>
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @yield('scripts')
</html>
