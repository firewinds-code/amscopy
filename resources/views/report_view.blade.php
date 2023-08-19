@extends("layouts.masterlayout")
@section('title','Dealer')
@section('bodycontent')
<div class="content-wrapper mobcss">
    <div class="card">
        <div class="card-body">
            @if ($message = Session::get('success'))
            <div class="alert alert-secondary" role="alert">
                {{ $message  }}
              </div>
            @endif
           
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<label for="inputEmail4"><i class="fa fa-download" style='color: black' aria-hidden="true"><b> Download Report</b></i></label>
<hr>
<br>
<a href="{{route('ams.export')}}" class="btn btn-primary" title="Download Report">Download</a>
            
        </div>
    </div>
</div>
@endsection
