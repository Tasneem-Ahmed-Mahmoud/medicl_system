<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


     <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Vendor CSS Files -->
  <link href="{{asset('front/assets/')}}assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="{{asset('front/assets/')}}assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="{{asset('front/assets/')}}assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{asset('front/assets/')}}assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{asset('front/assets/')}}assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{asset('front/assets/')}}assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{asset('front/assets/')}}assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{asset('front/assets/')}}assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link  href="{{asset('front/assets/css/bootstrap.min.css')}}"  rel="stylesheet">
    <link  href="{{asset('front/assets/css/style.css')}}"  rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
@include('sweetalert::alert')
@include('./frontend.inc.navbar')
