<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    {{ config('app.name', 'Laravel Blog') }}
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

  @include('user.layouts.head')

</head>

<body class="landing-page sidebar-collapse">
    
    @include('user.layouts.header')

  <div class="wrapper">
     @yield('content')
          
     @include('user.layouts.footer')
  </div>

    @include('user.layouts.footJs')

</body>    
</html>