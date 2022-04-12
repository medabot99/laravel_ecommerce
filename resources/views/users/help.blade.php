@extends('layouts.fashi')

@section('title', 'Home')

@section('body')
<div class="container">

    <div class="accordion mt-3" id="accordionExample">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h2 class="mb-0">
              <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                PRODUCTS & ORDERS
              </button>
            </h2>
          </div>

          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                011-11420239 <br> 24 hours a day <br> 7 days a week
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
              <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                I can’t find the answer to my question, how can I reach Customer Service?
              </button>
            </h2>
          </div>
          <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
                You can email Customer Service at hello@toff.com
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingThree">
            <h2 class="mb-0">
              <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                TERMS & CONDITIONS
              </button>
            </h2>
          </div>
          <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
               You are eligible for an online Store Credit for your returned items or exchange of your item within one of our stores, subject to the following conditions of our Return Policy: <br><br>
               1. The following timeframes apply: Online (Malaysia): 30 days from date of delivery. <br>
               2. Proof of purchase must be included with the returned merchandise. You may reprint from your Account records online if lost. <br>
               3. Item(s) must be undamaged, unused, unwashed, unaltered, unworn, in its original condition with all tags and packaging intact.<br>
               4. Accessories, jewellery, sale items, and orders made with promotional codes are NOT ELIGIBLE for exchange nor return.<br>
               5. Returns can only be made once per order number. Meaning that any item(s) requested for exchange or any orders made with return credit cannot be returned or exchanged the subsequent time.<br>
               6. The management reserves the right to limit or refuse a refund.<br>
               7. The above terms and conditions may be changed, revised and/or altered without prior notice.<br>
               8. We will not provide a refund via any other means (i.e. cash, in physical store credit, same mode of payment, bank-in to your account etc.) for any reason and will not entertain any request to do so.<br>
            </div>
          </div>
        </div>
      </div>
</div>

  @endsection
