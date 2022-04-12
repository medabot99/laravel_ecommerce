@extends('layouts.body')

@section('title','Categories')

@section('main')

    <div class="row">
        <div class="col-md-12">
            <x-templates.datatable :theaders="$columns" title="Display Categories" id="display-category-table">
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <x-buttons.quick type="href" :link='route("categories.edit", [ "category" => $category->id ])' color="primary" color="success" size="xs" icon="fa-edit"/>
                        </td>
                        <td>
                            <x-buttons.quick type="button" color="danger" size="xs" icon="fa-trash" data-toggle="modal" data-target="#delete-category-{{$category->id}}-modal"/>
                        </td>
                    </tr>
    
                    <x-modals.element id="delete-category-{{$category->id}}-modal" title="Attention" cancelColor="default" cancelText="No">
                        <x-slot name="body">
                            Are you sure want to delete this category {{ $category->name }} ?
                        </x-slot>
                        <x-slot name="footer">
                            <form action='{{ route("categories.destroy", [ "category" => $category->id]) }}' method="post">
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