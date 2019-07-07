@extends('admin.layout.master')
@section('content')
	
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">User Dashboard</h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">User Dashboard </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">
                    	<div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Data User Perpustakaan </h5>
                                <p>Disini tercantum nama para user perpustakaan</p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                    

                                    <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Photo</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Phone</th>
                                                <th>Gender</th>
                                                <th>Status</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php $no = 1; ?>
                                            @foreach($users as $user)
                                            <tr>
                                                <td><?=$no++?></td>
                                                <td>{{$user->name}}</td>
                                                <td><img src="{{asset('admin/img/user'.$user->photo)}}"  width="50px" height="50px" alt=""></td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->address}}</td>
                                                <td>{{$user->phone}}</td>
                                                <td> @if($user->gender == 'L')
                                                    Laki Laki
                                                    @else
                                                    Perempuan
                                                    @endif

                                                </td>
                                   
                                                <td>@if($user->status == '0')
                                                       <a href="{{url('admin/user/status/'.$user->id)}}" class="btn btn-primary btn-sm">Non aktif</a>
                                                    @else
                                                       <a href="{{url('admin/user/status/'.$user->id)}}" class="btn btn-danger btn-sm ">Aktif</a>
                                                    
                                                    @endif
                                                </td>
                                                <td>{{$user->role}}</td>
                                                <td>   <a href="{{url('admin/user/edit/'.$user->id)}}" class="btn btn-success btn-xs">Edit</a>
                                                    <a href="{{url('admin/user/delete/'.$user->id)}}" class="btn btn-danger btn-xs">delete</a>
                                                    </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                   </table>
                     </div>
                            </div>
                        </div>
                    </div>
                    	</div>
                    </div>
                </div>
            </div>



                    

@endsection