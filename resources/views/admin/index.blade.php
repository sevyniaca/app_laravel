<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- require_once (metaData) -->
    @include('components.metaData')
  
</head>
<body id="body-pd" class="body-pd">
    <!-- require_once (navigation) -->
    @include('components.navigation')

    <div class="height-100 pageContent">
        <!--yield overridden or filled in by child views that extend a parent view. -->
        @yield('pageContent')
        <!-- dashboard and user page -->
    </div>
    <!--Container Main end-->

      <!-- require_once (scripts) -->
    @include('components.scripts')

    <!-- apply script on specific page when called-->
    @yield('common-scripts')
</body>
</html>