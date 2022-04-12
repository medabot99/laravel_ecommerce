@extends('layouts.body')

@section('title','Users')

@section('main')

<div class="row">

    <div class="col-md-12">
        <x-templates.forms.create title="Create New User" :url='url("/user/create")'>

            <x-forms.input.flat id="username" type="text" placeholder="Username" required />
    
            <x-forms.input.flat id="name" type="text" placeholder="Full Name" required />
    
            <x-forms.input.flat id="email" type="email" placeholder="Email" required />
    
            <x-forms.checkbox-radio.label label="Select system role">
                @foreach ($roles as $role)
                    <x-forms.checkbox-radio.element type="radio" id="role" color="{{ \App\Configuration::where('key','cardColor')->first()->value }}" :placeholder="$role->name" :value="$role->id"/>
                @endforeach
            </x-forms.checkbox-radio.label>
    
            <x-forms.input.flat id="password" type="password" placeholder="Password" required />
            
            <x-slot name="footer">
                <div class="col-md-2">
                    <x-buttons.quick type="submit" color="primary" size="sm" placeholder="Create New User" id="submit-user-create"/>
                </div>
                <div class="col-md-2">
                    <x-buttons.quick type="reset" color="default" size="sm" placeholder="Reset" id="reset-user-create"/>
                </div>
            </x-slot>
    
        </x-templates.forms.create>
    </div>

</div>
    
@endsection