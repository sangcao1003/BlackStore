@php
    $messages = [];
    if (session()->has('message')) {
        $messages[] = [
            'class' => 'alert-success',
            'content' => session('message'),
        ];
    }
    if (session()->has('error')) {
        $messages[] = [
            'class' => 'alert-danger',
            'content' => session('error'),
        ];
    }
    if (session()->has('warning')) {
        $messages[] = [
            'class' => 'alert-warning',
            'content' => session('warning'),
        ];
    }
@endphp
@foreach ($messages as $message)
    <div class="mt-10 alert alert-dismissible {{ $message['class'] }}">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p>{{ $message['content'] }}</p>
    </div>
@endforeach
