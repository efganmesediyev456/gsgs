<div class="product-price">
    @if($pro->price)
        <span>{{ number_format($pro->price, 2) }} AZN </span>
    @endif
    @if($pro->discount_price)
        <span class="old-price">{{ number_format($pro->discount_price,2) }} AZN</span>
    @endif
</div>
