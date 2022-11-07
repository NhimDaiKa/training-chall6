<?php
  session_start();
	if(!isset($_SESSION['usr'])) header("Location: /index.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Create Challenge</title>
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

<body style="background-color:#f4f5f7;">
    <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Thêm challenge</h4>
                  <form class="forms-sample" action="{{ url('createchall') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Tên challenge</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Challenge name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Gợi ý</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Hint" name="hint" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">File</label>
                        <div class="col-sm-12" >
                            <input type="file" class="form-control" id="exampleInputMobile" style="height:40px;" name="file" required>
                        </div>
                    </div>
                    <button class="btn btn-primary me-2">Create</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
    </div>

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
    <script src="{{ asset('/js/file-upload.js') }}"></script>
    <script src="{{ asset('/js/typeahead.js') }}"></script>
    <script src="{{ asset('/js/select2.js') }}"></script>
<!-- End custom js for this page-->
</body>

</html>