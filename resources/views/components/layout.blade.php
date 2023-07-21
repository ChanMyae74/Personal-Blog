<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js'])
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="icon" href="{{asset('images/icon.svg')}}">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
    <title>{{ env('APP_NAME', 'Tech-Si') }} - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>
<style>
    html{
        scroll-behavior: smooth;
    }
    body{
        scroll-behavior: smooth;
        color: white;
    }
</style>
<body class="pointer-events-auto dark:bg-gray-900">
<section class="text-black-50 dark:text-white/50 dark:bg-gray-900">
    <x-nav-bar></x-nav-bar>
    <x-side-bar-master></x-side-bar-master>
    {{$slot}}
</section>
@include('components.toast')
</body>
<script>
    var sideBar = document.getElementById("mobile-nav");
    var openSidebar = document.getElementById("openSideBar");
    var closeSidebar = document.getElementById("closeSideBar");
    sideBar.style.transform = "translateX(-260px)";

    function sidebarHandler(flag) {
        if (flag) {
            sideBar.style.transform = "translateX(0px)";
            openSidebar.classList.add("hidden");
            closeSidebar.classList.remove("hidden");
        } else {
            sideBar.style.transform = "translateX(-260px)";
            closeSidebar.classList.add("hidden");
            openSidebar.classList.remove("hidden");
        }
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</html>
