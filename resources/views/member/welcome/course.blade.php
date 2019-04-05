@extends('layouts.app', ['title' => 'Welcome to the '.$course->name.' Course'])

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>Welcome to Dare to Conquer!!!</h1>
			</div>
		</div>
	</div>
</section>
<section class="content lesson">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <script src="https://fast.wistia.com/embed/medias/wcj0djaedk.jsonp" async></script><script src="https://fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:52.71% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_wcj0djaedk videoFoam=true" style="height:100%;position:relative;width:100%"><div class="wistia_swatch" style="height:100%;left:0;opacity:0;overflow:hidden;position:absolute;top:0;transition:opacity 200ms;width:100%;"><img src="https://fast.wistia.com/embed/medias/wcj0djaedk/swatch" style="filter:blur(5px);height:100%;object-fit:contain;width:100%;" alt="" onload="this.parentNode.style.opacity=1;" /></div></div></div></div>

                <h3><a href="/course/{{ $course->slug }}">Click here to get started on {{ $course->name }}</a></h3>
            </div>
        </div>
    </div>
</section>
@endsection

@if (ENV('APP_ENV') == 'production')
@section('footScripts')
<!-- REFERSION TRACKING: BEGIN -->
<script src="//billionaireblogclub.refersion.com/tracker/v3/pub_fff12c39e1cee94229d4.js"></script>
<script>
_refersion(function(){

    _rfsn._addTrans({
        'order_id': '{{ $payment->id }}',
        'shipping': '0.00',
        'tax': '0.00',
        'discount': '0.00',
        'discount_code': '',
        'currency_code': 'USD'
    });

    _rfsn._addCustomer({
        'first_name': '{{ Auth::user()->first_name }}',
        'last_name': '{{ Auth::user()->last_name }}',
        'email': '{{ Auth::user()->email }}',
        'ip_address': ''
    });

    _rfsn._addItem({
        'sku': '{{ $payment->item }} - {{ $payment->type }}',
        'quantity': '1',
        'price': '{{ $payment->price }}'
    });

    _rfsn._sendConversion();

});
</script>
<!-- REFERSION TRACKING: END -->
@endsection
@endif