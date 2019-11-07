<div class="form-group input-group ">
    <div class="input-group-prepend">
        <span class="input-group-text"><i class="{{ isset($icon) ? $icon : '' }}"></i></span>
    </div>
    {{-- <label for="{{ $id }}">{{ $label }}</label> --}}
    <input
        type="{{ isset($type) ? $type : 'text' }}"
        name="{{ $name }}"
        class="form-control {{ isset($class) ?? $class }}"
        id="{{ $id }}"
        value="{{ isset($value) ? $value : '' }}"
        placeholder="{{ isset($placeholder) ? $placeholder : '' }}">
    @isset ($error)
        <span class="text-danger">{{ $error }}</span>
    @endif
</div>
