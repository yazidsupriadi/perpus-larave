 @extends('homepage.master')
 @section('header')
  <title>Oncom Shop - Jual gadget murah</title>
    
 @endsection
 @section('slider')
     <div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">All Product</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">See all products</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
 @endsection
 @section('content')
 <div id="content">
        <div class="container">
          <div class="row bar">
            <div class="col-md-12">
              <p class="text-muted lead text-center">Disini kami menyediakan buku buku terbaik di dalam dan luar negeri Selamat membaca ! Stay hungry Stay Foolish</p>
              <div class="products-big">
                <div class="row products">
                  @foreach($books as $book)
                  <div class="col-lg-3 col-md-4">
                    <div class="product">
                      <div class="image"><a href="{{url('/book/'.$book->id.'/detail')}}"><img src="{{asset('admin/img/book/'.$book->picture)}}" alt="" class="img-fluid image1"></a></div>
                      <div class="text">
                        <h3 class="h5"><a href="{{url('/book/'.$book->id.'/detail')}}">{{$book->name}}</a></h3>
                        <p class="price">Halaman Buku : {{$book->pages}}</p>
                        <p class="price">pengarang : {{$book->author->name}}</p>
                        <p class="price">Tahun terbit : {{$book->publication_year}}</p>
                      
                      </div>
                    </div>
                  </div>
                  @endforeach
               </div>
              </div>
              <div class="row">
                <div class="col-md-12 banner mb-small text-center"><a href="#"><img src="img/banner2.jpg" alt="" class="img-fluid"></a></div>
              </div>
              <div class="pages">
                <p class="loadMore text-center"><a href="#" class="btn btn-template-outlined"><i class="fa fa-chevron-down"></i> Load more</a></p>
                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                  <ul class="pagination">
                    <li class="page-item"><a href="#" class="page-link"> <i class="fa fa-angle-double-left"></i></a></li>
                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection