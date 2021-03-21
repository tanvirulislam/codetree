@extends('backend.master.master')

@section('title')
 Supplier - Admin Panel
@endsection

@section('style')
<style>
    .form-check-label {
        text-transform: capitalize;
    }
</style>
@endsection


@section('body')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Supplier Detail</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.supplier') }}">All Supplier</a></li>
                    <li><span>{{ $view->name }}</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            @include('backend.include.logout')
        </div>
    </div>
</div>
<!-- page title area end -->

<div class="main-content-inner">
    <div class="row">
        <!-- data table start -->
        <div class="col-2 mt-5">
            <div class="card">
               <img src="{{ asset('/') }}{{ $view->image }}" class="card-img-top" alt="...">
               
            </div>
        </div>
        <div class="col-5 mt-5">
            <div class="card">
              <div class="card-header">
                  Personal Information
              </div>
                <div class="card-body">
                   <span style="font-size: 15px;line-height: 2;"><b>Name:</b> {{ $view->name }}</span><br>
                   <span style="font-size: 15px;line-height: 2;"><b>Company:</b> {{ $view->company }}</span><br>
                   <span style="font-size: 15px;line-height: 2;"><b>Email:</b> {{ $view->email }}</span><br>
                   <span style="font-size: 15px;line-height: 2;"><b>Phone:</b> {{ $view->mobile }}</span><br>
                   <span style="font-size: 15px;line-height: 2;"><b>Address:</b> {{ $view->address }}</span><br>
                   <span style="font-size: 15px;line-height: 2;"><b>Status:</b>
                    @if($view->status == 1)
                      <span class="badge badge-success">Active</span>
                    @else
 <span class="badge badge-danger">Inactive</span>
                    @endif

                   </span>
                   
                    
                    
                </div>
            </div>
        </div>
        <div class="col-5 mt-5">
            <div class="card">
              <div class="card-header">
                  Purchase Information
              </div>
                <div class="card-body">
                   <span style="font-size: 15px;line-height: 2;"><b>Starting Balance:</b> {{ $view->custom1 }}</span><br>
                   <span style="font-size: 15px;line-height: 2;"><b>Total Purchase:</b> </span><br>
                   <span style="font-size: 15px;line-height: 2;"><b>Total Discount:</b> </span><br>
                   <span style="font-size: 15px;line-height: 2;"><b>Total Due:</b> </span><br>
                  
                 
                   
                    
                    
                </div>
            </div>
        </div>
        <!-- data table end -->
        
    </div>
</div>
<div class="main-content-inner">
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
             <div class="card">
      <div class="card-header">
          <center><h2>Purchase History</h2></center>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Refarense Number</th>
      <th scope="col">Purchase Status</th>
      <th scope="col">Grand Total</th>
      <th scope="col">Paid</th>
      <th scope="col">Discount</th>
      <th scope="col">Balance</th>
      <th scope="col">Payment Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
    </tr>
    
  </tbody>
</table>
          </div>

      </div>

</div>
</div>
</div>
</div>

@endsection
<script type="text/javascript">
    $(document).ready(function(){
    var maxFieldLimit = 20; //Input fields increment limitation
    var add_more_field = $('.addextras'); //Add button selector
    var Fieldwrapper = $('.input_field_wrapper'); //Input field wrapper
    var fieldHTML = '<div class="col-md-8"><div class="form-group" style="clear: both;"><label for="name">Permission Name</label><input type="text" class="form-control" id="name" name="name[]" placeholder="Enter a  Name"></div></div>';

    var x = 1; //Initial field counter is 1
    $(".addextras").click(function(){ //Once add button is clicked

        if(x < maxFieldLimit){ //Check maximum number of input fields
            x++; //Increment field counter
            $(Fieldwrapper).append(fieldHTML); // Add field html
        }
    });
    $(Fieldwrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>
@section('scipts')
     
@endsection