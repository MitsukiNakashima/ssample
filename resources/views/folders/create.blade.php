@extends('template')
@section('title','ToDo App')
@section('css')
  <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
@endsection
@section('styles')
  @include('share.flatpickr.styles')
@endsection
@section('main')
  <main>
    <div class="container">
      <div class="row">
        <div class="col col-md-offset-3 col-md-6">
          <nav class="panel panel-default">
            <div class="panel-heading">フォルダを追加する</div>
            <div class="panel-body">
              @if($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach($errors->all() as $message)
                      <li>{{ $message }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
              <form action="{{ route('folders.create') }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="title">フォルダ名</label>
                  <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" />
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-primary">送信</button>
                </div>
              </form>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </main>
@endsection
@section('footer')
@endsection

@section('scripts')
  @include('share.flatpickr.scripts')
@endsection