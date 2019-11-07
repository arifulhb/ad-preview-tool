<div class="row mt-2">
    <div class="col-lg-4 col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ isset($title) ? $title : '' }}</h4>
            </div>
            <div class="card-body">
                {{ $slot }}
            </div>
            <div class="card-footer pb-2 pt-2">
                {{ $footer }}
            </div>
        </div>
    </div>
</div>
