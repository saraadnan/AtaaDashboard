@include('menu.menuMed')

      <!--form -->
    <div class="main-panel" >        
      <div class="content-wrapper">
         <div class="row" >
          <div class="col-md-6 grid-margin stretch-card col-lg-6 col-sm-12" style="margin-right:16em" >
             <div class="card">
                 <div class="card-body"  >
                    <h4 class="card-title " style="text-align: center ; font-size: 1.4em; color: #181f39 " > اضـافـة وسـيـط </h4>
                     
             <form class="forms-sample" method="POST" action="{{ url('/insertmed') }}" >
               @csrf
                <div class="form-group" style=" text-align: right ;" >

                  {{-- <label for="neigh_id" style="font-size: 1.2em ; padding-bottom: 1%" > رقـم الحــي </label>
                  <input type="text" class="form-control" name="neigh_id" id="neigh_id"  value= "{{  $neighborhood }}" style="font-size: 1.1em " readonly> --}}
                  
                
                  
                  <label for="med_name" style="font-size: 1.2em ; padding-bottom: 1%"  > اسـم الوسـيـط</label> 
                  <input type="text" class="form-control" name="med_name" id="med_name" placeholder="اسم الوسيط" style="font-size: 1.1em " required>
                 <!-- رسالة التحقق من صحة البيانات المضافة -->
                         @error('med_name')
                           <span class="text-danger"> {{ $message }}</span>
                          @enderror
                 <!-- نهاية رسالة التحقق من صحة البيانات المضافة -->
                  <br>
                  <label for="med_cardnum" style="font-size: 1.2em ; padding-bottom: 1%"  >  رقـم الهـويـة 
                     <span class=" text-danger mr-2" > رقم الهوية سيمثل اسم المستخدم </span>
                  </label> 
                  <input type="text" class="form-control" name="med_cardnum" id="med_cardnum" placeholder="رقم الهوية" style="font-size: 1.1em " required maxlength="11">
                   <!-- رسالة التحقق من صحة البيانات المضافة -->
                    @error('med_cardnum')
                     <span class="text-danger"> {{ $message }}</span>
                    @enderror
                  <!-- نهاية رسالة التحقق من صحة البيانات المضافة -->
               <br>
                  <label for="med_phone" style="font-size: 1.2em ; padding-bottom: 1%"  > رقـم الهاتـف
                    <span class=" text-danger mr-2" > رقم الهاتف سيمثل كلمة المرور </span>
                  </label> 
                  <input type="text" class="form-control" name="med_phone" id="med_phone" placeholder="رقم الهاتف" style="font-size: 1.1em " required maxlength="9" >
                   <!-- رسالة التحقق من صحة البيانات المضافة -->
                   @error('med_phone')
                   <span class="text-danger"> {{ $message }}</span>
                   @enderror
                   <!-- نهاية رسالة التحقق من صحة البيانات المضافة -->
                 
              <br>
             
              <label for="neigh_name" style="font-size: 1.2em ; padding-bottom: 1% ; padding-right: 0%"> الحي الذي يسكن فيه </label> 
              <select class="form-control" name="neigh_id" required style="font-size: 1.2em">
                 @foreach ($neighborhood as $neighborhood )
             
                    <option value="{{ $neighborhood->neigh_id }}">
                    {{ $neighborhood->neigh_name }}  

                    </option>
                    
                @endforeach
                </select>
                 <!-- رسالة التحقق من صحة البيانات المضافة -->
                  @error('neigh_id')
                   <span class="text-danger"> {{ $message }}</span>
                 @enderror
               <!-- نهاية رسالة التحقق من صحة البيانات المضافة -->
                <br>

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