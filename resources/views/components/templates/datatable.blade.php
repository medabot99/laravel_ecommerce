<div class="card card-{{ \App\Configuration::where('key','cardColor')->first()->value }}">
  <div class="card-header">
    <h3 class="card-title">{{ $title }}</h3>
  </div>
  <!-- /.card-header -->
    <div class="card-body">
      <table id="{{ $id ?? '' }}" class='table table-bordered {{ $hover ? "hover-table" : "" }} table-striped'>
          <thead>
            <tr>
              @foreach ($theaders as $header)
                  <th>{{ $header }}</th>
              @endforeach
            </tr>
          </thead>
          <tbody>
              {{ $slot }}
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
<!-- /.card -->