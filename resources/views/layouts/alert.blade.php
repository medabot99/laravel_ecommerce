@if($errors->any())
    <!--<x-alert type="danger" header="Error" :message="$errors" />-->
    <div id="error-alert" data-val="{{ $errors }}"></div>
@endif
@if (session()->has('success'))
    <!--<x-alert type="success" header="Successful" :message="session()->get('success')" />-->
        @php
            $successMessage = json_encode(session()->get('success'));
        @endphp
    <div id="success-alert" data-val="{{ $successMessage }}"></div>
@endif