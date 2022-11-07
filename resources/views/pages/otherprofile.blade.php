<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Profile</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ url('/vendors/feather/feather.css') }} ">
  <link rel="stylesheet" href="{{ url('/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ url('/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ url('/vendors/typicons/typicons.css') }}">
  <link rel="stylesheet" href="{{ url('/vendors/simple-line-icons/css/simple-line-icons.css') }}">
  <link rel="stylesheet" href="{{ url('/vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ url('/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ url('/css/vertical-layout-light/style.css') }}">
  <!-- inject:js -->
  <script src="{{ asset('https://code.jquery.com/jquery-1.10.2.min.js') }}"></script>
	<script src="{{ asset('https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('https://kit.fontawesome.com/1c24ae6fde.js') }}" crossorigin="anonymous"></script>
  <!-- endinject -->
</head>

<body style="background-color: #eee;">
    <section>
    <div class="container py-5">
        <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
            <div class="card-body text-center">
                <img src="{{ asset('storage/'.$data->avatar) }}" class="rounded-circle img-fluid" style="width: 150px;">
                <h5 class="my-3">{{ $data->user }}</h5>
                <p class="text-muted mb-4">{{ $data->bio }}</p>
                <?php if($data->pid != session()->get('pid')){ ?>
                    <div class="d-flex justify-content-center mb-2"><button class="btn btn-outline-primary ms-1"><a href="{{ url('chatbox/'.$data->pid) }}" style="text-decoration: none;">Message</a></button></div>
                <?php } ?>
            </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Full Name</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $data->name }}</p>
                </div>
                </div>
                <hr>
                <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $data->email }}</p>
                </div>
                </div>
                <hr>
                <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Phone</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $data->sdt }}</p>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
  <script src="{{ asset('/vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('/vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('/vendors/progressbar.js/progressbar.min.js') }}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('/js/template.js') }}"></script>
  <script src="{{ asset('/js/settings.js') }}"></script>
  <script src="{{ asset('/js/todolist.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('/js/jquery.cookie.js') }}"></script>
  <script src="{{ asset('/js/dashboard.js') }}"></script>
  <script src="{{ asset('/js/Chart.roundedBarCharts.js') }}"></script>
  <!-- End custom js for this page-->
</body>

</html>