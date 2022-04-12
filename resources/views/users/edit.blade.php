@extends('layouts.body')

@section('title','Users')

@section('main')

<div class="row">

    <div class="col-md-12">
        <x-templates.forms.edit title="Edit User" :url='url("/user/edit/{$user->id}")'>
    
            <x-forms.input.flat id="username" type="text" placeholder="Username" :value="$user->username" required />
    
            <x-forms.input.flat id="name" type="text" placeholder="Full Name" :value="$user->name" required />
    
            <x-forms.input.flat id="email" type="email" placeholder="Email" :value="$user->email" required />
    
            <x-forms.checkbox-radio.label label="Select system role">
                @foreach ($roles as $role)
                    <x-forms.checkbox-radio.element type="radio" id="role" :checked="$user->role->id" color="{{ \App\Configuration::where('key','cardColor')->first()->value }}" :placeholder="$role->name" :value="$role->id"/>
                @endforeach
            </x-forms.checkbox-radio.label>
    
            <x-forms.input.flat id="password" type="password" placeholder="Password" required />
            
            <x-slot name="footer">
                <div class="col-md-2">
                    <x-buttons.quick type="submit" color="success" size="sm" placeholder="Save" id="submit-user-edit"/>
                </div>
                <div class="col-md-2">
                    <x-buttons.quick type="reset" color="default" size="sm" placeholder="Reset" id="reset-user-edit"/>
                </div>
            </x-slot>
    
        </x-templates.forms.edit>
    </div>

</div>
    
@endsection