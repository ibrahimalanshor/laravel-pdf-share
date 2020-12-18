<!DOCTYPE html>
<html>
<head>
 
 @include('admin._includes.head')

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  @include('admin._partials.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('admin._partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>@yield('title')</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              @foreach ($urls as $name)
                @if ($loop->last)
                  <li class="breadcrumb-item active">{{ $name }}</li>
                @else
                  <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">{{ $name }}</a></li>
                @endif
              @endforeach
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="col">
        @yield('content')
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('admin._partials.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('admin._includes.foot')

</body>
</html>
