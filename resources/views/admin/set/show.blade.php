@extends('layouts.app', ['title' => $set->title])

@section('content')
<section class="welcome course">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="preheader"><a href="/challenge/{{ $set->challenge->id }}">{{ $set->challenge->title}}</a></h2>
        <h1 class="billboard"><strong>{{ $set->title }}</strong></h1>
        @role('admin')
          <div class="" style="margin-top: 2rem;"><a href="/set/{{ $set->id }}/edit" class="btn btn-primary">Edit Set</a>  <a href="/admin/set/{{ $set->id }}" class="btn btn-secondary">Admin</a></div>
        @endrole
      </div>
    </div>
  </div>
</section>
<section class="content lesson">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-7 main">
        <ul>
          @foreach($set->challenge->users as $user)
            <li><a href="/admin/set/{{ $set->id }}/user/{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</a></li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</section>
<section class="content rose">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-8">
        <table class="table">
          @foreach($sets as $st)
                <tr class="lessons">
                  <td><a href="/challenge/{{$set->challenge->id}}/set/{{$set->id}}">{{ $st->title }}</a> @if($st->status == 0) **DRAFT** @endif @if($st->status == 2) **REVIEW** @endif</td>
                </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</section>
@endsection