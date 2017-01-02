@extends('layout.master')

@section('bodyClass', 'no-padding')

@section('content')
<h1>
    <i class="{{ $incident->latest_icon }}"></i>
    {{ $incident->name }} <small>{{ formatted_date($incident->created_at) }}</small>
</h1>

<div class="markdown-body">
    {!! $incident->formatted_message !!}
</div>

@if($incident->updates)
<hr>
<div class="incidents">
    @foreach ($incident->updates as $update)
    <div class="incident incident--divided" id="update-{{ $update->id }}">
        <div class="row">
            <div class="col-xs-12">
                <div class="incidents__date">
                    {{ $update->timestamp_formatted }}
                </div>
                <h3>
                    <i class="{{ $update->icon }}"></i>
                    {{ $update->human_status }}
                </h3>
                <hr>
                <div class="markdown-body">
                    {!! $update->formatted_message !!}
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif
@stop
