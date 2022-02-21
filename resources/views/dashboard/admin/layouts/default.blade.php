<!doctype html>
<html>
<head>
   @include('dashboard.admin.includes.head')
</head>
<body>
 
  
       @include('dashboard.admin.includes.header')
 
       @include('dashboard.admin.flash-message')
           @yield('content')
          
 
 
       @include('dashboard.admin.includes.footer')
 
</body>
</html>
