@include('menu.menuDonation')

<div class="row col-lg-9" style="margin-right: 2em">
  <div class="col-md-7 grid-margin stretch-card col-lg-12"  >
    <div class="card">
      <div class="card-body" style="direction:rtl">

              <!-- رسالة تم الحذف بنجاح -->
      @if (Session::has ('delete_success'))
      <div class="alert alert-danger" role="alert" style=" font-size: 1.3em ; font-size: 1.3em ;text-align: center">
        تــم <a href="#" class="alert-link"> {{ Session::get('delete_success') }} </a> بنجـاح.


      </div>
      @endif
       <!-- نهاية الرسالة -->

       <!-- رسالة تمت الاضافة بنجاح -->
        @if (Session::has ('add_success'))
        <div class="alert alert-success" role="alert" style=" font-size: 1.3em ;font-size: 1.3em ;text-align: center">
          تمـت <a href="#" class="alert-link"> {{ Session::get('add_success') }} </a> بنجـاح.


        </div>
        @endif
        <!-- نهاية الرسالة -->

         <!-- رسالة تم التعديـل  بنجاح -->
    @if (Session::has ('update_success'))
    <div class="alert alert-success" role="alert" style=" font-size: 1.3em ;font-size: 1.3em ;text-align: center">
      تـم <a href="#" class="alert-link"> {{ Session::get('update_success') }} </a> بنجـاح.


    </div>
    @endif
    <!-- نهاية الرسالة -->
        <a href="viewAddDonation" >
          <button type="button" class="btn " id ="button_add_donors" >اضـافة التبرعات</button>
        </a>
       
       <!-- تصميم التبرعات  -->
	   @foreach ($donation as $donation ) 
	   <div class="col-sm-8 col-lg-6">
	<span class="wish-icon"><i class="fa fa-heart-o"></i></span>
		   <div class="card text-white mb-3"  style="margin-top: 1% ; margin-left: 2% ;  border:3px solid #872d50;background-color: rgb(255, 255, 255)">
			<div class="img-box">
				<img src="/examples/images/products/ipad.jpg" class="img-responsive" alt=""  style="color: #000;
				font-size: 26px;font-weight: 300;
				 text-align: center;
				   text-transform: uppercase;
					position: relative;
				 margin: 30px 0 60px; ">
			</div>
		<div class="card-body">
			<div class="dropdown-divider"style=" border:1px solid #63d78d"></div>
            <h5 class="card-title" style="color:#0a0a0ad7; text-align: center; ">{{ $donation->donation_id  }}</h5>
            <div class="dropdown-divider"style=" border:1px solid  #63d78d"></div>
            <p class="card-title"style="color:#0a0a0ad7"> {{ $donation->donation_title }}</p>
             <div class="dropdown-divider"style=" border:1px solid  #63d78d"></div>
           	<h5 class="card-title" style="color:#0a0a0ad7; margin-lift: 7% "> {{ $donation->donation_desc }}<b class="card text-right">{{ $donation->donation_quantity }}</b></h5>
            <div class="dropdown-divider"style=" border:1px solid #63d78d"></div>
			<h5 class="card-title" style="color:#0a0a0ad7; margin-lift: 7% ">{{ $donation->donation_exp }}<b class="card text-right"> {{ $donation->donation_dir }}</b></h5>
            <div class="dropdown-divider"style=" border:1px solid  #63d78d"></div>
			<h5 class="card-title" style="color:#0a0a0ad7; margin-lift: 7% ">{{ $donation->delivery_place}}<b class="card text-right"> {{ $donation->delivery_time  }}</b></h5>
            <div class="dropdown-divider"style=" border:1px solid  #63d78d"></div>
			<h5 class="card-title" style="color:#0a0a0ad7; margin-lift: 7% ">{{ $donation->created_at  }}<b class="card text-right"> {{ $donation->updated_at  }}</b></h5>
            <div class="dropdown-divider"style=" border:1px solid  #63d78d"></div>
			<h5 class="card-title" style="color:#0a0a0ad7; margin-lift: 7% ">{{ $donation->cat_id  }}<b class="card text-right">{{ $donation->user_id }}</b></h5>
       <div class="dropdown-divider" style=" border:1px solid #63d78d"></div>
        <a href={{ "deleteDonation/".$donation['donation_id'] }}><button type="button" class="btn btn-danger" style="font-weight: bolder; font-size: 1em">حـذف</button></a> 
         <button type="button" class="btn editbtn" wire:click="editgov{{ $donation->donation_id }}"data-toggle="modal"  data-target="#editModal" style="font-weight: bolder; font-size: 1em" value="{{$donation->donation_id }}" >تـعـديـل</button> 
	</div>
   </div>
</div>
</div>
</div>
@endforeach
</div>
     <!-- تصميم التبرعات  -->
    <!--Edit Modal -->
 <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModelLabel">
  <div class="modal-dialog" role="document">
      <div class="modal-content clearfix">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <div class="modal-body">
              <h3 class="title"> تعديـل التبرعات </h3>
              <div class="form-group">    
              </div>
              <div class="form-group">
                <form action="{{ url('editDonation') }}" method="POST" id="editForm">
                  @csrf
                  <input type="hidden" name="dir_id" :value="$directorate->dir_id" id="dir_id">
                  <div class="form-group" style=" text-align: right ;" >
          {{-- <label for="govId" style="font-size: 1.2em ; padding-bottom: 1%"  >رقـم المحافظـة</label> --}}
          {{-- <input type="text" class="form-control" name="gov_id" :value="$governorates->id" id="gov_id" placeholder="رقـم المحافظـة" style="font-size: 1.1em " readonly> --}}
                   <br>


                 <label for="dir_name" style="font-size: 1.2em ; padding-bottom: 1%"  >  صورة التبرع </label>
                 <input type="text" class="form-control" name="dir_name" id="dir_name" placeholder=" صورة التبرع " style="font-size: 1.1em ">
                 <br>
              
                 <label for="gov_name" style="font-size: 1.2em ; padding-bottom: 1%; padding-top: 2%"  >  عنوان التبرع</label>
                <select  class="form-control" name="gov_id" id="gov_id">
                  {{-- جلب اسماء المحافظات من قاعدة البيانات وعرضها  --}}
                  @foreach ($donation as $donation ) 
                  <option  class="form-control"  placeholder=" عنوان التبرع " style="font-size: 1.1em " value="">
                        
                  </option>
                  @endforeach 
              
                </select>
                            
          <br>
         <button type="submit" class="btn btn-primary col-lg-12" style="font-size: 1.1em ; background-color: #872d50 ; "> تعديـل </button>

                </form> 
              </div>
          </div>
      </div>
  </div>
   <!--End Edit Modal -->
  
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->


  <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
  
  {{-- كود جافاسكربت لتعبئة حقول النموذج  --}}
  <script>
  
    $(document).on('click','.editbtn', function (e) {
     var _this = $(this).parents('tr');
     //لاضافة القيم في الحقول
     $('#donor_id').val(_this.find('.tdonor_id').text());
     $('#donor_name').val(_this.find('.tdonor_name').text());
     $('#donor_last_name').val(_this.find('.tdonor_lname').text())     
      });
      $(document).ready(function(){
          $(".alert").delay(5000).slideUp(300);
    });

  </script>
</body>

</html>