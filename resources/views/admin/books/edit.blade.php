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
                                  
                             <form action="/admin/book/{{$books->id}}" method="POST" enctype="multipart/form-data">
                      {{csrf_field()}}
                      {{method_field('PUT')}}
                      <div class="form-group">
                        <label for="name">Nama Buku</label>
                        <input type="text" class="form-control" name="name" placeholder="Masukan judul nama buku" value="{{$books->name}}">
                      </div>


                      <div class="form-group">
                        <label for="name">Code</label>
                        <input type="text" class="form-control" name="code" placeholder="Masukan judul code buku" value="{{$books->code}}">
                      </div>

                      <div class="form-group">
                        <label for="name">Tahun terbit</label>
                        <input type="text" class="form-control" name="publication_year" placeholder="Masukan tahun publikasi" value="{{$books->publication_year}}">
                      </div>

           
           
                      <div class="form-group">
                        <label for="name">Banyak halaman</label>
                        <input type="text" class="form-control" name="pages" placeholder="Masukan judul Banyak halaman buku" value="{{$books->pages}}">
                      </div>

           
                      <div class="form-group">
                        <label for="name">Deskripsi Buku</label>
                        <textarea name="description" class="form-control" placeholder="masukan deskripsi buku">{!!$books->description!!}}</textarea>
                      </div>

                      <div class="form-group">
                        <label for="qty">Banyak buku</label>
                        <input type="text" class="form-control" name="qty" placeholder="Masukan  banyak buku" value="{{$books->qty}}">
                      </div>

           
                       
            
                      <div class="form-group">
                          <select name="author_id" class="form-control">
                              
                              @foreach($authors as $author)
                              <option @if($author->id == $books->author_id) 
                                selected="selected" 
                                @endif value="{{$author->id}}">{{$author->name}}</option>
                              @endforeach
                          </select>
                      </div>

                      <div class="form-group">
                          <select name="publisher_id" class="form-control">

                              @foreach($publishers as $publisher)
                              <option @if($publisher->id == $books->publisher_id) 
                                selected="selected" 
                              @endif value="{{$publisher->id}}">{{$publisher->name}}</option>
                              @endforeach
                          </select>
                      </div>

                          <div class="form-group">
                          <select name="category_id" class="form-control">
                              @foreach($categories as $category)
                              <option @if($category->id == $books->id)
                              selected="selected" 
                              @endif
                              value="{{$category->id}}">{{$category->name}}</option>
                              @foreach($category->children as $subcat)
                              <option @if($books->category_id == $subcat->id)
                               selected="selected" 
                              @endif
                              value="{{$subcat->id}}">{{$subcat->name}}</option>

                              @endforeach
                              @endforeach
                          </select>
                      </div>

                      <div class="form-group">
                          <select name="shelf_id" class="form-control">

                              @foreach($shelfs as $shelf)
                              <option @if($shelf->id == $books->shelf_id)
                                selected="selected" 
                                @endif
                                value="{{$shelf->id}}">{{$shelf->code}}</option>
                              @endforeach
                          </select>
                      </div>

                      <div class="form-group">
                        <label for="picture">Picture</label>
                        <div class="col-md-6">
                          <input type="file" class="form-control" name="picture"  value="{{$books->picture}}">
                        </div>
                        <br>
                        <div class="col-md-6">
                          <label>picture before edited</label>
                            <img src="{{asset('admin/img/book/'.$books->picture)}}" alt="" width="50px" height="50px">
                          </div>  
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
                    </div>
                </div>
            </div>




@endsection