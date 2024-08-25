@include('menu.menuMed')



<div class="row col-lg-9" >
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


    <a href="viewAddMed" >
      <button type="button" class="btn " id ="button_add_donors" >  اضـافـة وسـيـط</button>
    </a>
        <div class="table-responsive">
          <table id="datatable" class="table table-striped table-borderless">
            <thead>
              <tr >
                
                <th style="font-size:  1em">رقم الوسيـط </th>
                <th style="font-size:  1em">اسـم الوسيـط</th>
                <th style="font-size:  1em">رقم الهويـة </th>
                <th style="font-size:  1em">رقم الهاتـف </th>
                <th style="font-size:  1em"> الحـي الـذي يسكـن فيـه </th>
                <th style="font-size:  1em">العمليات</th>
                
              </tr>  
            </thead>
            @foreach ($mediator as $mediator ) 
            <tbody >
              <tr>
                <td style="font-size: 1em" class="tmed_id"> {{ $mediator->id }}</td>
                <td class="font-weight-bold tmed_name" style="font-size:  1em">{{ $mediator->med_name }}</td>
                 <td class="font-weight-bold tmed_card" style="font-size:  1em"> {{ $mediator->med_cardnum}}</td>
                 <td class="font-weight-bold tmed_phone" style="font-size:  1em"> {{ $mediator->med_phone}}</td> 
                 <td class="font-weight-bold tneigh_id" style="font-size:  1em"> {{ $mediator->neighborhood->neigh_name}}</td> 

 
                <td> 
                 
                   <a href={{ "deleteMed/".$mediator['id'] }}>  <button type="button" class="btn btn-danger" style="font-weight: bolder; font-size: 1em">حـذف</button></a> 
                   <button type="button" class="btn editbtn" wire:click="editmed{{ $mediator->id  }}"  data-toggle="modal"  data-target="#editModal" style="font-weight: bolder; font-size: 1em" value="{{ $mediator->id }}" >تـعـديـل</button> 


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
              <h3 class="title"> تــعــديـــل الـوســـيـــط </h3>
             
              <div class="form-group">
                  
                 
              </div>
              <div class="form-group">
                <form action="{{ url('editmed') }}" method="POST" id="editForm">
                  @csrf
                  <input type="hidden" name="med_id" :value="$mediator->id" id="neigh_id">
                  <div class="form-group" style=" text-align: right ;" >
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
                <select class="form-control" name="neigh_id" required>
                   @foreach ($neighborhood as $neighborhood )
               
                      <option value="{{ $neighborhood->id }}">
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
   $('#med_id').val(_this.find('.tmed_id').text());
   $('#med_name').val(_this.find('.tmed_name').text());
   $('#neigh_name').val(_this.find('.neigh_id').text())     
   $('#med_cardnum').val(_this.find('.tmed_card').text());
   $('#med_phone').val(_this.find('.tmed_phone').text());
     
   



    });

    $(document).ready(function(){
          $(".alert").delay(5000).slideUp(300);
    });
</script>
</body>

</html>