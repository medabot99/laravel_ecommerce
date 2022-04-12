@extends('layouts.body')

@section('title','Products')

@section('main')

<div class="row">

    <div class="col-md-12">
        <x-templates.forms.create title="Create New Product" :url='route("products.store")'>
    
            <x-forms.input.flat id="name" type="text" placeholder="Name" required />

            <x-forms.input.flat id="price" type="number" step="0.01" placeholder="Price" required />

            <x-forms.input.flat id="quantity" type="number" placeholder="Quantity" required />

            <x-forms.file-input.element id="front" label="Photo" placeholder="Upload Product Picture"/>

            <x-forms.checkbox-radio.label label="Select Categories">
                @foreach ($categories as $category)
                    <x-forms.checkbox-radio.element type="checkbox" id="categories" color="{{ \App\Configuration::where('key','cardColor')->first()->value }}" :placeholder="$category->name" :value="$category->id"/>
                @endforeach
            </x-forms.checkbox-radio.label>

            <x-forms.select.flat placeholder="Status" id="status">
                @foreach ($statuses as $key => $status)
                    <x-forms.select.option :placeholder="$status" :value="$key"/>
                @endforeach
            </x-forms.select.flat>
            
            <x-slot name="footer">
                <div class="col-md-2">
                    <x-buttons.quick type="submit" color="primary" size="sm" placeholder="Create" id="submit-product-create"/>
                </div>
                <div class="col-md-2">
                    <x-buttons.quick type="reset" color="default" size="sm" placeholder="Reset" id="reset-product-create"/>
                </div>
            </x-slot>
    
        </x-templates.forms.create>
    </div>

</div>
    
@endsection