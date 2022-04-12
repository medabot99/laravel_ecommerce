<div class="card card-{{ \App\Configuration::where('key','cardColor')->first()->value }}" id="card-body">
    <div class="card-header">
        <h3 class="card-title">{{ $title ?? '' }}</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="{{ $url ?? '' }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            {{ $slot }}
    
            <div class="card-footer">
                <div class="row">
                    {{ $footer }}
                </div>
            </div>
        </div>
    </form>
</div>
<!-- /.card -->
