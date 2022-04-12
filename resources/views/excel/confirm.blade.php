@extends('layouts.body')

@section('title','Import Excel')

@section('main')

<div class="row">

    <div class="col-md-12">
        <x-templates.forms.create title="Import Excel for User" :url='url("/user/excel_confirm")'>

            <x-forms.select.flat id="username" placeholder="Select Username Excel Column" required>
                    <option>Please Select Excel Column Header</option>
                @foreach ($headings as $title)
                    <x-forms.select.option :value="$title" :placeholder="$title . '[Excel Column]'"/>
                @endforeach
            </x-forms.select.flat>

            <x-forms.select.flat id="name" placeholder="Select Name Excel Column" required>
                <option>Please Select Excel Column Header</option>
                @foreach ($headings as $title)
                    <x-forms.select.option :value="$title" :placeholder="$title . '[Excel Column]'"/>
                @endforeach
            </x-forms.select.flat>

            <x-forms.select.flat id="email" placeholder="Select Email Excel Column" required>
                <option>Please Select Excel Column Header</option>
                @foreach ($headings as $title)
                    <x-forms.select.option :value="$title" :placeholder="$title . '[Excel Column]'"/>
                @endforeach
            </x-forms.select.flat>

            <x-forms.select.flat id="phone" placeholder="Select Phone Excel Column" required>
                <option>Please Select Excel Column Header</option>
                @foreach ($headings as $title)
                    <x-forms.select.option :value="$title" :placeholder="$title . '[Excel Column]'"/>
                @endforeach
            </x-forms.select.flat>

            <x-forms.select.flat id="address" placeholder="Select Address Excel Column" required>
                <option>Please Select Excel Column Header</option>
                @foreach ($headings as $title)
                    <x-forms.select.option :value="$title" :placeholder="$title . '[Excel Column]'"/>
                @endforeach
            </x-forms.select.flat>

            <x-forms.checkbox-radio.label label="Select system role">
                @foreach ($roles as $role)
                    <x-forms.checkbox-radio.element type="radio" :checked="$roleSelected" id="role" color="{{ \App\Configuration::where('key','cardColor')->first()->value }}" :placeholder="$role->name" :value="$role->id"/>
                @endforeach
            </x-forms.checkbox-radio.label>
    
            <x-forms.input.flat id="password" type="password" placeholder="Default Password for All" required />

            <input type="hidden" name="excelFile" value="{{ $excelFile }}">
            
            <x-slot name="footer">
                <div class="col-md-2">
                    <x-buttons.quick type="submit" color="primary" size="sm" placeholder="Import" id="submit-confirm-excel"/>
                </div>
                <div class="col-md-2">
                    <x-buttons.quick type="reset" color="default" size="sm" placeholder="Reset" id="reset-confirm-excel"/>
                </div>
            </x-slot>
    
        </x-templates.forms.create>
    </div>

</div>
    
@endsection