<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading">
        <i class="fa fa-audio-description text-danger"></i> {{ env('APP_NAME') }}
    </div>
    <div class="list-group list-group-flush">
        <a href="{{ url('/home') }}" class="list-group-item list-group-item-action bg-light">
            <i class="fa fa-tachometer-alt"></i>
            {{  __('My Advertisements') }}
        </a>
        <a href="{{ url('/advertise/new') }}" class="list-group-item list-group-item-action bg-light">
            <i class="fa fa-plus"></i>
            {{ __('New Advertisement') }}
        </a>
    </div>
</div>
