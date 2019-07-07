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
                                <h2 class="pageheader-title">Loaning Dashboard</h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Loaning Dashboard </li>
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
                                <h5 class="mb-0">Data Peminjaman buku </h5>
                                <p>Disini tercantum data peminjaman buku yang ada di perpustakaan</p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">

                                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="{{url('admin/loaning/search')}}" method="get">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="masukan code ..." aria-label="Search" name ="search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                       Pinjam lagi
                    </button>
                    <br><br>

                                    <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>No</th>
                                                <th>Code</th>
                                                <th>Nama peminjam</th>
                                                <th>Nama Buku</th>
                                                <th>Tanggal pinjam</th>
                                                <th>Tanggal kembali</th>
                                                <th>Deskripsi</th>
                                                <th>Status pengembalian</th>
                                                <th>denda</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach($loanings as $loaning)
                                            <tr>
                                                <td><?=$no++?></td>
                                                <td>{{$loaning->code}}</td>
                                                <td>{{$loaning->user->name}}</td>
                                                <td>{{$loaning->book->name}}</td>
                                                <td>{{$loaning->loaning_date}}</td>
                                                <td>{{$loaning->returning_date}}</td>
                                                <td>{{$loaning->description}}</td>
                                                
                                                <td>@if($loaning->returning_status == 'on_time')
                                                       <a href="{{url('admin/loaning/status/'.$loaning->id)}}" class="btn btn-primary btn-sm">Tepat Waktu</a>
                                                    @else
                                                       <a href="{{url('admin/loaning/status/'.$loaning->id)}}" class="btn btn-danger btn-sm ">Telat</a>
                                                    
                                                    @endif
                                                </td>
                                                <td>{{$loaning->fine}}</td>
                                                <td><a href="{{url('admin/loaning/'.$loaning->id.'/edit')}}" class="btn btn-success btn-sm btn-circle"><i class="fa fa-pencil-alt"></i></a>
                                                    <br>
                                                    <a href="{{url('admin/loaning/delete/'.$loaning->id)}}" class="btn btn-danger btn-sm btn-circle"><i class="fa fa-trash"></i></a>
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
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Author</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                                
                                                    <form action="{{url('admin/loaning')}}" method="POST" enctype="multipart/form-data">
                      {{csrf_field()}}

                      <div class="form-group">
                        <label for="name">Code</label>
                        <input type="text" class="form-control" name="code" placeholder="Masukan judul code buku">
                      </div>


                      <div class="form-group">
                        <label for="name">Tanggal pinjam</label>
                        <input type="date" class="form-control" name="loaning_date">
                      </div>

                        <div class="form-group">
                        <label for="name">Tanggal pengembalian</label>
                        <input type="date" class="form-control" name="returning_date">
                      </div>

           
           

           
                      <div class="form-group">
                        <label for="name">Deskripsi Buku</label>
                        <textarea name="description" class="form-control" placeholder="masukan deskripsi buku"></textarea>
                      </div>

                      <div class="form-group">
                        <label for="qty">Banyak buku</label>
                        <input type="text" class="form-control" name="qty" placeholder="Masukan  banyak buku">
                      </div>


           
           
                       
            
                      <div class="form-group">
                          <select name="user_id" class="form-control">
                              
                              <option value="">Pilih Nama Peminjam</option>}
                              @foreach($users as $user)
                              <option value="{{$user->id}}">{{$user->name}}</option>
                              @endforeach
                          </select>
                      </div>

                      <div class="form-group">
                          <select name="book_id" class="form-control">

                              <option value="">Pilih Nama buku</option>}
                              @foreach($books as $book)
                              <option value="{{$book->id}}">{{$book->name}}</option>
                              @endforeach
                          </select>
                      </div>



                      <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
                    </form>
                          </div>
                          
                        </div>
                      </div>
                    </div>


@endsection