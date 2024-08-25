<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>عطــاء</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />

</head>
<body dir="rtl">
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <!--logo-->
      
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index"><img src="images/logo.jpg" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index"><img src="images/logo-mini.jpg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2 col-lg-8">
          <li class="nav-item nav-search d-none d-lg-block">
              <form method="GET" action="{{ url('/searchCat') }}">
                  <div class="input-group ">
                       <input type="search" class="form-control " name="query" id="navbar-search-input" placeholder="  ابحث الآن" aria-label="search" aria-describedby="search" >
                          <div class="input-group-prepend hover-cursor mr-5" id="navbar-search-icon">
                               <span class="input-group-text" id="search">
                                  <button class="btn-outline-light" style="border-radius: 5cm" type="submit">   <i class="icon-search"></i> </button>
                              </span>
             
                          </div>
                  </div>
              </form>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="images/faces/images.png" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
               {{ __('تسجيل خروج') }}
           </a>
           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
            </div>
         
         
          </li>
       
          
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      {{-- <div class="theme-setting-wrapper" >
        <div id="settings-trigger" style=" background-color:#63d78d "><i class="ti-settings" ></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div> --}}
     
        

      
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title"  style=" padding-right: 0.5rem ; font-weight: bolder"> لوحة التحكم</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="categories">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title"  style=" padding-right: 0.5rem ; font-weight: bolder">الأصنـاف</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="governorates">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title"  style=" padding-right: 0.5rem ; font-weight: bolder">المحافظـات</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="directorates" class="nav-item">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title" style=" padding-right: 0.5rem ; font-weight: bolder">المديريـات</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="neighborhoods">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title" style=" padding-right: 0.5rem ; font-weight: bolder">الأحيــاء</span>
            </a>
          </li> 

         

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon" ></i>
              <span class="menu-title" style=" padding-right: 0.5rem ; font-weight: bolder"> المستفيديـن</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic" >
              <ul class="nav flex-column sub-menu" style="text-align: right ; padding-right: 2rem;  font-weight: bolder " >
                <li class="nav-item"> <a class="nav-link"  href="beneficiary">كافـة المستفيديـن</a></li>
                
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title"  style=" padding-right: 0.5rem ; font-weight: bolder"> المتبرعين </span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu" style="text-align: right ; padding-right: 2rem ; font-weight: bolder">
                <li class="nav-item"><a class="nav-link" href="donors">كـافة المتبرعيـن</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#donor" aria-expanded="false" aria-controls="donor">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title"  style=" padding-right: 0.5rem ; font-weight: bolder"> التبرعات </span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="donor" >
              <ul class="nav flex-column sub-menu" style="text-align: right ; padding-right: 2rem ; font-weight: bolder ">
                <li class="nav-item"><a class="nav-link" href=" {{ url('/donation') }}">كـافة التبرعات</a></li>
                <li class="nav-item"><a class="nav-link" href=" {{ url('/getAllRes') }}">التبرعات المحجوزة</a></li>
                <li class="nav-item"><a class="nav-link" href=" {{ url('/getAllNotRes') }}">التبرعات الغير محجوزة</a></li>

              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title"  style=" padding-right: 0.5rem ; font-weight: bolder"> الوسطـاء</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu" style="text-align: right ; padding-right: 2rem ; font-weight: bolder">
                <li class="nav-item"> <a class="nav-link" href="mediator">كافـة الوسطـاء</a></li>
              </ul>
            </div>
          </li>
    
        

          <li class="nav-item">
            <a class="nav-link" href="user">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title"  style=" padding-right: 0.5rem ; font-weight: bolder">المستخدمين</span>
            </a>
          </li>
        </ul>
      </nav>