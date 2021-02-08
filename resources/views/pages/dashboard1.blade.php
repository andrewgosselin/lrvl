@extends('layouts.app')

@section('styles')
<link href="css/chrome-tabs.css" rel="stylesheet">
<link href="css/all.min.css" rel="stylesheet">
<style>
    .apps-drawer-tab {
        position: absolute;
        background-color: white;
        padding: 3px;
    }
</style>
@endsection


@section('content')
<div class="mock-browser">
        <div class="chrome-tabs" style="--tab-content-margin: 9px;">
          <div class="chrome-tabs-content">
            <div class="chrome-tab" active>
              <div class="chrome-tab-dividers"></div>
              <div class="chrome-tab-background">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><symbol id="chrome-tab-geometry-left" viewBox="0 0 214 36"><path d="M17 0h197v36H0v-2c4.5 0 9-3.5 9-8V8c0-4.5 3.5-8 8-8z"/></symbol><symbol id="chrome-tab-geometry-right" viewBox="0 0 214 36"><use xlink:href="#chrome-tab-geometry-left"/></symbol><clipPath id="crop"><rect class="mask" width="100%" height="100%" x="0"/></clipPath></defs><svg width="52%" height="100%"><use xlink:href="#chrome-tab-geometry-left" width="214" height="36" class="chrome-tab-geometry"/></svg><g transform="scale(-1, 1)"><svg width="52%" height="100%" x="-100%" y="0"><use xlink:href="#chrome-tab-geometry-right" width="214" height="36" class="chrome-tab-geometry"/></svg></g></svg>
              </div>
              <div class="chrome-tab-content">
                <div class="chrome-tab-favicon" style="background-image: url('demo/images/facebook-favicon.ico')"></div>
                <div class="chrome-tab-title">All Apps</div>
                <div class="chrome-tab-drag-handle"></div>
                <div class="chrome-tab-close" style="display: none;"></div>
              </div>
            </div>
            <div class="chrome-tab">
              <div class="chrome-tab-dividers"></div>
              <div class="chrome-tab-background">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><symbol id="chrome-tab-geometry-left" viewBox="0 0 214 36"><path d="M17 0h197v36H0v-2c4.5 0 9-3.5 9-8V8c0-4.5 3.5-8 8-8z"/></symbol><symbol id="chrome-tab-geometry-right" viewBox="0 0 214 36"><use xlink:href="#chrome-tab-geometry-left"/></symbol><clipPath id="crop"><rect class="mask" width="100%" height="100%" x="0"/></clipPath></defs><svg width="52%" height="100%"><use xlink:href="#chrome-tab-geometry-left" width="214" height="36" class="chrome-tab-geometry"/></svg><g transform="scale(-1, 1)"><svg width="52%" height="100%" x="-100%" y="0"><use xlink:href="#chrome-tab-geometry-right" width="214" height="36" class="chrome-tab-geometry"/></svg></g></svg>
              </div>
              <div class="chrome-tab-content">
                <div class="chrome-tab-favicon" style="background-image: url('demo/images/facebook-favicon.ico')"></div>
                <div class="chrome-tab-title">Mail</div>
                <div class="chrome-tab-drag-handle"></div>
                <div class="chrome-tab-close"></div>
              </div>
            </div>
          </div>
          <div class="chrome-tabs-bottom-bar"></div>
          <!-- Styles to prevent flash after JS initialization -->
          <style>
            .chrome-tabs .chrome-tab {
              width: 258px
            }


          </style>
        </div>
        <div class="content">

        </div>
      </div>
@endsection


@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/draggabilly@2.2.0/dist/draggabilly.pkgd.min.js"></script>
<script src="js/chrome-tabs.js"></script>
<script>
    $(window).on("load", function(){
        var el = document.querySelector('.chrome-tabs')
        var chromeTabs = new ChromeTabs()
        chromeTabs.init(el)

        let openApps = JSON.parse(sessionStorage.getItem('openTabs')) ?? [];
        for(var i = 0; i < openApps.length; i++) {
            openApp(openApps[i]);
        }
    });




    function openApp(app) {
        // Hit API for getting tab.
        
        // Set the Session variable for tabs.
        let openTabs = JSON.parse(sessionStorage.getItem('openTabs')) ?? [];
        openTabs.push(app);
        sessionStorage.setItem('openTabs', JSON.stringify(openTabs));
    }
</script>
@endsection