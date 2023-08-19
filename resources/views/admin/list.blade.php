@extends('layouts.adminlayout')
@section('title', 'Dealer')
@section('bodycontent')
  <div class="content-wrapper mobcss">
    <div class="card">
      <div class="card-body">
        @if ($message = Session::get('error'))
          <div class="alert alert-danger" role="alert">
            {{ $message }}
          </div>
        @endif
        @if ($message = Session::get('success'))
          <div class="alert alert-success" role="alert">
            {{ $message }}
          </div>
        @endif
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Role</th>
              <th scope="col">Email</th>
              <th scope="col">Date</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $item)
              <tr>
                <th>{{ $item->name }}</th>
                <td>{{ $item->role }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->created_at }}</td>
                <td> <a href="{{ route('destroy-agent', $item->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Do you want to delete?')"><i class="fa fa-trash-o" aria-hidden="true" style="cursor: pointer;"></i> Delete</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
