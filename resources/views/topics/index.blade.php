@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-9">
        <ul class="list-unstyled">
            @foreach ($topics as $topic)
          <li class="media">
            <div class="media-body">
              <h2 class="mt-0 mb-1"><a href="" style="color:#343a40;">{{ $topic->title }}</a></h2>
              <p class="text-secondary">
                <a href="" class="text-secondary">{{ $topic->person }}</a>
                                                 →
                update:{{ $topic->updated_at->diffForHumans() }}
              </p>
            </div>
          </li>
          <br>
            @endforeach
        </ul>
    </div>

    <div class="col-md-3">
        @include('pages.gonggao')
        <br>
        @include('pages.label')
        <br>
        @include('pages.link')
    </div>
</div>
@stop
