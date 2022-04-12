@extends('layouts.body')

@section('title','Gallery')

@section('main')

<div class="row">
    <div class="col-md-12">
        <x-gallery.fancy title="Test Gallery" shuffle="shuffle">
            <x-slot name="category">
                <a class="btn btn-info" href="javascript:void(0)" data-filter="1"> Category 1 </a>
                <a class="btn btn-info" href="javascript:void(0)" data-filter="2"> Category 2 </a>
            </x-slot>

            <x-slot name="images">
                <x-gallery.image title="Image 1" url="gallery/image1.jpg" category="1" type="image"/>
                <x-gallery.image title="Image 2" url="gallery/image2.jpg" category="1" type="image"/>
                <x-gallery.image title="Image 3" url="https://www.youtube.com/watch?v=t30XVSHeb7A&list=RDcE29iuE5JpQ&index=10" :thumbnail="asset('/storage/gallery/image3.jpg')" category="2" type="youtube"/>
            </x-slot>
        </x-gallery.fancy>
    </div>
</div>
    
@endsection