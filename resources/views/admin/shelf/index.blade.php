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
                                <h2 class="pageheader-title">Shelf Dashboard</h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Shelf Dashboard </li>
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
                                <h5 class="mb-0">Data Rak buku perpustakaan</h5>
                                <p>Disini tercantum nama para penulis buku yang ada di perpustakaan</p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                       Tambah Rak buku
                    </button>
                    <br><br>

                                    <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>No</th>
                                                <th>Code</th>
                                                <th>Position</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach($shelfs as $shelf)
                                            <tr>
                                                <td><?=$no++?></td>
                                                <td>{{$shelf->code}}</td>
                                                <td>{{$shelf->position}}</td>
                                                                                                <td>
                                                    
                                                    <form action="/admin/shelf/{{$shelf->id}}" method="POST" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}        
                                                    <a href="{{url('admin/shelf/'.$shelf->id.'/edit')}}" class="btn btn-success btn-sm"  ">EDIT</a>
                                                    
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
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Rak buku</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="{{url('admin/shelf')}}" method="POST" enctype="multipart/form-data">
                      {{csrf_field()}}

                      <div class="form-group">
                        <label for="code">Code</label>
                        <input type="text" class="form-control" name="code" placeholder="Masukan Kode Rak">
                      </div>

                      <div class="form-group">
                        <label for="position">Position</label>
                        <textarea name="position" placeholder="masukan posisi rak buku" class="form-control"></textarea>
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