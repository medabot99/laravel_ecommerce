@extends('layouts.body')

@section('title','Users')

@section('main')

    <div class="row">
        <div class="col-md-12">
            <x-templates.datatable :theaders="$columns" title="Display Users" id="display-user-table">
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src='{{ $user->picture_url }}' class="img-circle elevation-2" height="50px" width="50px" alt="User Image">
                        </td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->role->name }}</td>
                        <td>{{ $user->updated->toFormattedDateString() }}</td>
                        <td>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <x-buttons.quick type="href" :link='url("user/view/$user->id")' color="primary" size="xs" icon="fa-eye"/>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                    <x-buttons.quick type="href" :link='url("user/edit/$user->id")' color="success" size="xs" icon="fa-edit"/>
                                </div>
                                <div class="col-md-6">
                                    <x-buttons.quick type="button" color="danger" size="xs" icon="fa-trash" data-toggle="modal" data-target="#delete-user-{{$user->id}}-modal"/>
                                </div>
                            </div>
                        </td>
                    </tr>
    
                    <x-modals.element id="delete-user-{{$user->id}}-modal" title="Attention" cancelColor="default" cancelText="No">
                        <x-slot name="body">
                            Are you sure want to delete this user {{ $user->name }} ?
                        </x-slot>
                        <x-slot name="footer">
                            <form action='{{ url("user/delete/{$user->id}") }}' method="post">
                                @csrf
                                @method('DELETE')
                                <x-buttons.quick type="submit" placeholder="Yes" color="danger"/>
                            </form>
                        </x-slot>
                    </x-modals.element>
                @endforeach
            </x-templates.datatable>
        </div>
    </div>
                    
@endsection