@include('menu.menuMedUser')

      <!--form -->
    <div class="main-panel" >        
      <div class="content-wrapper">
         <div class="row" >
          <div class="col-md-6 grid-margin stretch-card col-lg-6 col-sm-12" style="margin-right:16em" >
             <div class="card">
                 <div class="card-body"  >
                    <h4 class="card-title " style="text-align: center ; font-size: 1.4em; color: #181f39 " > اضـافـة مـسـتـفـيـد </h4>
                     
             <form class="forms-sample  form-check-danger" method="POST" action="{{ url('/addben') }}" >
               @csrf
                <div class="form-group" style=" text-align: right ;"  >                  
                {{-- <input type="hidden" name="userid" value="{{ $user }}"> --}}
                  
                  <label for="ben_name" style="font-size: 1.2em ; padding-bottom: 1%"  >  اسـم المستفيد  </label> 
                {{-- <span class=" text-danger mr-2" style="color:"> يرجى كتابة الاسم كما هو موجود على الهوية </span> --}}

                  <input type="text" class="form-control" name="ben_name" id="ben_name" placeholder=" ادخـل اسم المستفيد كما هو موجود في الهوية" style="font-size: 1.1em " required>
                         <!-- رسالة التحقق من صحة البيانات المضافة -->
                         @error('ben_name')
                         <span class="text-danger"> {{ $message }}</span>
                                                   
                         @enderror
                               
                         <!-- نهاية رسالة التحقق من صحة البيانات المضافة -->

                                     
                  <br>
                  <label for="ben_cardnum" style="font-size: 1.2em ; padding-bottom: 1%"  > رقـم الهـويـة 
                    <span class=" text-danger mr-2" > رقم الهوية سيمثل اسم المستخدم </span>
                  </label>
               
 
                  <input type="text" class="form-control" name="ben_cardnum" id="ben_cardnum" placeholder="رقم الهوية" style="font-size: 1.1em "  maxlength="11" required>
                      <!-- رسالة التحقق من صحة البيانات المضافة -->
                         @error('ben_cardnum')
                         <span class="text-danger"> {{ $message }}</span>
                                    
                         @enderror
                
                      <!-- نهاية رسالة التحقق من صحة البيانات المضافة -->

                  
                  <br>
                  <label for="ben_phone" style="font-size: 1.2em ; padding-bottom: 1%"  > رقـم الهاتـف
                    <span class=" text-danger mr-2" > رقم الهاتف سيمثل كلمة المرور </span>

                  </label> 
                  <input type="tel" class="form-control" name="ben_phone" id="ben_phone" placeholder="رقم الهاتف" style="font-size: 1.1em " maxlength="9" required>
               

                  <!-- رسالة التحقق من صحة البيانات المضافة -->
                  @error('ben_phone')
                    <span class="text-danger"> {{ $message }}</span>
                    
                  @enderror

                    <!-- نهاية رسالة التحقق من صحة البيانات المضافة -->
                 
              <br>
             
              <label for="neigh_id" style="font-size: 1.2em ; padding-bottom: 1% ; padding-right: 0%"> الحي الذي يسكن فيه </label> 
          
            <input type="text" class="form-control"  placeholder="{{ $neigh->neigh_name }} " style="font-size: 1.1em "  maxlength="11" readonly> 
            <input type="text" value="{{  $neigh->neigh_id }} " name="neigh_id">

           
              {{-- <select class="form-control" name="neigh_id" required style="font-size: 1.2em">
                  @foreach ($neighborhood as $neighborhood ) 
             
                    <option value="{{ $neighborhood->neigh_id }}" style="font-size: 1.2em">
                      {{ $neighborhood->neigh_name}}
                    </option>
                    
                 @endforeach 
                </select> --}}

                 <!-- رسالة التحقق من صحة البيانات المضافة -->
                    @error('neigh_id')
                    <span class="text-danger"> {{ $message }}</span>
                               
                    @enderror
           
                 <!-- نهاية رسالة التحقق من صحة البيانات المضافة -->

                <br>
               
                <label for="allowed_in_month" style="font-size: 1.2em ; padding-bottom: 1%"  > درجـة الاحتيـاج</label> 
               
                <br>
                <input type="radio" value="8" name="allowed_in_month" id="حرجـة جـداً" style="margin-right: 15%; color: red">
                <label for="allowed_in_month" style="font-size: 1.2em ; padding-bottom: 1%; color: red"  > حرجـة جـداً</label> 
               <br>
                <input type="radio" value="6" name="allowed_in_month" id="حـرجـة" style="margin-right: 15%; color: rgb(255, 170, 13)">
                <label for="allowed_in_month" style="font-size: 1.2em ; padding-bottom: 1% ; color: rgb(255, 170, 13)"  > حـرجـة</label> 
                <br>

                <input type="radio"value="4" name="allowed_in_month"  style="margin-right: 15%;">
              
                <label for="allowed_in_month" style="font-size: 1.2em ; padding-bottom: 1% ; color: rgb(53, 194, 11)"  >  مـحـتـاج </label> 
                
                
                   <!-- رسالة التحقق من صحة البيانات المضافة -->
                   @error('allowed_in_month')
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