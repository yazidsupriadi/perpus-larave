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
                                <h2 class="pageheader-title">Book Dashboard </h2>
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Book Dashboard </li>
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
                                <h5 class="mb-0">Data Buku perpustakaan </h5>
                                <p>Disini tercantum nama buku yang tersedia di perpustakaan </p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">


                                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="{{url('admin/book/search')}}" method="get">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="masukan nama buku ..." aria-label="Search" name ="search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                       Tambah Buku
                    </button>
                    <br><br>


                                    <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama buku</th>
                                                <th>Code</th>
                                                <th>Gambar</th>
                                                <th>Tahun Terbit</th>
                                                <th>Banyak Halaman</th>
                                                <th>Deskripsi</th>
                                                <th>Penulis</th>
                                                <th>Penerbit</th>
                                                <th>Kategori Buku</th>
                                                <th>Rak</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach($books as $book)
                                            <tr>
                                                <td><?=$no++?></td>
                                                <td>{{$book->name}}</td>
                                                 <td>{{$book->code}}</td>
                                                 <td><img src="{{asset('admin/img/book/'.$book->picture)}}" alt="" width="50px" height="50px"></td>
                                                 <td>{{$book->publication_year}}</td>
                                                 <td>{{$book->pages}}</td>
                                                 <td>{{$book->description}}</td>
                                                 <td>{{$book->author->name}}</td>
                                                <td>{{$book->publisher->name}}</td>
                                                <td>{{$book->category->name}}</td>
                                                <td>{{$book->shelf->code}}</td>
                                                <td>
                                                    <form action="/admin/book/{{$book->id}}" method="POST" enctype="multipart/form-data" class="form-inline">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}        
                                                    <a href="{{url('admin/book/'.$book->id.'/edit')}}" class="btn btn-success btn-sm btn-circle"  "><i class="fa fa-user"></i></a>
                                                    <button type="submit" name="" value="" class="btn btn-danger btn-sm btn-circle"> <i class="fa fa-trash"></i></button>
                                                    
                                                    </form>  </td>
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
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Buku</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                                                    <form action="{{url('admin/book')}}" method="POST" enctype="multipart/form-data">
                      {{csrf_field()}}

                      <div class="form-group">
                        <label for="name">Nama Buku</label>
                        <input type="text" class="form-control" name="name" placeholder="Masukan judul nama buku">
                      </div>


                      <div class="form-group">
                        <label for="name">Code</label>
                        <input type="text" class="form-control" name="code" placeholder="Masukan judul code buku">
                      </div>

                          <div class="form-group">
                        <label for="picture">Picture</label>
                        <input type="file" class="form-control" name="picture" >
                      </div>


                      <div class="form-group">
                        <label for="name">Tahun terbit</label>
                        <input type="text" class="form-control" name="publication_year" placeholder="Masukan tahun publikasi">
                      </div>

           
           
                      <div class="form-group">
                        <label for="name">Banyak halaman</label>
                        <input type="text" class="form-control" name="pages" placeholder="Masukan judul Banyak halaman buku">
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
                          <select name="author_id" class="form-control">
                              
                              <option value="">Pilih Nama Penulis</option>}
                              @foreach($authors as $author)
                              <option value="{{$author->id}}">{{$author->name}}</option>
                              @endforeach
                          </select>
                      </div>

                      <div class="form-group">
                          <select name="publisher_id" class="form-control">

                              <option value="">Pilih Nama penerbit</option>}
                              @foreach($publishers as $publisher)
                              <option value="{{$publisher->id}}">{{$publisher->name}}</option>
                              @endforeach
                          </select>
                      </div>

                          <div class="form-group">
                          <select name="category_id" class="form-control">
                              <option value="">Pilih Category</option>}
                              @foreach($categories as $category)
                              <option value="{{$category->id}}">{{$category->name}}</option>
                              @foreach($category->children as $subcat)
                              <option value="{{$subcat->id}}">{{$subcat->name}}</option>}
                              option
                              @endforeach
                              @endforeach
                          </select>
                      </div>

                      <div class="form-group">
                          <select name="shelf_id" class="form-control">

                              <option value="">Pilih Code buku</option>}
                              @foreach($shelfs as $shelf)
                              <option value="{{$shelf->id}}">{{$shelf->code}}</option>
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