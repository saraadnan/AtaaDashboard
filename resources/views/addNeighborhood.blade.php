@include('menu.menuNeigh')

      <!--form -->
    <div class="main-panel" >        
      <div class="content-wrapper">
         <div class="row" >
          <div class="col-md-6 grid-margin stretch-card col-lg-6 " style="margin-right:16em" >
             <div class="card">
                 <div class="card-body"  >
                    <h4 class="card-title " style="text-align: center ; font-size: 1.4em; color: #181f39 " > اضـافة حــي </h4>
                     
             <form class="forms-sample" method="POST" action="{{ url('/insertneigh') }}" >
               @csrf
                <div class="form-group" style=" text-align: right ;" >

                  {{-- <label for="neigh_id" style="font-size: 1.2em ; padding-bottom: 1%" > رقـم الحــي </label>
                  <input type="text" class="form-control" name="neigh_id" id="neigh_id"  value= "{{  $neighborhood }}" style="font-size: 1.1em " readonly> --}}
                  
                    
                 <label for="gov_id" style="font-size: 1.2em ; padding-bottom: 1% ; padding-right: 0%"> المحـافـظـة </label> 
                
                 
                 <select class="form-control" id="gov_id" style="font-size: 1.1em " name="gov_id">
                   @foreach ( $gov as $gov ) 
                   <option  class="form-control"  placeholder=" اسـم المحـافظـة" style="font-size: 1.1em " value="{{ $gov->gov_id }}">
                       {{ Str::ucfirst($gov->gov_name)   }}    
                   </option>
                   @endforeach 
                 </select>
                  <!-- رسالة التحقق من صحة البيانات المضافة -->
                  @error('dir_id')
                  <span class="text-danger"> {{ $message }}</span>
                  
                @enderror
 
                  <!-- نهاية رسالة التحقق من صحة البيانات المضافة -->
 

                 <br>
                
                  <label for="dir_id" style="font-size: 1.2em ; padding-bottom: 1% ; padding-right: 0%"> المديرية التي يتبعها </label> 
                
                 
                  <select class="form-control" id="dir_id" style="font-size: 1.1em " name="dir_id">
                    {{-- @foreach ( $directorate as $directorate ) 
                    <option  class="form-control"  placeholder=" اسـم المديريـة" style="font-size: 1.1em " value="{{ $directorate->dir_id }}">
                        {{  $directorate->dir_name  }}    
                    </option>
                    @endforeach  --}}
                  </select>
                   <!-- رسالة التحقق من صحة البيانات المضافة -->
                   @error('dir_id')
                   <span class="text-danger"> {{ $message }}</span>
                   
                 @enderror
  
                   <!-- نهاية رسالة التحقق من صحة البيانات المضافة -->
                  <br>
                  
                  <label for="neigh_name" style="font-size: 1.2em ; padding-bottom: 1%"  > اسـم الحــي</label> 
                  <input type="text" class="form-control" name="neigh_name" id="neigh_name" placeholder="اسم الحـي" style="font-size: 1.1em ">
                 <!-- رسالة التحقق من صحة البيانات المضافة -->
                  @error('neigh_name')
                    <span class="text-danger"> {{ $message }}</span>
                    
                  @enderror

                    <!-- نهاية رسالة التحقق من صحة البيانات المضافة -->
                 
              <br>
             
              {{-- <label for="dir_id" style="font-size: 1.2em ; padding-bottom: 1% ; padding-right: 0%" > المحافظة التي يتبعها </label> 
                
                 
                <select class="form-control" id="dir_id" style="font-size: 1.1em " name="dir_id">
                  @foreach ( $directorate as $directorate ) 
                  <option  class="form-control"  placeholder=" اسـم المديريـة" style="font-size: 1.1em " value="{{ $directorate->dir_id }}">
                      {{  $directorate->dir_name  }}    
                  </option>
                  @endforeach 
                </select>
                 <!-- رسالة التحقق من صحة البيانات المضافة -->
                 @error('dir_id')
                 <span class="text-danger"> {{ $message }}</span>
                 
               @enderror --}}

                 <!-- نهاية رسالة التحقق من صحة البيانات المضافة -->
              
            </div>
               <br>
                <button type="submit" class="btn btn-primary mr-2" style="font-size: 1.1em ; background-color: #181f39 ; "> اضـافة </button>
                 <button class="btn btn-light" style="font-size: 1.1em"  >الغـاء</button> 
               
              </form>
            </div>
            </div>
            </div>
            
        </div>



     
        <!-- main-panel ends -->
      </div>
     
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- ظهور المديريات التبعة للمحافظة-->
     <script type="text/javascript">
     $(document).ready (function() {
      $('#gov_id').on('change', function(){
        let id = this.value;
        $("#dir-id").html('');
        // $('#dir_id').empty();
        // $('#dir_id').append('<option value="0" disabled selected> Processing </option>');
        $.ajax({
          url: "{{url('api/fetch-dir')}}",
          type:'POST',
          data:{
            dir_id :dir_id,
            _token: '{{csrf_token()}}'
          },
          dataType: 'json',
                    success: function (result) {
                        $('#dir_id').html('<option value=""> اختـر المديـرية</option>');
                        $.each(result.dir, function (key, value) {
                            $("#dir-id").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                      }
        });
      });
    }); --}}

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   

 <script type="text/javascript">
  $(document).ready(function () {
      $('#gov_id').on('change', function () {
          var govId = this.value;
          
          $('#dir_id').html('');
          $.ajax({
              url: '{{ route('fetch-dir') }}?gov_id='+govId,
              type: 'get',
              success: function (res) {
                  $('#dir_id').html('<option value="">اختر المديرية</option>');
                  $.each(res, function (key, value) {
                      $('#dir_id').append('<option value="' + value
                          .dir_id + '">' + value.dir_name + '</option>');
                  });
                  // $('#city').html('<option value="">Select City</option>');
              }
          });
      });
    });
</script> 





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
</body>

</html>