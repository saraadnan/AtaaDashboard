@include('menu.menuDonor')

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
        <a href="viewAddDonor" >
          <button type="button" class="btn " id ="button_add_donors" >اضـافة متبـرع</button>
        </a>
        <div class="table-responsive">
          <table id="datatable" class="table table-striped table-borderless">
            <thead>
              <tr >
                
                <th style="font-size:  1em">رقم المتبـرع</th>
                <th style="font-size:  1em">الاسم الأول </th>
                <th style="font-size:  1em">الاسم الثاني </th>
                <th style="font-size:  1em">العمليات</th>
                
              </tr>  
            </thead>
            @foreach ($donor as $donor )
            <tbody >
              <tr>
                <td style="font-size: 1em" class="tdonor_id"> {{ $donor->id }}</td>
                <td class="font-weight-bold tdonor_name" style="font-size:  1em">{{ $donor->donor_name }}</td>
                <td class="font-weight-bold tdonor_lname" style="font-size:  1em">{{ $donor->donor_last_name }}</td>
                <td>
                 
                  <a href={{ "deleteDonor/".$donor['id'] }}> <button type="button" class="btn btn-danger" style="font-weight: bolder; font-size: 1em">حـذف</button></a> 
                  <button type="button" class="btn editbtn" wire:click="editgov{{ $donor->id  }}"  data-toggle="modal"  data-target="#editModal" style="font-weight: bolder; font-size: 1em" value="{{ $donor->id }}" >تـعـديـل</button> 

                </td>
              </tr>
             
            </tbody>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>

  <!--Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModelLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content clearfix">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <div class="modal-body">
                <h3 class="title"> تعديـل المـتبـرع </h3>
               
                <div class="form-group">
                    
                   
                </div>
                <div class="form-group">
                  <form action="{{ url('editdonor') }}" method="POST" id="editForm">
                    @csrf
                    <input type="hidden" name="donor_id" :value="$donor->id" id="donor_id">
                    <div class="form-group" style=" text-align: right ;" >
            {{-- <label for="govId" style="font-size: 1.2em ; padding-bottom: 1%"  >رقـم المحافظـة</label> --}}
            {{-- <input type="text" class="form-control" name="gov_id" :value="$governorates->id" id="gov_id" placeholder="رقـم المحافظـة" style="font-size: 1.1em " readonly> --}}
                     <br>


                   <label for="donor_name" style="font-size: 1.2em ; padding-bottom: 1%"  > الاسـم الأول للمتبـرع</label>
                   <input type="text" class="form-control" name="donor_name" id="donor_name" placeholder="الاسـم الأول" style="font-size: 1.1em ">
                   <br>
                   <label for="donor_last_name" style="font-size: 1.2em ; padding-bottom: 1%; padding-top: 2%"  >الاسـم الثاني للمتبـرع</label>
                   <input type="text" class="form-control" name="donor_last_name" id="donor_last_name" placeholder="الاسـم الثانـي" style="font-size: 1.1em ">
     
                   <span class="text-danger" id="gov_name_error"> </span>
          
               
            <br>
           <button type="submit" class="btn btn-primary col-lg-12" style="font-size: 1.1em ; background-color: #872d50 ; "> تعديـل </button>

                  </form> 
                </div>
            </div>
        </div>
    </div>
     <!--End Edit Modal -->
    

      <!-- partial -->
      <!-- plugins:js -->
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