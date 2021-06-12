@extends('layouts.dashboard')
@section('content')
   
<div class="container">
   
    <div class="card">
      <div class="card-header">
      <form action="{{route('shortcuts.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
        <label for="">Link:</label>
        <input type="text" name="link" value="{{ old('link')}}" class="form-control @error('link') is-invalid @enderror">
        @error('link')
        <p class="invalid-feedback">{{$message}}</p>
         @enderror

    </div>
    <div>
        <button type="submit" class="btn btn-primary">Generate</button>
    </div>
        </form>
       
      </div>
      <div class="card-body">
   
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif
   
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Short Link</th>
                        <th>Link</th>
                        <th>Number Of Clicks</th>

                    </tr>
                </thead>
                <tbody>
                @foreach($shortcuts as $shortcut)
                        <tr>        

                            <td>{{ $shortcut->id }}</td>
                            <td><a href="{{ route('shorten', $shortcut->shortcut) }}" target="_blank" id="demo" onclick="{{'$shortcut.click'}}">{{ route('shorten', $shortcut->shortcut) }}</a> </td>
                            <td>{{ $shortcut->link }}</td>
                            <td>{{ $shortcut->click }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
      </div>
    </div>
   
</div>
    
@endsection

