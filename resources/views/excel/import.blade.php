@extends('layouts.body')

@section('title','Import Excel')

@section('main')

<div class="row">

    <div class="col-md-12">
        <x-templates.forms.create title="Import Excel for User" :url='url("/user/excel")'>

            <x-forms.file-input.element id="excel" label="Excel File" placeholder="Upload Excel" required/>
    
            <x-forms.checkbox-radio.label label="Select system role">
                @foreach ($roles as $role)
                    <x-forms.checkbox-radio.element type="radio" id="role" color="{{ \App\Configuration::where('key','cardColor')->first()->value }}" :placeholder="$role->name" :value="$role->id"/>
                @endforeach
            </x-forms.checkbox-radio.label>
            
            <x-slot name="footer">
                <div class="col-md-2">
                    <x-buttons.quick type="submit" color="primary" size="sm" placeholder="Import" id="submit-excel-import"/>
                </div>
                <div class="col-md-2">
                    <x-buttons.quick type="reset" color="default" size="sm" placeholder="Reset" id="reset-excel-import"/>
                </div>
            </x-slot>
    
        </x-templates.forms.create>
    </div>

</div>
    
@endsection