@include('menu.menuDir')

      <!--form -->
      <div class="main-panel" >        
        <div class="content-wrapper">
           <div class="row" >
            <div class="col-md-6 grid-margin stretch-card col-lg-6 " style="margin-right:16em" >
               <div class="card">
                   <div class="card-body"  >
  
                    <h4 class="card-title " style="text-align: center ; font-size: 1.4em; color: #181f39"> اضـافة مـديـريـة </h4>
                     
             <form class="forms-sample" method="POST" action="{{ url('/insertdir') }}" >
               @csrf
                <div class="form-group" style=" text-align: right ;" >
                  <label for="dir_name" style="font-size: 1.2em ; padding-bottom: 1%"  >اسـم المديريـة</label>
                  <input type="text" class="form-control" name="dir_name" id="dir_name" placeholder="اسم المديرية" style="font-size: 1.1em ">
                  {{-- @error('cat_name')
                    <span class="text-danger"> {{ $message }}</span>
                    
                  @enderror --}}
                  <br>
                  <label for="gov_id" style="font-size: 1.2em ; padding-bottom: 1% ; padding-right: 0%"> المحافظة التي تتبعها </label> 

                  <select  class="form-control" name="gov_id" style="font-size: 1.1em">
                    {{-- جلب اسماء المحافظات من قاعدة البيانات وعرضها  --}}
                    @foreach ( $governorate as $governorate )
                    <option  value="{{ $governorate->gov_id }}" style="font-size: 1.1em">
                        {{  $governorate->gov_name  }}    
                    </option>
                    @endforeach
                
                  </select>
                </div>
              
                
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