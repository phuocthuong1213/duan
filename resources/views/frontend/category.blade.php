@extends('frontend.master')
@section('title','Danh mục sản phẩm')
@section('main')
<link rel="stylesheet" href="css/category.css">
<div id="wrap-inner">
	<div class="products">
	<h3>{{$catename->cate_name}}</h3>
		<div class="product-list row">
			@foreach ($item1 as $item)
			<div class="product-item col-md-3 col-sm-6 col-xs-12">
							<a href="#"><img height="150px" src="{{asset('lib/storage/app/avarta/'.$item->pro_img)}}" class="img-thumbnail"></a>
							<p><a href="#">{{$item->pro_name}}</a></p>
							<p class="price">{{number_format($item->pro_price,0,',','.')}} đ</p>	  
							<div class="marsk">
								<a href="{{asset('detail/'.$item->pro_id.'/'.$item->pro_slug.'.html')}}">Xem chi tiết</a>
							</div>                                                     
			</div>
			@endforeach      
		</div>                	                	
	</div>
	{{-- <div class="product-list row">
		{{$item1->link()}}
	</div> --}}
	<div id="pagination">
		<ul class="pagination pagination-lg justify-content-center">
				{{$item1->links()}}
		</ul>
	</div>
	
</div>
@stop

					
			