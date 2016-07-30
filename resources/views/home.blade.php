@extends('layouts.app')
@section('title', 'Welcome')

@section('content-top')
  <div class="jumbotron jumbotron-welcome stick-to-nav">
    <div class="container">
      <h1>Anime Sentinel</h1>
      <p>
        Ever wanted to watch an older or lesser known anime but you can't find it on your favourite streaming site? Search our database to find out which sites do stream it.
        This site aims to index which anime is available on which streaming sites, making all this information accesible through a single service.
      </p>
      <p>
        Do you want to receive notifications when an anime you're watching has a new episode available? Then sing up and link your MAL account.
        This site will constantly check the 'recently aired' pages of streaming sites, so you can get notified whenever a new episode is uploaded.
      </p>
      <p>
        <a class="btn btn-primary btn-lg" href="{{ url('/about') }}" role="button">Read More &raquo;</a>
      </p>
    </div>
  </div>
@endsection

@section('content-center')
  <div class="welcome-content-wrapper">
    <div class="content-header">Recently Uploaded</div>
    @foreach($recent as $video)
      @include('components.synopsis', [
        'syn_mal' => false,
        'syn_show' => $video->show,
        'syn_unique' => $video->show->id.'-'.$video->translation_type.'-'.$video->episode_num,
        'syn_video' => $video,
      ])
    @endforeach
  </div>
@endsection
