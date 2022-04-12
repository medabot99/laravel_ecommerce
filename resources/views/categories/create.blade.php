@extends('layouts.body')

@section('title','Categories')

@section('main')

<div class="row">

    <div class="col-md-12">
        <x-templates.forms.create title="Create New Category" :url='route("categories.store")'>
    
            <x-forms.input.flat id="name" type="text" placeholder="Name" required />
            
            <x-slot name="footer">
                <div class="col-md-2">
                    <x-buttons.quick type="submit" color="primary" size="sm" placeholder="Create" id="submit-category-create"/>
                </div>
                <div class="col-md-2">
                    <x-buttons.quick type="reset" color="default" size="sm" placeholder="Reset" id="reset-category-create"/>
                </div>
            </x-slot>
    
        </x-templates.forms.create>
    </div>

</div>
    
@endsection