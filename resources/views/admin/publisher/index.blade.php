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
                                <h2 class="pageheader-title">Publisher Dashboard</h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Publisher Dashboard </li>
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
                                <h5 class="mb-0">Data Penerbit buku </h5>
                                <p>Disini tercantum nama para penulis buku yang ada di perpustakaan</p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">

                                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="{{url('admin/publisher/search')}}" method="get">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="masukan nama penerbit ..." aria-label="Search" name ="search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                       Tambah Publisher
                    </button>
                    <br><br>
                                    <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Penerbit</th>
                                                <th>Alamat</th>
                                                <th>Telpon</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach($publishers as $publisher)
                                            <tr>
                                                <td><?=$no++?></td>
                                                <td>{{$publisher->name}}</td>
                                                <td>{{$publisher->address}}</td>
                                                <td>{{$publisher->phone}}</td>
                                                <td>{{$publisher->email}}</td>
                                                                                                <td>
                                                    
                                                    <form action="/admin/publisher/{{$publisher->id}}" method="POST" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}        
                                                    <a href="{{url('admin/publisher/'.$publisher->id.'/edit')}}" class="btn btn-success btn-sm"  ">edit</a>
                                                    
                                                    <input type="submit" name="" value="DELETE" class="btn btn-danger btn-sm"  onclick="return confirm('yakin mau dihapus.?')">
                                                    </form>  
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



                      <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Publisher</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                          </div>
                                                        <form action="{{url('admin/publisher')}}" method="POST" enctype="multipart/form-data">
                      {{csrf_field()}}

                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Masukan judul nama Author">
                      </div>

                      <div class="form-group">
                        <label for="address">Alamat</label>
                        <textarea name="address" placeholder="masukan alamat" class="form-control"></textarea>
                      </div>

                        <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone" placeholder="Masukan judul nomor handphone">
                      </div>

                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukan judul alamat">
                      </div>

                                         


                      <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
                    </form>
                          
                        </div>
                      </div>
                    </div>


@endsection