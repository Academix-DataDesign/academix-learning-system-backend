@props(['type' => 'success', 'sessionName'])

@if (session()->has($sessionName))
    <div class="alert alert-{{ $type }} alert-dismissible fade show mt-3 fade-out-alert" role="alert">
        {{ session($sessionName) }}
    </div>
@endif
