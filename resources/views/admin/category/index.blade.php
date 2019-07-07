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
                                <h2 class="pageheader-title">E-commerce Dashboard Template </h2>
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">E-Commerce Dashboard Template</li>
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
                                <h5 class="mb-0">Data Category </h5>
                                <p>Disini tercantum nama category barang yang dijual</p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                       Tambah Category
                    </button>
                    <br><br>

                                    <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>No</th>
                                                <th>Category</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach($categories as $category)
                                            <tr>
                                                <td><?=$no++?></td>
                                                <td>{{$category->name}}
                                                    <ul>
                                                        @foreach($category->children as $subcategory)
                                                    
                                                        <li style="margin-top:10px; ">
                                                    {{$subcategory->name}}
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                
                                                
                                                <td>
                                                <form action="/admin/category/{{$category->id}}" method="POST" enctype="multipart/form-data">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}        
                                                    <a href="{{url('admin/category/'.$category->id.'/edit')}}"  class="btn btn-success btn-sm">edit</a>
                                                    <input type="submit" name="" value="DELETE" class="btn btn-danger btn-sm" 
                                                    onclick="return confirm('yakin mau dihapus.?')">
                                                    </form>

                                                        <ul style="list-style:none;">
                                                        @foreach($category->children as $subcategory)
                                                    
                                                        <li>
                                                    <form action="/admin/category/{{$subcategory->id}}" method="POST" enctype="multipart/form-data">
                                                
                                                    <a href="{{url('admin/category/'.$subcategory->id.'/edit')}}" class="btn btn-success btn-sm" style="margin-top:10px; ">edit</a>
                                                    {{csrf_field()}}
                                                {{method_field('DELETE')}}        
                                                  
                                                       <input type="submit" name="" value="DELETE" class="btn btn-danger btn-sm" style="margin-top:10px; "
                                                       onclick="return confirm('yakin mau dihapus.?')">
                                                     </form>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                        
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
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                      <form action="{{url('admin/category')}}" method="POST" enctype="multipart/form-data">
                      {{csrf_field()}}

                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Masukan judul nama Category">
                      </div>

           
                      <div class="form-group">
                          <select name="parent_id" class="form-control">
                              @foreach($categories as $category)
                              <option value="">Pilih Category</option>}
                              <option value="{{$category->id}}">{{$category->name}}</option>
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