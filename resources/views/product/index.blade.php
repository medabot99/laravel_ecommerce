@extends('layouts.body')

@section('title','Products')

@section('main')

    <div class="row">
        <div class="col-md-12">
            <x-templates.datatable :theaders="$columns" title="Display Products" id="display-product-table">
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->status_text }}</td>
                        <td>
                            @foreach ($product->categories as $category)
                                <p>{{ $category->name }}</p>
                            @endforeach
                        </td>
                        <td>
                            <x-buttons.quick type="href" :link='asset("storage/{$product->photos->first()->source}")' color="info" size="xs" icon="fa-file-image"/>
                        </td>
                        <td>
                            <x-buttons.quick type="href" :link='route("products.edit", [ "product" => $product->id ])' color="success" size="xs" icon="fa-edit"/>
                        </td>
                        <td>
                            <x-buttons.quick type="button" color="danger" size="xs" icon="fa-trash" data-toggle="modal" data-target="#delete-product-{{$product->id}}-modal"/>
                        </td>
                    </tr>
    
                    <x-modals.element id="delete-product-{{$product->id}}-modal" title="Attention" cancelColor="default" cancelText="No">
                        <x-slot name="body">
                            Are you sure want to delete this product {{ $product->name }} ?
                        </x-slot>
                        <x-slot name="footer">
                            <form action='{{ route("products.destroy", [ "product" => $product->id]) }}' method="post">
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