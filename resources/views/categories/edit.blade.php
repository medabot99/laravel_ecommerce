@extends('layouts.body')

@section('title','Categories')

@section('main')

<div class="row">

    <div class="col-md-12">
        <x-templates.forms.edit title="Update Category" :url='route("categories.update", [ "category" => $category->id ])'>
    
            <x-forms.input.flat id="name" type="text" :value="$category->name" placeholder="Name" required />
            
            <x-slot name="footer">
                <div class="col-md-2">
                    <x-buttons.quick type="submit" color="success" size="sm" placeholder="Save" id="submit-category-edit"/>
                </div>
                <div class="col-md-2">
                    <x-buttons.quick type="reset" color="default" size="sm" placeholder="Reset" id="reset-category-edit"/>
                </div>
            </x-slot>
    
        </x-templates.forms.edit>
    </div>

</div>
    
@endsection