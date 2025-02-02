@include('menu.menuMedUser')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <!--welcome Amer--> 
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold text-center" style="color: #ADD8CE; font-size:2.5em">مرحبـاً بك {{ Auth::user()->name }} ..</h3>
                </div>
               
              </div>
            </div>
          </div>
           <!-- End welcome Amer-->
         
         
          {{-- <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Top Products</p>
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Price</th>
                          <th>Date</th>
                          <th>Status</th>
                        </tr>  
                      </thead>
                      <tbody>
                        <tr>
                          <td>Search Engine Marketing</td>
                          <td class="font-weight-bold">$362</td>
                          <td>21 Sep 2018</td>
                          <td class="font-weight-medium"><div class="badge badge-success">Completed</div></td>
                        </tr>
                        <tr>
                          <td>Search Engine Optimization</td>
                          <td class="font-weight-bold">$116</td>
                          <td>13 Jun 2018</td>
                          <td class="font-weight-medium"><div class="badge badge-success">Completed</div></td>
                        </tr>
                        <tr>
                          <td>Display Advertising</td>
                          <td class="font-weight-bold">$551</td>
                          <td>28 Sep 2018</td>
                          <td class="font-weight-medium"><div class="badge badge-warning">Pending</div></td>
                        </tr>
                        <tr>
                          <td>Pay Per Click Advertising</td>
                          <td class="font-weight-bold">$523</td>
                          <td>30 Jun 2018</td>
                          <td class="font-weight-medium"><div class="badge badge-warning">Pending</div></td>
                        </tr>
                        <tr>
                          <td>E-Mail Marketing</td>
                          <td class="font-weight-bold">$781</td>
                          <td>01 Nov 2018</td>
                          <td class="font-weight-medium"><div class="badge badge-danger">Cancelled</div></td>
                        </tr>
                        <tr>
                          <td>Referral Marketing</td>
                          <td class="font-weight-bold">$283</td>
                          <td>20 Mar 2018</td>
                          <td class="font-weight-medium"><div class="badge badge-warning">Pending</div></td>
                        </tr>
                        <tr>
                          <td>Social media marketing</td>
                          <td class="font-weight-bold">$897</td>
                          <td>26 Oct 2018</td>
                          <td class="font-weight-medium"><div class="badge badge-success">Completed</div></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-5 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">To Do Lists</h4>
									<div class="list-wrapper pt-2">
										<ul class="d-flex flex-column-reverse todo-list todo-list-custom">
											<li>
												<div class="form-check form-check-flat">
													<label class="form-check-label">
														<input class="checkbox" type="checkbox">
														Meeting with Urban Team
													</label>
												</div>
												<i class="remove ti-close"></i>
											</li>
											<li class="completed">
												<div class="form-check form-check-flat">
													<label class="form-check-label">
														<input class="checkbox" type="checkbox" checked>
														Duplicate a project for new customer
													</label>
												</div>
												<i class="remove ti-close"></i>
											</li>
											<li>
												<div class="form-check form-check-flat">
													<label class="form-check-label">
														<input class="checkbox" type="checkbox">
														Project meeting with CEO
													</label>
												</div>
												<i class="remove ti-close"></i>
											</li>
											<li class="completed">
												<div class="form-check form-check-flat">
													<label class="form-check-label">
														<input class="checkbox" type="checkbox" checked>
														Follow up of team zilla
													</label>
												</div>
												<i class="remove ti-close"></i>
											</li>
											<li>
												<div class="form-check form-check-flat">
													<label class="form-check-label">
														<input class="checkbox" type="checkbox">
														Level up for Antony
													</label>
												</div>
												<i class="remove ti-close"></i>
											</li>
										</ul>
                  </div>
                  <div class="add-items d-flex mb-0 mt-2">
										<input type="text" class="form-control todo-list-input"  placeholder="Add new task">
										<button class="add btn btn-icon text-primary todo-list-add-btn bg-transparent"><i class="icon-circle-plus"></i></button>
									</div>
								</div>
							</div>
            </div>
          </div>


          <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Projects</p>
                  <div class="table-responsive">
                    <table class="table table-borderless">
                      <thead>
                        <tr>
                          <th class="pl-0  pb-2 border-bottom">Places</th>
                          <th class="border-bottom pb-2">Orders</th>
                          <th class="border-bottom pb-2">Users</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="pl-0">Kentucky</td>
                          <td><p class="mb-0"><span class="font-weight-bold mr-2">65</span>(2.15%)</p></td>
                          <td class="text-muted">65</td>
                        </tr>
                        <tr>
                          <td class="pl-0">Ohio</td>
                          <td><p class="mb-0"><span class="font-weight-bold mr-2">54</span>(3.25%)</p></td>
                          <td class="text-muted">51</td>
                        </tr>
                        <tr>
                          <td class="pl-0">Nevada</td>
                          <td><p class="mb-0"><span class="font-weight-bold mr-2">22</span>(2.22%)</p></td>
                          <td class="text-muted">32</td>
                        </tr>
                        <tr>
                          <td class="pl-0">North Carolina</td>
                          <td><p class="mb-0"><span class="font-weight-bold mr-2">46</span>(3.27%)</p></td>
                          <td class="text-muted">15</td>
                        </tr>
                        <tr>
                          <td class="pl-0">Montana</td>
                          <td><p class="mb-0"><span class="font-weight-bold mr-2">17</span>(1.25%)</p></td>
                          <td class="text-muted">25</td>
                        </tr>
                        <tr>
                          <td class="pl-0">Nevada</td>
                          <td><p class="mb-0"><span class="font-weight-bold mr-2">52</span>(3.11%)</p></td>
                          <td class="text-muted">71</td>
                        </tr>
                        <tr>
                          <td class="pl-0 pb-0">Louisiana</td>
                          <td class="pb-0"><p class="mb-0"><span class="font-weight-bold mr-2">25</span>(1.32%)</p></td>
                          <td class="pb-0">14</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <p class="card-title">Charts</p>
                      <div class="charts-data">
                        <div class="mt-3">
                          <p class="mb-0">Data 1</p>
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="progress progress-md flex-grow-1 mr-4">
                              <div class="progress-bar bg-inf0" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mb-0">5k</p>
                          </div>
                        </div>
                        <div class="mt-3">
                          <p class="mb-0">Data 2</p>
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="progress progress-md flex-grow-1 mr-4">
                              <div class="progress-bar bg-info" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mb-0">1k</p>
                          </div>
                        </div>
                        <div class="mt-3">
                          <p class="mb-0">Data 3</p>
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="progress progress-md flex-grow-1 mr-4">
                              <div class="progress-bar bg-info" role="progressbar" style="width: 48%" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mb-0">992</p>
                          </div>
                        </div>
                        <div class="mt-3">
                          <p class="mb-0">Data 4</p>
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="progress progress-md flex-grow-1 mr-4">
                              <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mb-0">687</p>
                          </div>
                        </div>
                      </div>  
                    </div>
                  </div>
                </div> --}}
             <div class="col-md-4 stretch-card grid-margin" style=" margin-right:20%" >
              {{-- <div class="row"> --}}
                <div class="col-md-12 stretch-card grid-margin grid-margin-md-0 " >
                  <div class="card data-icon-card" style="background-color:#181f39 ">
                    <div class="card-body">
                           
                        <a href="allBen" style="text-decoration: none;" class="text-center">          
                          <div class="row">
                             <div class="col-12 text-white text-center" style=" padding-right: 1em;">
                               <h3> ما تم تأكيـده</h3>
                                 <h2 class="text-white font-weight-500 mb-0 " > {{ $ben }} </h2>
                          </div>
                         
                        {{-- <div class="col-4 background-icon" >
                        </div> --}}
                      </div>
                    </a>
                    </div>
                  </div>
                </div>

                
                  {{-- <div class="row"> --}}
                  <div class="col-md-12 stretch-card grid-margin grid-margin-md-0 " >
                    <div class="card data-icon-card" style="background-color:#181f39 ">

                      <div class="card-body">
                        
                        <a href="confben" style="text-decoration: none; " class="text-center">          
                        <div class="row text-center">
                          <div class="col-12 text-white text-center" style="padding-right: 1em;">
                            <h3> ما لم يتم تأكيـده </h3>
                            <h2 class="text-white font-weight-500 mb-0 " > {{ $bencount }} </h2>
                          </div>
                          {{-- <div class="col-4 background-icon" >
                          </div> --}}
                        
                        </div>
                      </a>
                      </div>
                    </div>
                  </div>
  
                {{-- </div> --}}


                    {{-- <div class="row"> --}}
                      {{-- <div class="col-md-12 stretch-card grid-margin grid-margin-md-0 " >
                        <div class="card data-icon-card" style="background-color:#181f39 ">
                          <div class="card-body">
                               
                            <a href="mediator" style="text-decoration: none; " class="text-center">                       
                              <div class="row text-center">
                              <div class="col-12 text-white text-center" style="padding-right: 0.9em;">
                                <h3 > عـدد الوسـطــاء</h3>
                                <h2 class="text-white font-weight-500 mb-0 " >  </h2>
                              </div> --}}
                              {{-- <div class="col-4 background-icon" >
                              </div> --}}
                            {{-- </div>
                          </a>
                          </div>
                        </div>
                      </div> --}}
      
                    {{-- </div> --}}

                      

                          

              {{-- </div> --}}
            </div>

            {{-- <div class="col-md-4 stretch-card grid-margin " > --}}
              {{-- <div class="row"> --}}
                 {{-- <div class="row"> --}}
                  {{-- <div class="col-md-12 stretch-card grid-margin grid-margin-md-0 " >
                    <div class="card data-icon-card" style="background-color:#181f39 ">
                      <div class="card-body">
                           
                        <a href="donation" style="text-decoration: none; " class="text-center">                       
                          <div class="row text-center">
                          <div class="col-12 text-white text-center" style="padding-right: 0.9em;">
                            <h3 > عـدد التـبـرعـات</h3>
                            <h2 class="text-white font-weight-500 mb-0 " >  </h2>
                          </div> --}}
                          {{-- <div class="col-4 background-icon" >
                          </div> --}}
                        {{-- </div>
                      </a>
                      </div>
                    </div>
                  </div> --}}
  
                {{-- </div> --}}
                
                  {{-- <div class="row"> --}}
                  {{-- <div class="col-md-12 stretch-card grid-margin grid-margin-md-0 " >
                    <div class="card data-icon-card" style="background-color:#181f39 ">

                      <div class="card-body">
                        
                        <a href="donors" style="text-decoration: none; " class="text-center">          
                        <div class="row text-center">
                          <div class="col-12 text-white text-center" style="padding-right: 1em;">
                            <h3> عـدد المـتـبـرعـيـن</h3>
                            <h2 class="text-white font-weight-500 mb-0 " > {{ $donor }} </h2>
                          </div>
                         
                        
                        </div>
                      </a>
                      </div>
                    </div>
                  </div> --}}
  
                {{-- </div> --}}


                    {{-- <div class="row"> --}}
                      {{-- <div class="col-md-12 stretch-card grid-margin grid-margin-md-0 " >
                        <div class="card data-icon-card" style="background-color:#181f39 ">
                          <div class="card-body">
                               
                            <a href="mediator" style="text-decoration: none; " class="text-center">                       
                              <div class="row text-center">
                              <div class="col-12 text-white text-center" style="padding-right: 0.9em;">
                                <h3 > عـدد التبرعات  المحجوزة</h3>
                                <h2 class="text-white font-weight-500 mb-0 " >  </h2>
                              </div> --}}
                              {{-- <div class="col-4 background-icon" >
                              </div> --}}
                            {{-- </div>
                          </a>
                          </div>
                        </div>
                      </div> --}}
      
                    {{-- </div> --}}

                     {{-- <div class="row"> --}}
                      {{-- <div class="col-md-12 stretch-card grid-margin grid-margin-md-0 " >
                        <div class="card data-icon-card" style="background-color:#181f39 ">
                          <div class="card-body">
                               
                            <a href="mediator" style="text-decoration: none; " class="text-center">                       
                              <div class="row text-center">
                              <div class="col-12 text-white text-center" style="padding-right: 0.9em;">
                                <h3 > عـدد التبرعات الغير المحجوزة</h3>
                                <h2 class="text-white font-weight-500 mb-0 " > 0 </h2>
                              </div> --}}
                              {{-- <div class="col-4 background-icon" >
                              </div> --}}
                            {{-- </div>
                          </a>
                          </div>
                        </div>
                      </div> --}}
      
                    {{-- </div> --}}

                        

                          

              {{-- </div> --}}
            </div>

            

           


            {{-- <div class="col-md-4 stretch-card grid-margin">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Notifications</p>
                  <ul class="icon-data-list">
                    <li>
                      <div class="d-flex">
                        <img src="images/faces/face1.jpg" alt="user">
                        <div>
                          <p class="text-info mb-1">Isabella Becker</p>
                          <p class="mb-0">Sales dashboard have been created</p>
                          <small>9:30 am</small>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="d-flex">
                        <img src="images/faces/face2.jpg" alt="user">
                        <div>
                          <p class="text-info mb-1">Adam Warren</p>
                          <p class="mb-0">You have done a great job #TW111</p>
                          <small>10:30 am</small>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="d-flex">
                      <img src="images/faces/face3.jpg" alt="user">
                     <div>
                      <p class="text-info mb-1">Leonard Thornton</p>
                      <p class="mb-0">Sales dashboard have been created</p>
                      <small>11:30 am</small>
                     </div>
                      </div>
                    </li>
                    <li>
                      <div class="d-flex">
                        <img src="images/faces/face4.jpg" alt="user">
                        <div>
                          <p class="text-info mb-1">George Morrison</p>
                          <p class="mb-0">Sales dashboard have been created</p>
                          <small>8:50 am</small>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="d-flex">
                        <img src="images/faces/face5.jpg" alt="user">
                        <div>
                        <p class="text-info mb-1">Ryan Cortez</p>
                        <p class="mb-0">Herbs are fun and easy to grow.</p>
                        <small>9:00 am</small>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div> --}}


          

          
          {{-- <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Advanced Table</p>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="example" class="display expandable-table" style="width:100%">
                          <thead>
                            <tr>
                              <th>Quote#</th>
                              <th>Product</th>
                              <th>Business type</th>
                              <th>Policy holder</th>
                              <th>Premium</th>
                              <th>Status</th>
                              <th>Updated at</th>
                              <th></th>
                            </tr>
                          </thead>
                      </table>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
        </div> --}}
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        {{-- <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer> --}}
        <!-- partial -->
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

