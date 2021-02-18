<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <style>
            html,body {
                width: 100%;
                height: 100%;
                margin: 0px;
                padding: 0px;
                overflow-x: hidden; 
            }
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

            .shortcut {
                height: 50px;
                width: 50px;
                position: relative;
            }
            .shortcut .logo {
                padding: 10px;
                height: 100%;
            }
            .shortcut .logo img {
                width: 100%; 
                height: 100%;
            }
            .shortcut .indicator {
                width: 100%; 
                height: 100%; 
                position: absolute; 
                left: 0; 
                top: 0;
                display: none;
            }
            .shortcut:hover .indicator {
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

            .buttons-right {
                height: 50px; margin: 0; position: absolute; top: 0; right: 0; padding: 0;
            }

        </style>
        @yield('styles')
    </head>
    <body>
        <div class="topNav">
            @foreach(config('hub.settings.public_apps') as $project_slug)
                @if(isset(${$project_slug . 'App'}))
                    <a @if(\Route::current()->getName() == ('apps.' . $project_slug)) class="app-shortcut active" @else class="app-shortcut" @endif href="/apps/{{$project_slug}}">
                        <div class="logo" style="padding: 10px;">
                            <?php $app = ${$project_slug . 'App'} ?>
                            @if($app['icon']['type'] == "font-awesome")
                                <i class="{{${$project_slug . 'App'}['icon']['value']}}"></i>
                            @elseif($app['icon']['type'] == "url")
                                <img src="{{${$project_slug . 'App'}['icon']['value']}}">
                            @endif
                        </div>
                        <img class="indicator" src="/img/arrow-bottom.png">
                    </a>
                @endif
            @endforeach
            <div class="buttons-right">
                <a @if(\Route::current()->getName() == ('settings')) class="shortcut active" @else class="shortcut" @endif href="/settings">
                    <div class="logo" style="padding: 10px;">
                        <img src="/img/settings-icon.png">
                    </div>
                    <img class="indicator" src="/img/arrow.png">
                </a>
            </div>
            
        </div>
        <div id="mainContent">
        @yield('content') 
        </div>
    </body>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js"></script> -->
    @yield('scripts')
</html>
