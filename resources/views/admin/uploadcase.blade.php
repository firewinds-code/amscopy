@extends("layouts.adminlayout")
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
            <form method="POST" action="{{ route('submitUpload') }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input name="file" type="file" class="form-control" id="file"
                                        placeholder="Upload File">
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="form-group">
                                    <button onclick="" name="submit" type="submit"
                                    class="btn btn-primary toastrDefaultSuccess">Upload File</button>
                                </div>
                            </div>
                        </div>
                        <a href="{{ asset('images/case_detail_info.csv') }}" download><i class="fa fa-download"> Download Format</i></a><br>
                    </div>  
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
