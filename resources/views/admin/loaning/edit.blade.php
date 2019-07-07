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
                                
                                                    <form action="{{url('admin/loaning/'.$loanings->id)}}" method="POST" enctype="multipart/form-data">
                      {{csrf_field()}}
                      {{method_field('PUT')}}
                      <div class="form-group">
                        <label for="name">Code Peminjaman</label>
                        <input type="text" class="form-control" name="code" placeholder="Masukan judul code buku" value="{{$loanings->code}}">
                      </div>


                      <div class="form-group">
                        <label for="name">Tanggal pinjam</label>
                        <input type="date" class="form-control" name="loaning_date" 
                        value="{{$loanings->loaning_date}}">
                      </div>

                        <div class="form-group">
                        <label for="name">Tanggal pengembalian</label>
                        <input type="date" class="form-control" name="returning_date" value="{{$loanings->returning_date}}">
                      </div>

           
           

           
                      <div class="form-group">
                        <label for="name">Deskripsi Buku</label>
                        <textarea name="description" class="form-control" placeholder="masukan deskripsi buku">{!!$loanings->description!!}</textarea>
                      </div>

                      <div class="form-group">
                        <label for="qty">Banyak buku</label>
                        <input type="text" class="form-control" name="qty" placeholder="Masukan  banyak buku" value="{{$loanings->qty}}">
                      </div>


                      <div class="form-group">
                        <label for="fine">Denda</label>
                        <input type="text" class="form-control" name="fine" placeholder="Masukan  banyak denda" value="{{$loanings->fine}}">
                      </div>

           
           
                       
            
                      <div class="form-group">
                          <select name="user_id" class="form-control">
                              
                              @foreach($users as $user)
                              <option @if($user->id == $loanings->user_id)

                                selected="selected" 
                                @endif value="{{$user->id}}">{{$user->name}}</option>
                              @endforeach
                          </select>
                      </div>

                      <div class="form-group">
                          <select name="book_id" class="form-control">

                              @foreach($books as $book)
                              <option @if($book->id == $loanings->book_id)

                                selected="selected" 
                                @endif
                               value="{{$book->id}}">{{$book->name}}</option>
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
                    </div>
                </div>
            </div>




@endsection