@include('menu.menumeduser')



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


    <a href="benaddview" >
      <button type="button" class="btn " id ="button_add_donors" >  اضـافـة مـسـتـفيـد</button>
    </a>
        <div class="table table-responsive"  >
          <table id="datatable" class="table table-striped table-borderless" >
            <thead>
              <tr >
                
                <th style="font-size:  1em" >رقم المستفيـد </th>
                <th style="font-size:  1em">اسـم المستفيـد</th>
                <th style="font-size:  1em">رقم الهويـة </th>
                <th style="font-size:  1em">رقم الهاتـف </th>
                <th style="font-size:  1em"> الحـي الـذي يسكـن فيـه </th>
                {{-- <th style="font-size:  1em"> عدد الحجوازات المسموح بها </th> --}}
                <th style="font-size:  1em">العمليات</th>
                <th style="display:none;"> رقم المستخدم</th>
                
              </tr>  
            </thead>
            @foreach ($ben as $ben ) 
            <tbody  >
              <tr style="text-align: center" >
                 <td style="font-size: 1em" class="tben_id" > {{ $ben->id }} </td>
                 <td class="font-weight-bold tben_name" style="font-size:  1em">{{ $ben->user->name }} </td>
                 <td class="font-weight-bold tben_card" style="font-size:  1em"> {{ $ben->ben_cardnum}}</td>
                 <td class="font-weight-bold tben_phone" style="font-size:  1em"> {{ $ben->ben_phone}}</td>
                 <td class="font-weight-bold tneigh_name" style="font-size:  1em"> {{ $ben->neighborhood->neigh_name}}</td> 
                {{-- <td class="tallowed_in_month">
                 <input type="radio" value="8" name="allowed_in_month" id="حرجـة جـداً" style="margin-right: 15%; color: red " >
                 <label for="allowed_in_month" style="font-size: 1.2em ; padding-bottom: 1%; color: red; font-weight:bold" > حرجـة جـداً</label> 
                <br>
                 <input type="radio" value="6" name="allowed_in_month" id="حـرجـة" style="margin-right: 15%; color: rgb(255, 170, 13)">
                 <label for="allowed_in_month" style="font-size: 1.2em ; padding-bottom: 1% ; color: rgb(255, 170, 13) ; font-weight:bold"  > حـرجـة</label> 
                 <br>
 
                 <input type="radio" name="allowed_in_month" value="4" style="margin-right: 15%;" >
               
                 <label for="allowed_in_month" style="font-size: 1.2em ; padding-bottom: 1% ; color: rgb(53, 194, 11) ; font-weight:bold"  >  مـحـتـاج </label> 
                <br>
                 <input type="radio" name="allowed_in_month" value="4" style="margin-right: 15%;" >
               
                 <label for="allowed_in_month" style="font-size: 1.2em ; padding-bottom: 1% ; color: rgb(109, 110, 108); font-weight:bold"  >  غير محتاج </label> 

 --}}
 
                <td> 
                 
                   {{-- <a href={{ "deleteBen/".$ben['ben_id'] }}>  <button type="button" class="btn btn-danger" style="font-weight: bolder; font-size: 1em">حـذف</button></a> --}}
                   <button type="button" class="btn editbtn" wire:click="editben{{ $ben->id  }}"  data-toggle="modal"  data-target="#editModal" style="font-weight: bolder; font-size: 1em ;background-color: #181f39;" value="{{ $ben->id }}" >تأكيــد</button>  

                   {{-- <button type="button" class="btn editbtn"  style="font-weight: bolder; font-size: 1em ; background-color: #181f39;" value="{{ $ben->ben_id }}" >تأكيــد </button>  --}}

                </td>
                <td class=" tuser_id" style="display: none">{{ $ben->user->id }} </td>

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
              <h3 class="title"> تأكيـد أحقيـة المستفيـد </h3>
             
              <div class="form-group ">
                  
                 
              </div>
              <div class="form-group text-center">
                <form action="{{ url('editbenmed') }}" method="POST" id="editForm">
                  @csrf
                  <input type="hidden" name="id" :value="$ben->id" id="id">
                  <input type="hidden" name="user_id" :value="$ben->user->id" id="user_id">
                  <br>
                  <label for="allowed_in_month" style="font-size: 1.2em ; padding-bottom: 1%"  > درجـة الاحتيـاج</label> 
                   
                  <br>
                  <br>

                  <input type="radio" value="8" name="allowed_in_month" id="حرجـة جـداً" style=" margin-right:-50%;color: red" checked>
                  <label for="allowed_in_month" style="font-size: 1.2em ; padding-bottom: 1%; color: red"  > حرجـة جـداً</label> 
                 <br>
                  <input type="radio" value="6" name="allowed_in_month" id="حـرجـة" style=" margin-right:-20%; color: rgb(255, 170, 13)">
                  <label for="allowed_in_month" style="font-size: 1.2em ; padding-bottom: 1% ; color: rgb(255, 170, 13)"  > حـرجـة</label> 
                  <br>
  
                  <input type="radio" name="allowed_in_month" value="4" style=" margin-right:10%;" >
                
                  <label for="allowed_in_month" style="font-size: 1.2em ; padding-bottom: 1% ; color: rgb(53, 194, 11)"  >  مـحـتـاج </label> 
                  <br>
                  <input type="radio" name="allowed_in_month" value="0" style=" margin-right:50%;" >
                
                  <label for="allowed_in_month" style="font-size: 1.2em ; padding-bottom: 1% ; color: rgb(109, 110, 108); font-weight:bold"  >  غير محتاج </label> 
 
                  
                     <!-- رسالة التحقق من صحة البيانات المضافة -->
                     @error('allowed_in_month')
                     <span class="text-danger"> {{ $message }}</span>
                                
                     @enderror
            
                  <!-- نهاية رسالة التحقق من صحة البيانات المضافة -->

                      <input type="hidden" class="form-control" name="ben_name" id="ben_name" placeholder="اسم المستفيد" style="font-size: 1.1em " required>
                             <!-- رسالة التحقق من صحة البيانات المضافة -->
                             @error('ben_name')
                             <span class="text-danger"> {{ $message }}</span>
                                                       
                             @enderror
                                   
                             <!-- نهاية رسالة التحقق من صحة البيانات المضافة -->
    
                                         
                      <br>
                      {{-- <label for="ben_cardnum" style="font-size: 1.2em ; padding-bottom: 1%"  > رقـم الهـويـة </label>  --}}
                      <input type="hidden" class="form-control" name="ben_cardnum" id="ben_cardnum" placeholder="رقم الهوية" style="font-size: 1.1em "  maxlength="11" required>
                          <!-- رسالة التحقق من صحة البيانات المضافة -->
                             @error('ben_cardnum')
                             <span class="text-danger"> {{ $message }}</span>
                                        
                             @enderror
                    
                          <!-- نهاية رسالة التحقق من صحة البيانات المضافة -->
    
                      
                      <br>
                      {{-- <label for="ben_phone" style="font-size: 1.2em ; padding-bottom: 1%"  > رقـم الهاتـف</label>  --}}
                      <input type="hidden" class="form-control" name="ben_phone" id="ben_phone" placeholder="رقم الهاتف" style="font-size: 1.1em " maxlength="9" required>
                   
    
                      <!-- رسالة التحقق من صحة البيانات المضافة -->
                      @error('ben_phone')
                        <span class="text-danger"> {{ $message }}</span>
                        
                      @enderror
    
                        <!-- نهاية رسالة التحقق من صحة البيانات المضافة -->
                     
                  <br>
                  @foreach ($neigh as $neigh )

                  <input type="hidden" class="form-control"  placeholder="{{ $neigh->neigh_name }} " style="font-size: 1.1em "  maxlength="11" readonly> 
                  <input type="hidden" value="{{  $neigh->neigh_id }} " name="neigh_id">
    
    @endforeach
                     <!-- رسالة التحقق من صحة البيانات المضافة -->
                        @error('neigh_id')
                        <span class="text-danger"> {{ $message }}</span>
                                   
                        @enderror
               
                     <!-- نهاية رسالة التحقق من صحة البيانات المضافة -->
    
                    <br>
                   
                  </div>
                  <br>
                    
                
         <button type="submit" class="btn btn-primary col-lg-12" style="font-size: 1.1em ; background-color: #181f39 ; "> تأكيــد </button>

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
   $('#id').val(_this.find('.tben_id').text());
   $('#ben_name').val(_this.find('.tben_name').text());
   $('#neigh_name').val(_this.find('.neigh_id').text())     
   $('#ben_cardnum').val(_this.find('.tben_card').text());
   $('#ben_phone').val(_this.find('.tben_phone').text());
  //  $('input:radio[name="allowed_in_month"]:checked').val(_this.find('.tallowed_in_month'));
   $('#user_id').val(_this.find('.tuser_id').text());
   
 


    });

    $(document).ready(function(){
          $(".alert").delay(5000).slideUp(300);
    });

</script>
</body>

</html>