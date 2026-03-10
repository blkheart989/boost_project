<!DOCTYPE html>
<html>
<head>
<title>daily boost</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="contact.css">
<style>
.navbar {
    
    background: #e01923;   /* deep navy */

    padding: 15px 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}







</style>
</head>

<body>

<div class="navbar">
  <strong>DailyBoost</strong>
  <div class="menu-btn">☰</div>
  <div class="nav-links">
    <a href="{{URL::to('/#about')}}">About</a>
    <a href="{{URL::to('/#plans')}}">Plans</a>
    <a href="{{URL::to('user/dashboard')}}">Dashboard</a>
    <a href="{{URL::to('https://t.me/solar_earn')}}">Contact</a>
  </div>
</div>


