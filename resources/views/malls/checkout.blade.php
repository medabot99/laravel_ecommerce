<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <button id="rzp-button1">Pay with Razorpay</button>

    <form name='razorpayform' action="{{ route("orders.store") }}" method="POST">    
        @csrf
        <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">    
        <input type="hidden" name="razorpay_signature"  id="razorpay_signature" >
    </form>
    
    <input type="hidden" name="checkout_response"  id="checkout_response" value='{{ $response }}' >

    <input type="hidden" name="app_logo" id="app_logo" value="{{ asset(\App\Configuration::where('key','logo')->first()->value) }}">
    <input type="hidden" name="app_name" id="app_name" value="{{ \App\Configuration::where('key','appName')->first()->value }}">
    <input type="hidden" name="user_details"  id="user_details" value='{{ auth()->user() }}' >
    
</body>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>// Checkout details as a json
var opt = JSON.parse(document.getElementById('checkout_response').value);
var user = JSON.parse(document.getElementById('user_details').value);
console.log(opt.amount);
    var options = {
    "key": "rzp_test_qLU9YDoSgIEAyy", // Enter the Key ID generated from the Dashboard
    "amount": opt.amount , // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "MYR",
    "name": document.getElementById('app_name').value,
    "description": "Checkout ID " + opt.id,
    "image": document.getElementById('app_logo').value,
    "order_id": opt.id, //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){
        alert(response.razorpay_payment_id);
        alert(response.razorpay_order_id);
        alert(response.razorpay_signature)
    },
    "prefill": {
        "name": user.name,
        "email": user.email,
        "contact": "+60" + user.phone
    },
    "theme": {
        "color": "#3399cc"
    }
};;
    /*** The entire list of checkout fields is available at* https://docs.razorpay.com/docs/checkout-form#checkout-fields*/
    options.handler = function (response){    
        document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;    
        document.getElementById('razorpay_signature').value = response.razorpay_signature;    
        document.razorpayform.submit();
        };
    // Boolean whether to show image inside a white frame. (default: true)
    //options.theme.image_padding = false;
    var rzp = new Razorpay(options);
    document.getElementById('rzp-button1').onclick = function(e){    rzp.open();    e.preventDefault();}
    </script>
</html>