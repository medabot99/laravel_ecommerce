<div class="card card-{{ \App\Configuration::where('key','cardColor')->first()->value }}">
    <div class="card-header">
      <h4 class="card-title">{{ $title ?? '' }}</h4>
    </div>
    <div class="card-body">
      <div>
        <div class="btn-group w-100 mb-2">
          <a class="btn btn-info active" href="javascript:void(0)" data-filter="all"> All </a>
          <!-- <a class="btn btn-info" href="javascript:void(0)" data-filter="1"> Category 1 (WHITE) </a> -->
          {{ $category }}
        </div>
        <div class="mb-2">
          @if ($shuffle)
            <a class="btn btn-secondary" href="javascript:void(0)" data-shuffle> Shuffle </a>
          @endif
          @if ($sort)
            <div class="float-right">
                <!--
                <select class="custom-select" style="width: auto;" data-sortOrder>
                    <option value="index"> Sort by Position </option>
                    <option value="sortData"> Sort by Custom Data </option>
                </select> -->
                <div class="btn-group">
                    <a class="btn btn-default" href="javascript:void(0)" data-sortAsc> Ascending </a>
                    <a class="btn btn-default" href="javascript:void(0)" data-sortDesc> Descending </a>
                </div>
            </div>
          @endif
        </div>
      </div>
      <div>
        <div class="filter-container p-0 row">
            {{ $images }}
        </div>
      </div>

    </div>
  </div>