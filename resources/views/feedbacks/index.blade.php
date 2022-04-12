@extends('layouts.body')

@section('title','Feedbacks')

@section('main')

    <div class="row">
        <div class="col-md-12">
            <x-templates.datatable :theaders="$columns" title="Display Feedbacks" id="display-feedback-table">
                @foreach ($feedbacks as $feedback)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $feedback->name }}</td>
                        <td>{{ $feedback->email }}</td>
                        <td>{{ $feedback->message }}</td>
                        <td>
                            <x-buttons.quick type="button" color="danger" size="xs" icon="fa-trash" data-toggle="modal" data-target="#delete-feedback-{{$feedback->id}}-modal"/>
                        </td>
                    </tr>
    
                    <x-modals.element id="delete-feedback-{{$feedback->id}}-modal" title="Attention" cancelColor="default" cancelText="No">
                        <x-slot name="body">
                            Are you sure want to delete this feedback ?
                        </x-slot>
                        <x-slot name="footer">
                            <form action='{{ route("feedbacks.destroy", [ "feedback" => $feedback->id]) }}' method="post">
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