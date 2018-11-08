@extends('layouts.app', ['title' => 'Welcome to DTC!!!'])

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
@endsection

@if (ENV('APP_ENV') == 'production')
@section('footScripts')
<!-- REFERSION TRACKING: BEGIN -->
<script src="//billionaireblogclub.refersion.com/tracker/v3/pub_fff12c39e1cee94229d4.js"></script>
<script>
_refersion(function(){

    _rfsn._addTrans({
        'order_id': '{{ Auth::user()->id }}',
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