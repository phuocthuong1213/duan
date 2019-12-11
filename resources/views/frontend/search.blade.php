@extends('frontend.master')
@section('title','Trang tìm kiếm')
@section('main')
<link rel="stylesheet" href="css/search.css">


<div id="wrap-inner">
	<div class="products">
		<h3>Tìm kiếm với từ khóa: <span>{{$keyword}}</span></h3>
		<div class="product-list row">
			@foreach ($item as $search)
				<div class="product-item col-md-3 col-sm-6 col-xs-12">
					<a href="#"><img src="{{asset('lib/storage/app/avarta/'.$search->pro_img)}}" class="img-thumbnail"></a>
					<p><a href="#">{{$search->pro_name}}</a></p>
					<p class="price">{{number_format($search->pro_price,0,',','.')}} đ</p>	  
					<div class="marsk">
						<a href="{{asset('detail/'.$search->pro_id.'/'.$search->pro_slug.'.html')}}">Xem chi tiết</a>
					</div>                                    
				</div>
			@endforeach	
		</div>                	                	
	</div>

	<div id="pagination">
			<ul class="pagination pagination-lg justify-content-center">
					{{$item->links()}}
			</ul>
		</div>
</div>
@stop
					
					<!-- end main -->
				