@include('include.adminheader')



  <div class="b-hor-example-divider"></div>

   <div class="container-fluid">
         
<main class="admin"> 
 
 

  <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
       
      <span class="fs-4">Menu</span>
    </a>
    <hr>
    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                <a class="nav-link text-white text-center bg-dark my-2" id="v-pills-doctor-tab" data-bs-toggle="pill" data-bs-target="#v-pills-doctor" type="button" role="tab" aria-controls="v-pills-doctor" aria-selected="true">Doctor's Profile</a>

                <a class="nav-link text-white text-center bg-dark my-2" id="v-pills-subscription-tab" data-bs-toggle="pill" data-bs-target="#v-pills-subscription" type="button" role="tab" aria-controls="v-pills-subscription" aria-selected="false">Subscription</a>

                <a class="nav-link text-white text-center bg-dark my-2" id="v-pills-cc-tab" data-bs-toggle="pill" data-bs-target="#v-pills-cc" type="button" role="tab" aria-controls="v-pills-cc" aria-selected="false">C/C Cheif Complaints</a>

                <a class="nav-link text-white text-center bg-dark my-2" id="v-pills-cf-tab" data-bs-toggle="pill" data-bs-target="#v-pills-cf" type="button" role="tab" aria-controls="v-pills-cf" aria-selected="false">C/F Clinical Findings</a>
                
                <a class="nav-link text-white text-center bg-dark my-2" id="v-pills-investigation-tab" data-bs-toggle="pill" data-bs-target="#v-pills-investigation" type="button" role="tab" aria-controls="v-pills-investigation" aria-selected="false">Investigation</a>
                
                <a class="nav-link text-white text-center bg-dark my-2" id="v-pills-tp-tab" data-bs-toggle="pill" data-bs-target="#v-pills-tp" type="button" role="tab" aria-controls="v-pills-tp" aria-selected="false">T/P Treatment Plans</a>
                
                <a class="nav-link text-white text-center bg-dark my-2" id="v-pills-medicine-tab" data-bs-toggle="pill" data-bs-target="#v-pills-medicine" type="button" role="tab" aria-controls="v-pills-medicine" aria-selected="false">Medicine</a>
                
                
            </div>
  </div>
 

  <div class="b-example-divider"></div>

  <div class="tab-content m-5 w-100" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-doctor" role="tabpanel" aria-labelledby="v-pills-doctor-tab">
                    <div class="d-flex justify-content-between">
                        <h4 class="">
                            Doctors List
                        </h4>
                        <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#doctor_Add" >
                          <i class="bi bi-plus-circle"></i>
                        </a>
                    </div>
                    <!-- Doctor List-->
                    <table class="table table-bordered mt-4 text-center">
                        <thead>
                            <tr>
                                <th class="">Serial No</th>
                                <th class="">Doctor Name</th>
                                <th class="">BMDC</th>
                                <th class="">Contact No.</th>
                                <th class="">Email</th>
                                <th class="">Status</th>
                                <th class="">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach($doctors as $key=>$doctor)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$doctor->fname." ".$doctor->lname}}</td>
                                <td>{{$doctor->BMDC}}</td>
                                <td>{{$doctor->phone}}</td>
                                <td>{{$doctor->email}}</td>
                                <td>
                                    @if($doctor->status == 1)
                                        <a href="{{route('doctor_status',[$doctor->id])}}" class="btn btn-sm btn-danger my-0">Block</a>
                                    @else
                                        <a href="{{route('doctor_status',[$doctor->id])}}" class="btn btn-sm btn-success my-0">Unblock</a>
                                    @endif
                                </td>
                                <td class="d-flex justify-content-around">
                                    <button type="button" class="btn crud-btns Doctor_editbtn" href="" value="{{$doctor->id}}" >
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button class="btn crud-btns delete-doctor" href="#" value="{{$doctor->id}}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                         @endforeach
                        </tbody>
                    </table>
                  <!--Doctor list end -->
                </div>
                <div class="tab-pane fade" id="v-pills-subscription" role="tabpanel" aria-labelledby="v-pills-subscription-tab">
                  <div class="mb-2">
                    <!-- <h4>Permanent Redeem Code</h4> -->
                    <h4>Temporary Redeem Code</h4>
                  </div>
                  <h4>Subscription List</h4>
                  <!-- Subscription List-->
                  <table class="table table-bordered mt-4 text-center">
                      <thead>
                          <tr>
                              <th class="">Serial No</th>
                              <th class="">Doctor Id</th>
                              <!-- <th class="">Doctor Name</th> -->
                              <!-- <th class="">BMDC</th> -->
                              <th class="">Package Name</th>
                              <th class="">Package Price</th>
                              <th class="">Duration</th>
                              <th class="">From</th>
                              <th class="">To</th>
                              <th class="">Status</th>
                              <th class="">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($subscription_lists as $key=>$subscription_list)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$subscription_list->d_id}}</td>
                            <td>{{$subscription_list->package_name}}</td>
                            <td>{{$subscription_list->package_price}}</td>
                            <td>{{$subscription_list->duration}} month</td>
                            <td>{{$subscription_list->start}}</td>
                            <td>{{$subscription_list->end}}</td>
                            <td>
                                @if($subscription_list->status == 1)
                                    <a href="{{route('subscription_status',[$subscription_list->id])}}" class="btn btn-sm btn-success my-0">Paid</a>
                                @else
                                    <a href="{{route('subscription_status',[$subscription_list->id])}}" class="btn btn-sm btn-danger my-0">Unpaid</a>
                                @endif
                            </td>
                            <td class="d-flex justify-content-around">
                                <!-- <button type="button" class="btn crud-btns CC_editbtn" href="" value="" >
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button> -->
                                <button class="btn crud-btns delete-subscribtion" href="#" value="{{$subscription_list->id}}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                  </table>
                  <!--Subscription list end -->
                </div>
                <div class="tab-pane fade" id="v-pills-cc" role="tabpanel" aria-labelledby="v-pills-cc-tab">
                  <div class="d-flex justify-content-between">
                        <h4 class="">
                         Chief Complaint List
                        </h4>
                        <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#chife_Complaint_Add" >
                          <i class="bi bi-plus-circle"></i>
                        </a>
                  </div>
                  <!-- C/C Chief Complaint List-->
                  <table class="table table-bordered mt-4 text-center">
                      <thead>
                          <tr>
                              <th class="">Serial No</th>
                              <th class="">Chief Complaints</th>
                              <th class="">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($lc_cs as $key=>$lcc)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$lcc->name}}</td>
                            <td class="d-flex justify-content-around">
                                <button type="button" class="btn crud-btns CC_editbtn" href="" value="{{$lcc->id}}" >
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button class="btn crud-btns delete-cc" href="#" value="{{$lcc->id}}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                  </table>
                  {{ $lc_cs ->links() }}
                  <!--C/C Chief Complaint list end -->
                </div>
                <div class="tab-pane fade" id="v-pills-cf" role="tabpanel" aria-labelledby="v-pills-cf-tab">
                  <div class="d-flex justify-content-between">
                        <h4 class="">
                          Clinical Findings List
                        </h4>
                        <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Clinical_Finding_Add" >
                          <i class="bi bi-plus-circle"></i>
                        </a>
                  </div>
                  <!-- C/F Clinical Findings List-->
                  <table class="table table-bordered mt-4 text-center">
                      <thead>
                          <tr>
                              <th class="">Serial No</th>
                              <th class="">Clinical Findings</th>
                              <th class="">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($lc_fs as $key=>$lcf)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$lcf->name}}</td>
                            <td class="d-flex justify-content-around">
                                <button class="btn crud-btns CF_editbtn" href="" value= "{{$lcf->id}}" >
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button class="btn crud-btns delete-cf" href="#" value= "{{$lcf->id}}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                  <!--C/F Clinical Findings list end -->
                </div>
                <div class="tab-pane fade" id="v-pills-investigation" role="tabpanel" aria-labelledby="v-pills-investigation-tab">
                  <div class="d-flex justify-content-between">
                        <h4 class="">
                          Investigation List
                        </h4>
                        <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Investigation_Add" >
                          <i class="bi bi-plus-circle"></i>
                        </a>
                    </div>
                  <!-- Investigation List-->
                  <table class="table table-bordered mt-4 text-center">
                      <thead>
                          <tr>
                              <th class="">Serial No</th>
                              <th class="">Investigations</th>
                              <th class="">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($investigation_lists as $key=>$investigation_list)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$investigation_list->name}}</td>
                            <td class="d-flex justify-content-around">
                                <button class="btn crud-btns Investigation_editbtn" href="" value= "{{$investigation_list->id}}" >
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button class="btn crud-btns delete-Investigation" href="#" value= "{{$investigation_list->id}}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                      
                  </table>
                  <!--Investigation list end -->
                </div>
                <div class="tab-pane fade" id="v-pills-tp" role="tabpanel" aria-labelledby="v-pills-tp-tab">
                  <div class="d-flex justify-content-between">
                      <h4 class="">
                      Treatment Plans List
                      </h4>
                      <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Treatment_Plan_Add" >
                        <i class="bi bi-plus-circle"></i>
                      </a>
                  </div>
                  <!-- T/P Treatment Plans List-->
                  <table class="table table-bordered mt-4 text-center">
                      <thead>
                          <tr>
                              <th class="">Serial No</th>
                              <th class="">Treatment Plans</th>
                              <!-- <th class="">Cost</th> -->
                              <th class="">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($lt_ps as $key=>$ltp)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$ltp->name}}</td>
                            <!-- <td>{{$ltp->cost}}</td> -->
                            <td class="d-flex justify-content-around">
                                <button class="btn crud-btns TP_editbtn" href="" value="{{$ltp->id}}" >
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button class="btn crud-btns delete-tp" href="#" value="{{$ltp->id}}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                      
                  </table>
                  <!--T/P Treatment Plans list end -->
                </div>
                <div class="tab-pane fade" id="v-pills-medicine" role="tabpanel" aria-labelledby="v-pills-medicine-tab">
                  <div class="d-flex justify-content-between">
                    <h4 class="">
                      Medicine List
                    </h4>
                    <a class="crud-btns me-2 add_medicine" href="" data-bs-toggle="modal" data-bs-target="#Medicine_Add" >
                      <i class="bi bi-plus-circle"></i>
                    </a>
                  </div>
                  <!-- Medicine List-->
                  <table class="table table-bordered mt-4 text-center">
                      <thead>
                        <tr>
                          <th class="">Serial No</th>
                          <th class="">Medicine Name</th>
                          <th class="">Brand Name</th>
                          <th class="">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($medicines_lists as $key=>$medicines_list)
                        <tr>
                          <td>{{$key + 1}}</td>
                          <td>{{$medicines_list->name}}</td>
                          <td>{{$medicines_list->brand}}</td>
                          <td class="d-flex justify-content-around">
                            <button type="button" class="btn crud-btns Medicine_editbtn" value="{{$medicines_list->id}}" >
                              <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button class="btn crud-btns delete-Medicine" value="{{$medicines_list->id}}">
                              <i class="fa-solid fa-trash"></i>
                            </button>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                  </table>
                  <!--Medicine list end -->
                </div>
            </div>
