<!doctype html>
<html>
<head>
   @include('dashboard.company.includes.head')
</head>
<body>
 
  
       @include('dashboard.company.includes.header')
       @include('dashboard.company.flash-message')
  
           @yield('content')
          
 
 
       @include('dashboard.company.includes.footer')
 
</body>
</html>
