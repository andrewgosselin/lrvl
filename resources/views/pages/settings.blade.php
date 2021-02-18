@extends('layouts.app')

@section('styles')
<link href="css/all.min.css" rel="stylesheet">
<style>
.navbar-global {
  background-color: indigo;
}

.navbar-global .navbar-brand {
  color: white;
}

.navbar-global .navbar-user > li > a
{
  color: white;
}

.navbar-primary {
  background-color: #333;
  bottom: 0px;
  left: 0px;
  position: absolute;
  top: 0;
  width: 200px;
  z-index: 8;
  overflow: hidden;
  -webkit-transition: all 0.1s ease-in-out;
  -moz-transition: all 0.1s ease-in-out;
  transition: all 0.1s ease-in-out;
}

.navbar-primary.collapsed {
  width: 60px;
}

.navbar-primary.collapsed .glyphicon {
  font-size: 22px;
}

.navbar-primary.collapsed .nav-label {
  display: none;
}

.btn-expand-collapse {
    position: absolute;
    display: block;
    left: 0px;
    bottom:0;
    width: 100%;
    padding: 8px 0;
    border-top:solid 1px #666;
    color: grey;
    font-size: 20px;
    text-align: center;
}

.btn-expand-collapse:hover,
.btn-expand-collapse:focus {
    background-color: #222;
    color: white;
}

.btn-expand-collapse:active {
    background-color: #111;
}

.navbar-primary-menu,
.navbar-primary-menu li {
  margin:0; padding:0;
  list-style: none;
}

.navbar-primary-menu li a {
  display: block;
  padding: 10px 18px;
  text-align: left;
  border-bottom:solid 1px #444;
  color: #ccc;
}

.navbar-primary-menu li a:hover {
  background-color: #000;
  text-decoration: none;
  color: white;
}

.navbar-primary-menu li a .glyphicon {
  margin-right: 6px;
}

.navbar-primary-menu li a:hover .glyphicon {
  color: orchid;
}

.main-content {
  margin-top: 0;
  margin-left: 200px;
  padding: 20px;
}

.collapsed + .main-content {
  margin-left: 60px;
}
#settingsList a {
    padding-left: 30px;
    text-decoration: none;
}
#settingsList a .indicator {
    position: absolute; right: 0; top: 0; height: 100%; display: none;
}
#settingsList a.active .indicator {
    display: block;
}

#settingsPanels .panel {
    display: none;
}
#settingsPanels .panel.active {
    display: block;
}
</style>
@endsection


@section('content')
<nav class="navbar-primary">
  <div class="pl-4 pt-3 text-light">
        <p>General</p>
    </div>
  <ul class="navbar-primary-menu" id="settingsList">
    <li>
        <a href="#" style="position: relative;" id="account">
            <span class="nav-label">Account</span>
            <img style="" class="indicator" src="/img/arrow-right.png">
        </a>
    </li>
    <hr>
    <div class="pl-4 text-light">
        <p>Administration</p>
    </div>
    <li>
        <a href="#" style="position: relative;" id="apps">
            <span class="nav-label">Apps</span>
            <img style="" class="indicator" src="/img/arrow-right.png">
        </a>
    </li>
  </ul>
</nav>
<div class="main-content">
    <div style="height: 100%; width: 100%;" id="settingsPanels">
        <div class="panel" id="settings-account">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
$('#settingsList a').on('click', function () {
    $('#settingsList a').removeClass('active');
    $('#settingsPanels .panel').removeClass('active');
    $(this).addClass('active');
    $('#settings-' + this.id).addClass('active');
});
$('.btn-expand-collapse').click(function(e) {
				$('.navbar-primary').toggleClass('collapsed');
});
</script>
@endsection