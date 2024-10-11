@foreach($products as $product)
<li><a href="{{ product_slug($product->slug) }}">{{ $product->title }}</a></li>
@endforeach
