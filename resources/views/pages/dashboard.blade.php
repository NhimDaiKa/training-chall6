<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard</title>
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
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top"> 
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">Welcome Back, <span class="text-black fw-bold"><?php echo $data->name ?></span></h1>
            <h3 class="welcome-sub-text">Your performance summary </h3>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
               <img class="img-xs rounded-circle" src="{{ asset('storage/'.$data->avatar) }}"></a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <img class="img-sm rounded-circle" src="{{ asset('storage/'.$data->avatar) }}">;
                <p class="mb-1 mt-3 font-weight-semibold"><?php echo $data->name; ?></p>
                <p class="fw-light text-muted mb-0"><?php echo $data->email; ?></p>
              </div>
              <a class="dropdown-item" href="{{ asset('profile') }}"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile</a>
              <a class="dropdown-item" href="{{ asset('logout') }}"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('dashboard') }}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">Thông tin</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
               <i class="menu-icon mdi mdi-table"></i>
               <span class="menu-title">Danh sách</span>
               <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="tables">
               <ul class="nav flex-column sub-menu">
                 <li class="nav-item"> <a class="nav-link" href="{{ asset('userlist') }}">Danh sách sinh viên</a></li>
               </ul>
             </div>
          </li>
          <li class="nav-item nav-category">pages</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon mdi mdi-account-circle-outline"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ asset('profile') }}"> Profile </a></li>
              </ul>
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ asset('logout') }}"> Logout </a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link ps-0" id="home-tab" data-toggle="tab" href="#overview">Bài tập</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#challenge">Challenge</a>
                    </li>
                  </ul>
                </div>
                <div class="tab-content tab-content-basic">
                  <div  id="overview" class="tab-pane fade show active">
                    <div class="row">
                      <div class="col-lg-12 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="d-sm-flex justify-content-between align-items-start">
                                      <h4 class="card-title card-title-dash">Bài tập</h4>
                                      <?php if($data->role==1){
                                        echo '<div class="add-items d-flex mb-0">
                                                <button class="btn btn-primary btn-me text-white mb-0 me-0" ><a href="'.url('createhomeworkform').'" style="color:white; text-decoration:none;">Thêm bài tập</a></button>
                                              </div>';
                                      } ?>
                                    </div>
                                    <div class="list-wrapper">
                                      <ul class="todo-list todo-list-rounded">
                                        <?php 
                                          foreach($hwt as $ques){
                                        ?>
                                        <li class="d-block">
                                          <div class="form-check w-100">
                                            <label class="form-check-label">
                                              <h5>Bài tập: <?php echo $ques->name ?></h5>
                                            </label>
                                            <label class="form-check-label">
                                              <a href="{{ url('downhomework/'.$ques->hid)}}">{{ $ques->file }}</a>
                                            </label>
                                            <div class="d-flex mt-2">
                                              <div class="ps-4 text-small me-3"><?php echo $ques->date ?></div>
                                            </div><br>
                                            <form class="forms-sample" method="POST" action="{{ url('turnin/'.$ques->hid) }}" enctype="multipart/form-data">
                                              @csrf
                                              <div class="form-group row" style="height:40px;">
                                                <label for="exampleInputPassword2" class="col-sm-1 col-form-label" style="margin-left:30px;"><h5>Nộp bài</h5></label>
                                                <div class="col-sm-6">
                                                  <input type="file" class="form-control" name="file" required>
                                                </div>
                                                <div class="col-sm-3">
                                                  <button class="btn btn-primary btn-icon-text" style="color:white">
                                                    <i class="ti-file btn-icon-prepend"></i>Submit
                                                  </button>
                                                </div>
                                              </div>
                                            </form>
                                            <?php 
                                             $prj_id = $ques->hid;
                                             $count = 1;
                                             foreach($hws as $ans){
                                                if($data->role == 1){
                                                   if($ans->prj_id==$prj_id){
                                            ?>
                                              <label class="form-check-label">
                                                <?php 
                                                  echo $count.', '.$ans->user." "; 
                                                  $count++;
                                                ?>
                                                <a href="">{{ $ans->file }}</a>
                                              </label>
                                              <div class="d-flex mt-2">
                                                <div class="ps-4 text-small me-3"><?php echo $ans->date; ?></div>
                                              </div>
                                            <?php 
                                                }}
                                              else {
                                                if($ans->prj_id==$prj_id && $ans->pid==$data->pid){
                                            ?>
                                                <label class="form-check-label">
                                                  <?php 
                                                    echo $count.', '.$ans->user." "; 
                                                    $count++;
                                                  ?>
                                                  <a href="{{ url('downanswer/'.$ans->hid)}}">{{ $ans->file }}</a>
                                                </label>
                                                <div class="d-flex mt-2">
                                                  <div class="ps-4 text-small me-3"><?php echo $ans->date ?></div>
                                                </div>
                                            <?php
                                                }}}
                                            ?>
                                          </div>
                                        </li>
                                        <?php } ?>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- </div>
                <div class="tab-content tab-content-basic"> -->
                  <div  id="challenge" class="tab-pane fade show active">
                    <div class="row">
                      <div class="col-lg-12 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div class="d-sm-flex justify-content-between align-items-start">
                                      <h4 class="card-title card-title-dash">Challenge</h4>
                                      <?php if($data->pid==1){
                                      echo '<div class="add-items d-flex mb-0">
                                              <button class="btn btn-primary btn-me text-white mb-0 me-0" ><a href="'.url('createchallform').'" style="color:white; text-decoration:none;">Thêm challenge</a></button>
                                            </div>';
                                      } ?>
                                    </div>
                                    <div class="list-wrapper">
                                      <ul class="todo-list todo-list-rounded">
                                        <?php 
                                          foreach($chall as $cha){
                                        ?>
                                        <li class="d-block">
                                          <div class="form-check w-100">
                                            <label class="form-check-label">
                                              <h5>Challenge: <?php echo $cha->name ?></h5>
                                            </label>
                                            <label class="form-check-label">
                                              Hint: <?php echo $cha->hint ?> 
                                            </label>
                                            <div class="d-flex mt-2">
                                              <div class="ps-4 text-small me-3"><?php echo $cha->date ?></div>
                                            </div><br>
                                            <form class="forms-sample" method="POST" action="{{ url('answer/'.$cha->cid) }}">
                                              @csrf
                                              <div class="form-group row">
                                                <label for="exampleInputPassword2" class="col-sm-1 col-form-label" style="margin-left:30px;"><h5>Trả lời</h5></label>
                                                <div class="col-sm-3">
                                                  <input type="text" class="form-control" name="ans" >
                                                </div>
                                                <div class="col-sm-3">
                                                  <button class="btn btn-primary btn-icon-text" style="color:white">Answer</button>
                                                </div>
                                              </div>
                                              
                                            </form>
                                            <?php 
                                              if(Session::has('correct')){
                                                if(session()->get('correct')==$cha->cid){
                                                  // $fh = fopen("{{ asset('storage/chall/'.$cha->file) }}", 'r');
                                                  // $pageText = fread($fh, 25000);
                                                  $filename = 'chall/'.$cha->file;
                                                  $content = Storage::disk('public')->get($filename);
                                                  echo '<label class="form-check-label"><h6>Chúc mừng bạn đã trả lời đúng câu hỏi, sau đây là phần quà của bạn:</h6><br>'.nl2br($content).'</label>';
                                                  Session::forget('correct');
                                                }
                                              } 
                                            ?>
                                          </div>
                                        </li>
                                        <?php } ?>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
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