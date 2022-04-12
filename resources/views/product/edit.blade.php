@extends('layouts.body')

@section('title','Products')

@section('main')

<div class="row">

    <div class="col-md-12">
        <x-templates.forms.edit title="Update Product" :url='route("products.update", [ "product" => $product->id ])'>
    
            <x-forms.input.flat id="name" type="text" placeholder="Name" :value="$product->name" required />

            <x-forms.input.flat id="price" type="number" step="0.01" placeholder="Price" :value="$product->price" required />

            <x-forms.input.flat id="quantity" type="number" placeholder="Quantity" :value="$product->quantity" required />

            <x-forms.file-input.element id="front" label="Photo" placeholder="Upload Product Picture (if skipped will use current)"/>

            <x-forms.checkbox-radio.label label="Select Categories">
                @foreach ($categories as $category)
                    <x-forms.checkbox-radio.element type="checkbox" :checked="$product->categories->pluck('id')->toArray()" id="categories" color="{{ \App\Configuration::where('key','cardColor')->first()->value }}" :placeholder="$category->name" :value="$category->id"/>
                @endforeach
            </x-forms.checkbox-radio.label>

            <x-forms.select.flat placeholder="Status" id="status">
                @foreach ($statuses as $key => $status)
                    <x-forms.select.option :placeholder="$status" :selected="$product->status" :value="$key"/>
                @endforeach
            </x-forms.select.flat>
            
            <x-slot name="footer">
                <div class="col-md-2">
                    <x-buttons.quick type="submit" color="success" size="sm" placeholder="Save" id="submit-product-edit"/>
                </div>
                <div class="col-md-2">
                    <x-buttons.quick type="reset" color="default" size="sm" placeholder="Reset" id="reset-product-edit"/>
                </div>
            </x-slot>
    
        </x-templates.forms.edit>
    </div>

</div>
    
@endsection