@extends('layouts.trainee')
@section('content')
{{ 'hello' }}
<div class="progress">
    <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:{{ $courseProgress }}%">
      Your Progress in Course (success)
    </div>
  </div>

{{ $courseProgress }}
</div>
@endsection