</main>
   </div>

       <!-- Modal For Doctor Add -->
 <div class="modal fade " id="doctor_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Add Doctor Information 
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{route('doctor_add')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-floating ">
                            <input type="name" name="fname" class="form-control custom-form-control mb-2" placeholder="name@example.com" value="{{ old('name') }}">
                            <label for="floatingInput">First Name</label>
                        </div>
                        <div class="form-floating ">
                            <input type="name" name="lname" class="form-control custom-form-control mb-2" placeholder="name@example.com" value="{{ old('name') }}">
                            <label for="floatingInput">Last Name</label>
                        </div>
                        
                        <div class="form-floating ">
                            <input type="email" name="email" class="form-control custom-form-control mb-2" placeholder="name@example.com" value="{{ old('email') }}">
                            <label for="floatingInput">Email address</label>
                        </div>
                        
                        <!-- <div class="form-floating ">
                            <input type="text" name="mobile" class="form-control mb-2" placeholder="Name">
                            <label for="floatingInput">Mobile Number</label>
                        </div> -->
                        <!-- <div class="form-floating">
                            <input type="text" name="BMDC" class="form-control mb-2" placeholder="BMDC Registration No.">
                            <label for="bmdcID">BMDC Registration No.</label>
                        </div> -->
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control custom-form-control mb-2" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                        <button type="submit" class="btn btn-sm btn btn-sm btn-outline-blue-grey">Add</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
 </div>
 <!-- Modal end -->
 <!-- Modal For Doctor update -->
 <div class="modal fade " id="Doctor_Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Edit Doctor Information 
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{route('update_doctor')}}" method="post">
                    @csrf
                    @method('PUT')

                    <input type="hidden" id="DoctorId" name="doctor_id"/>
                    <div class="modal-body">
                        <div class="form-floating ">
                            <input type="name" name="name"  id="d_name" class="form-control custom-form-control mb-2" placeholder="name@example.com" value="{{ old('name') }}">
                            <label for="floatingInput">Name</label>
                        </div>
                        
                        <div class="form-floating ">
                            <input type="email" name="email" id="d_email" class="form-control custom-form-control mb-2" placeholder="name@example.com" value="{{ old('email') }}">
                            <label for="floatingInput">Email address</label>
                        </div>
                        
                        <div class="form-floating ">
                            <input type="text" name="mobile" id="d_mobile" class="form-control mb-2" placeholder="Name">
                            <label for="floatingInput">Mobile Number</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" name="BMDC" id="d_bmdc" class="form-control mb-2" placeholder="BMDC Registration No.">
                            <label for="bmdcID">BMDC Registration No.</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" name="chember_name" id="d_c_name" class="form-control mb-2" placeholder="chamberName">
                            <label for="chamberName">Chamber Name</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" name="chember_add" id="d_c_add" class="form-control mb-2" placeholder="chamberAddress">
                            <label for="chamberAddress">Chamber Address</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                        <button type="submit" class="btn btn-sm btn-outline-blue-grey">Update</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
 </div>
 <!-- Modal end -->

    <!-- Modal For Delete Doctor -->
    <div class="modal fade " id="del-Doctor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">
                        Delete Doctor Information
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('delete_doctor')}}" method="POST" >
                        @csrf
                        @method('delete')
                        <div class="mb-3 text-center">
                            <h5 class="text-danger">Are You Sure to Delete This information?</h5>
                        </div>
                        <input type="hidden" id="del-doctor-id" name="deletingId">
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-blue-grey  btn-sm">Yes,Delete</button>
                        <!-- Modal Footer end -->
                        </div>
                    </form>
                </div>
                <!-- Modal Body end -->
            </div>
        </div>
    </div>
 <!-- Modal end -->

  <!-- Modal For Delete Subscribtion -->
  <div class="modal fade " id="del-Subscribtion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">
                        Delete Subscribtion
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('delete_subscription')}}" method="POST" >
                        @csrf
                        @method('delete')
                        <div class="mb-3 text-center">
                            <h5 class="text-danger">Are You Sure to Delete This information?</h5>
                        </div>
                        <input type="hidden" id="del-subscribtion-id" name="deletingId">
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-blue-grey  btn-sm">Yes,Delete</button>
                        <!-- Modal Footer end -->
                        </div>
                    </form>
                </div>
                <!-- Modal Body end -->
            </div>
        </div>
    </div>
 <!-- Modal end -->

    <!-- Modal For C/C Chief Complaint Add -->
 <div class="modal fade " id="chife_Complaint_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Add Cheif Complaint 
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{route('chife_complaint')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <input class="form-control custom-form-control" list="list" placeholder="Enter New Cheif Complaint" name="cc_name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                        <button type="submit" class="btn btn-sm btn btn-sm btn-outline-blue-grey">Confirm</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
 </div>
 <!-- Modal end -->
 <!-- Modal For C/C Chief Complaint update -->
 <div class="modal fade " id="chife_Complaint_Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Edit Cheif Complaint 
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{route('update_chife_complaint')}}" method="post">
                    @csrf
                    @method('PUT')

                    <input type="hidden" id="CCId" name="c_c_id"/>
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" id="c_c_name" placeholder="Enter New Chief Complaint" name="cc_name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                        <button type="submit" class="btn btn-sm btn-outline-blue-grey">Update</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
 </div>
 <!-- Modal end -->
 <!-- Modal For Delete C/C Chief Complaint -->
    <div class="modal fade " id="del-CC" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">
                        Delete C/C Chief Complaint
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('delete_chife_complaint')}}" method="POST" >
                        @csrf
                        @method('delete')
                        <div class="mb-3 text-center">
                            <h5 class="text-danger">Are You Sure to Delete This information?</h5>
                        </div>
                        <input type="hidden" id="del-cc-id" name="deletingId">
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-blue-grey  btn-sm">Yes,Delete</button>
                        <!-- Modal Footer end -->
                        </div>
                    </form>
                </div>
                <!-- Modal Body end -->
            </div>
        </div>
    </div>
 <!-- Modal end -->

     <!-- Modal For C/F Clinical Findings Add -->
  <div class="modal fade " id="Clinical_Finding_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Add Clinical Finding 
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{route('clinical_finding')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" placeholder="Enter New Clinical Finding" name="cf_name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                        <button type="submit" class="btn btn-sm btn-outline-blue-grey">Confirm</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
 </div>
 <!-- Modal end -->
  <!-- Modal For C/F Clinical Findings update -->
  <div class="modal fade " id="Clinical_Finding_Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Edit  Clinical Finding 
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{route('update_clinical_finding')}}" method="post">
                    @csrf
                    @method('PUT')

                    <input type="hidden" id="CFId" name="c_f_id"/>
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" id="c_f_name" placeholder="Enter New Clinical Finding" name="cf_name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                        <button type="submit" class="btn btn-sm btn-outline-blue-grey">Update</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
 </div>
 <!-- Modal end -->
 <!-- Modal For Delete C/F Clinical Findings -->
 <div class="modal fade " id="del-CF" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">
                        Delete C/F Clinical Findings
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('delete_clinical_finding')}}" method="POST" >
                        @csrf
                        @method('delete')
                        <div class="mb-3 text-center">
                            <h5 class="text-danger">Are You Sure to Delete This information?</h5>
                        </div>
                        <input type="hidden" id="del-cf-id" name="deletingId">
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-blue-grey  btn-sm">Yes,Delete</button>
                        <!-- Modal Footer end -->
                        </div>
                    </form>
                </div>
                <!-- Modal Body end -->
            </div>
        </div>
 </div>
 <!-- Modal end -->

    <!-- Modal For Investigation Add -->
  <div class="modal fade " id="Investigation_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Add Investigation 
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{route('investigation')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" placeholder="Enter New Investigation" name="investigation_name">
                            <input type="hidden" name="investigation_status" id="investigation_status" value="1" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                        <button type="submit" class="btn btn-sm btn-outline-blue-grey">Confirm</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
  </div>
 <!-- Modal end -->
 <!-- Modal For Investigation update -->
    <div class="modal fade " id="Investigation_Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">
                        Edit  Investigation 
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('update_investigation')}}" method="post">
                        @csrf
                        @method('PUT')

                        <input type="hidden" id="InvestigationId" name="investigation_id"/>
                        <div class="modal-body">
                            <div class="mb-3 drug-name">
                                <input class="form-control" list="list" id="Investigation_name" placeholder="Enter Investigation" name="investigation_name">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                            <button type="submit" class="btn btn-sm btn-outline-blue-grey">Update</button>
                        </div>
                    </form>
                </div>
                <!-- Modal Body end -->
            </div>
        </div>
    </div>
 <!-- Modal end -->
 <!-- Modal For Delete Investigation -->
 <div class="modal fade " id="del-Investigation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">
                        Delete Investigation
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('delete_investigation')}}" method="POST" >
                        @csrf
                        @method('delete')
                        <div class="mb-3 text-center">
                            <h5 class="text-danger">Are You Sure to Delete This information?</h5>
                        </div>
                        <input type="hidden" id="del-Investigation-id" name="deletingId">
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-blue-grey  btn-sm">Yes,Delete</button>
                        <!-- Modal Footer end -->
                        </div>
                    </form>
                </div>
                <!-- Modal Body end -->
            </div>
        </div>
 </div>
 <!-- Modal end -->

    <!-- Modal For T/P Treatment Plans Add -->
 <div class="modal fade " id="Treatment_Plan_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Add Treatment Plan 
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{route('treatment_plan')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" placeholder="Enter New Treatment Plan" name="tp_name">
                        </div>
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" placeholder="Enter Cost" name="tp_cost">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                        <button type="submit" class="btn btn-sm btn-outline-blue-grey">Confirm</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
 </div>
 <!-- Modal end -->
   <!-- Modal For T/P Treatment Plans update -->
 <div class="modal fade " id="Treatment_Plan_Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Edit  Treatment Plan 
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{route('update_treatment_plan')}}" method="post">
                    @csrf
                    @method('PUT')

                    <input type="hidden" id="TPId" name="t_p_id"/>
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" id="t_p_name" placeholder="Enter New Clinical Finding" name="tp_name">
                        </div>
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" id="t_p_cost" placeholder="Enter Cost" name="tp_cost">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                        <button type="submit" class="btn btn-sm btn-outline-blue-grey">Update</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
 </div>
 <!-- Modal end -->
 <!-- Modal For Delete T/P Treatment Plans -->
 <div class="modal fade " id="del-TP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">
                        Delete T/P Treatment Plans
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('delete_treatment_plan')}}" method="POST" >
                        @csrf
                        @method('delete')
                        <div class="mb-3 text-center">
                            <h5 class="text-danger">Are You Sure to Delete This information?</h5>
                        </div>
                        <input type="hidden" id="del-TP-id" name="deletingId">
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-blue-grey  btn-sm">Yes,Delete</button>
                        <!-- Modal Footer end -->
                        </div>
                    </form>
                </div>
                <!-- Modal Body end -->
            </div>
        </div>
 </div>
 <!-- Modal end -->

   <!-- Modal For medicine Add -->
  <div class="modal fade " id="Medicine_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content new-medicine-modal">
              <!-- Modal Header & Close btn -->
              <div class="modal-header">
                  <h5 class="modal-title text-dark" id="exampleModalLabel">
                      Add New Medicine 
                  </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <!-- Modal Header & Close btn end -->
              <!-- Modal Body -->
              <div class="modal-body">
                  <form action="{{route('medicine_add')}}" method="post">
                      @csrf
                      <div class="modal-body">
                          <div class="mb-3 drug-name">
                              <input class="form-control" list="list" placeholder="Enter New medicine" name="medicine_name">
                          </div>
                          <div class="mb-3 drug-name">
                              <input class="form-control" list="list" placeholder="Enter medicine Brand" name="medicine_brand">
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                          <button type="submit" class="btn btn-sm btn-black">Confirm</button>
                      </div>
                  </form>
              </div>
              <!-- Modal Body end -->
          </div>
      </div>
  </div>
  <!-- Modal end -->
  <!-- Modal For Medicine update -->
  <div class="modal fade " id="Medicine_Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable ">
          <div class="modal-content edit-medicine-info-modal">
              <!-- Modal Header & Close btn -->
              <div class="modal-header">
                  <h5 class="modal-title text-dark" id="exampleModalLabel">
                      Edit Medicine Info 
                  </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <!-- Modal Header & Close btn end -->
              <!-- Modal Body -->
              <div class="modal-body">
                  <form action="{{route('update_medicine')}}" method="post">
                      @csrf
                      @method('PUT')

                      <input type="hidden" id="MedicineId" name="medicine_id"/>
                      <div class="modal-body">
                          <div class="mb-3 drug-name">
                              <input class="form-control" list="list" id="Medicine_name" placeholder="Enter Medicine Name" name="medicine_name">
                          </div>
                          <div class="mb-3 drug-name">
                              <input class="form-control" list="list" id="Medicine_brand" placeholder="Enter Medicine Brand" name="medicine_brand">
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                          <button type="submit" class="btn btn-sm btn-black">Update</button>
                      </div>
                  </form>
              </div>
              <!-- Modal Body end -->
          </div>
      </div>
  </div>
 <!-- Modal end -->
  <!-- Modal For Delete Medicine -->
  <div class="modal fade " id="del-Medicine" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">
                        Delete Medicine
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{route('delete_medicine')}}" method="POST" >
                        @csrf
                        @method('delete')
                        <div class="mb-3 text-center">
                            <h5 class="text-danger">Are You Sure to Delete This information?</h5>
                        </div>
                        <input type="hidden" id="del-Medicine-id" name="deletingId">
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-blue-grey  btn-sm">Yes,Delete</button>
                        <!-- Modal Footer end -->
                        </div>
                    </form>
                </div>
                <!-- Modal Body end -->
            </div>
        </div>
    </div>
 <!-- Modal end -->

   @include('include.footer')

   <script>
    $(document).ready(function(){

        // script for Doctor

      $(document).on('click', '.Doctor_editbtn',function(){
                var Doctor_id = $(this).val();
                // alert(Doctor_id);
                $("#Doctor_Update").modal('show');
                $.ajax({
                    type:"GET",
                    url: "/edit_doctor/"+Doctor_id,
                    success: function(response){
                        console.log(response.doctor_info);
                        $('#DoctorId').val(Doctor_id);
                        $('#d_name').val(response.doctor_info.name);
                        $('#d_email').val(response.doctor_info.email);
                        $('#d_mobile').val(response.doctor_info.phone);
                        $('#d_bmdc').val(response.doctor_info.BMDC);
                        $('#d_c_name').val(response.doctor_info.chember_name);
                        $('#d_c_add').val(response.doctor_info.chember_add);
                    }
                });
      });

      $(document).on('click', '.delete-doctor',function(){
                var deleteDoctorId = $(this).val();
                // alert(deleteCCId);
                $("#del-Doctor").modal('show');
                $('#del-doctor-id').val(deleteDoctorId);
      });

      $(document).on('click', '.delete-subscribtion',function(){
                var deleteSubscribtionId = $(this).val();
                alert(deleteSubscribtionId);
                $("#del-Subscribtion").modal('show');
                $('#del-subscribtion-id').val(deleteSubscribtionId);
      });

      // script for C/C Chief Complaint
      $(document).on('click', '.CC_editbtn',function(){
                var cc_id = $(this).val();
                // alert(edit);
                $("#chife_Complaint_Update").modal('show');
                $.ajax({
                    type:"GET",
                    url: "/edit_chife_complaint/"+cc_id,
                    success: function(response){
                        // console.log(response.cc.name);
                        $('#CCId').val(cc_id);
                        $('#c_c_name').val(response.cc.name);
                    }
                });
      });

      $(document).on('click', '.delete-cc',function(){
                var deleteCCId = $(this).val();
                // alert(deleteCCId);
                $("#del-CC").modal('show');
                $('#del-cc-id').val(deleteCCId);
      });

      // script for C/F Clinical Findings
      $(document).on('click', '.CF_editbtn',function(){
                var cf_id = $(this).val();
                // alert(cf_id);
                $("#Clinical_Finding_Update").modal('show');
                $.ajax({
                    type:"GET",
                    url: "/edit_clinical_finding/"+cf_id,
                    success: function(response){
                        // console.log(response);
                        $('#CFId').val(cf_id);
                        $('#c_f_name').val(response.cf.name);
                    }
                });
            });

            $(document).on('click', '.delete-cf',function(){
                var deleteCFId = $(this).val();
                // alert(deleteCFId);
                $("#del-CF").modal('show');
                $('#del-cf-id').val(deleteCFId);
            });
      
      // script for Investigation

      $(document).on('click', '.Investigation_editbtn',function(){
                var Investigation_id = $(this).val();
                // alert(Investigation_id);
                $("#Investigation_Update").modal('show');
                $.ajax({
                    type:"GET",
                    url: "/edit_investigation/"+Investigation_id,
                    success: function(response){
                        console.log(response);
                        $('#InvestigationId').val(Investigation_id);
                        $('#Investigation_name').val(response.inves.name);
                    }
                });
      });

      $(document).on('click', '.delete-Investigation',function(){
                var deleteInvestigationId = $(this).val();
                // alert(deleteInvestigationId);
                $("#del-Investigation").modal('show');
                $('#del-Investigation-id').val(deleteInvestigationId);
      });

      // script for T/P Treatment Plans update/edit

      $(document).on('click', '.TP_editbtn',function(){
                var tp_id = $(this).val();
                // alert(tp_id);
                $("#Treatment_Plan_Update").modal('show');
                $.ajax({
                    type:"GET",
                    url: "/edit_treatment_plan/"+tp_id,
                    success: function(response){
                        // console.log(response);
                        $('#TPId').val(tp_id);
                        $('#t_p_name').val(response.tp.name);
                        $('#t_p_cost').val(response.tp.cost);
                    }
                });
      });

      $(document).on('click', '.delete-tp',function(){
                var deleteTPId = $(this).val();
                // alert(deleteTPId);
                $("#del-TP").modal('show');
                $('#del-TP-id').val(deleteTPId);
      });

      // script for Medicine update/edit

      $(document).on('click', '.Medicine_editbtn',function(){
        var medicine_id = $(this).val();
        // alert(medicine_id);
        $("#Medicine_Update").modal('show');
        $("#Medicine_List").modal('hide');
        $.ajax({
          type:"GET",
          url: "/edit_medicine/"+medicine_id,
          success: function(response){
          console.log(response);
          $('#MedicineId').val(medicine_id);
          $('#Medicine_name').val(response.medicine_info.name);
          $('#Medicine_brand').val(response.medicine_info.brand);
          }
        });
      });
      // script for Medicine delete
      $(document).on('click', '.delete-Medicine',function(){
        var deleteMedicineId = $(this).val();
        // alert(drug_id);
        $("#del-Medicine").modal('show');
        $('#del-Medicine-id').val(deleteMedicineId);
      });

    });
   </script>



<script>
 $(document).ready(function(){
    $('a[data-bs-toggle="pill"]').on('show.bs.tab', function(e) {
        sessionStorage.setItem('activeTab', 
        $(e.target).attr('data-bs-target'));
    });
    var activeTab = sessionStorage.getItem('activeTab');
    if(activeTab){
        $('#v-pills-tab a[data-bs-target="' + activeTab + '"]').tab('show');
    }
 });
</script>