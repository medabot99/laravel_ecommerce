@extends('layouts.body')

@section('title','Orders')

@section('main')

    <div class="row">
        <div class="col-md-12">
            <x-templates.datatable :theaders="$columns" title="Display Orders" id="display-order-table">
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->created->toFormattedDateString() }}</td>
                        <td>
                            @foreach ($order->products->unique() as $product)
                                <p>{{ $product->name }} x {{ $product->pivot->quantity }}</p>
                            @endforeach
                        </td>
                        <td>{{ $order->status_text }}</td>
                        <td>{{ $order->total }}</td>
                        <td>
                            <x-buttons.quick type="button" color="danger" size="xs" icon="fa-trash" data-toggle="modal" data-target="#delete-order-{{$order->id}}-modal"/>
                        </td>
                    </tr>
    
                    <x-modals.element id="delete-order-{{$order->id}}-modal" title="Attention" cancelColor="default" cancelText="No">
                        <x-slot name="body">
                            Are you sure want to delete this order ?
                        </x-slot>
                        <x-slot name="footer">
                            <form action='{{ route("orders.destroy", [ "order" => $order->id]) }}' method="post">
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