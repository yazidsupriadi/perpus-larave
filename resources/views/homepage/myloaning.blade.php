@extends('homepage.master')
@section('content')
  <div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">My Loanings</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">My Loanings</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="content">
        <div class="container">
          <div class="row bar mb-0">
            <div id="customer-orders" class="col-md-9">
              <p class="text-muted lead">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>
              <div class="box mt-0 mb-lg-0">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Code</th>
                        <th>Loaning Date</th>
                        <th>Returning Date</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Fine</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($loanings as $loan)
                      <tr>
                        <th>{{$loan->code}}</th>
                        <td>{{$loan->loaning_date}}</td>
                        <td>{{$loan->returning_date}}</td>
                        <td>{{$loan->qty}}</td>
                        <td><span class="badge badge-warning">{{$loan->returning_status}}</span></td>
                        <td>{{$loan->fine}}</td>
                        <td><a href="customer-order.html" class="btn btn-template-outlined btn-sm">View</a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-md-3 mt-4 mt-md-0">
              <!-- CUSTOMER MENU -->
              <div class="panel panel-default sidebar-menu">
                <div class="panel-heading">
                  <h3 class="h4 panel-title">Customer section</h3>
                </div>
                <div class="panel-body">
                  <ul class="nav nav-pills flex-column text-sm">
                    <li class="nav-item"><a href="customer-orders.html" class="nav-link active"><i class="fa fa-list"></i> My orders</a></li>
                    <li class="nav-item"><a href="customer-account.html" class="nav-link"><i class="fa fa-user"></i> My account</a></li>
                    <li class="nav-item"><a href="{{url('/member/logout')}}" class="nav-link"><i class="fa fa-sign-out"></i> Logout</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection