@include('menu.menuGov')

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
              <a href="viewAddUser" >
                <button type="button" class="btn " id ="button_add_donors" >اضـافة مستخـدم</button>
              </a>
              <div class="table-responsive">
                <table id="datatable" class="table table-striped table-borderless text-center">
                  <thead>
                    <tr >
                      
                      <th style="font-size:  1em">رقم السمتخدم</th>
                      <th style="font-size:  1em">اسـم المستخدم</th>
                      <th style="font-size:  1em">الاسـم</th>
                      <th style="font-size:  1em">اسـم الصلاحية</th>
                      <th style="font-size:  1em">العمليات</th>
                      <th style="display:none;">كلمة المرور</th>
                      <th style="display:none;"> كلمة المرور غير مشفرة</th>

                      
                    </tr>  
                  </thead>
                  @foreach ($user as $user )
                  <tbody >
                    <tr>
                      <td style="font-size: 1em" class="tid">  {{ $user->id }}</td>
                      <td class="font-weight-bold tusername" style="font-size:  1em" >{{ $user->username }}</td>
                      <td class="font-weight-bold tname" style="font-size:  1em" >{{ $user->name }}</td>
                      @if ($user->user_type_id == 2)
                      <td class="font-weight-bold trole" style="font-size:  1em" >متبـرع</td>
                      @endif
                      @if ($user->user_type_id == 1)
                      <td class="font-weight-bold trole" style="font-size:  1em" >مستفيد</td>
                      @endif
                      @if ($user->user_type_id == 3)
                      <td class="font-weight-bold trole" style="font-size:  1em" >وسيط</td>
                      @endif

                      @if ($user->user_type_id == 0)
                      @foreach($user->roles as $role) 
                     {{-- @empty({{ $role->name }})
                     <td class="font-weight-bold trole" style="font-size:  1em" >------</td>

                     @endempty --}}
                      <td class="font-weight-bold trole" style="font-size:  1em" >{{ $role->display_name }}</td>
                      @endforeach
                      @endif
                      <td>
                       
                         <button type="button" class="btn editbtn" wire:click="editgov{{ $user->id }}"  data-toggle="modal"  data-target="#editModal" style="font-weight: bolder; font-size: 1em" value="{{ $user->id }}" >تـعـديـل</button> 
                         <a href={{ "deleteUser/".$user['id'] }}> <button type="button" class="btn btn-primary"  style="font-weight: bolder; font-size: 1em; background-color: #c5abb5 ; border-color: #181f39" value="{{ $user->id }}" >الغاء التفعيل</button> 

                      </td>

                      <td class=" tpassword" style="display: none" >{{ $user->password }} </td>
                      <td class=" tcnf_password" style="display: none" >{{ $user->cnf_password }} </td>

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
                          <h3 class="title"> تعديـل المستخـدم </h3>
                         
                          <div class="form-group">
                              
                             
                          </div>
                          <div class="form-group">
                            <form action="{{ url('edituser') }}" method="POST" id="editForm">
                              @csrf
                              <input type="hidden" name="id" :value="$user->id" id="id">
                              <input type="hidden" name="password" :value="$user->password" id="password">
                              <input type="hidden" name="cnf_password" :value="$user->cnf_password" id="cnf_password">

                              <div class="form-group" style=" text-align: right ;" >
                              {{-- <label for="govId" style="font-size: 1.2em ; padding-bottom: 1%"  >رقـم المحافظـة</label> --}}
                               {{-- <input type="text" class="form-control" name="gov_id" :value="$governorates->id" id="gov_id" placeholder="رقـم المحافظـة" style="font-size: 1.1em " readonly> --}}
                               <br>

                               <label for="username" style="font-size: 1.2em ; padding-bottom: 1%"  >اسـم المستخـدم</label>
                              <input type="text" class="form-control" name="username" id="username" placeholder="اسم المستخدم" style="font-size: 1.1em " autofocus required>
                       
                              <label for="name" style="font-size: 1.2em ; padding-bottom: 1%"  > الاسـم</label>
                              <input type="text" class="form-control" name="name" id="name" placeholder="الاسـم" style="font-size: 1.1em " autofocus required>

                              <br>
                              <label for="role_id" style="font-size: 1.2em ; padding-bottom: 1%"  > الصلاحيـة</label>
                                <select  class="form-control"  name='role_id' style="font-size: 1.2em ;">
                                    <option value='0'> مدير النظـام </option>
                                    <option value='2'> مـتـبـرع </option>
                                    <option value='1'> مـستـفيـد </option>
                                    <option value='3'> وسـيـط </option>
                
                                </select>
                         
                      <br>
                     <button type="submit" class="btn btn-primary col-lg-12" style="font-size: 1.1em ; background-color: #181f39 ; "> تعديـل </button>
     
                            </form> 
                          </div>
                      </div>
                  </div>
              </div>
               <!--End Edit Modal -->


          </div>
      </div>
  </div>
  </div>
  </div>


           
                
         
 
      

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
  
  
  <script>
  
    $(document).on('click','.editbtn', function (e) {
     var _this = $(this).parents('tr');
     //لاضافة القيم في الحقول
     $('#id').val(_this.find('.tid').text());
     $('#name').val(_this.find('.tname').text());
     $('#username').val(_this.find('.tusername').text());
     $('#password').val(_this.find('.tpassword').text());
     $('#cnf_password').val(_this.find('.tcnf_password').text());



     
  


      });


      $(document).ready(function(){
          $(".alert").delay(5000).slideUp(300);
    });
 

  </script>

</body>

</html>