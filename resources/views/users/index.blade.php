@extends('layout.index')

@section('title')
    {{ __('Users') }}
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>{{ __('View Users') }}</h5>
            <hr>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Email') }}</th>
                        <th>{{ __('Role') }}</th>
                        <th>{{ __('Avatar') }}</th>
                        <th>{{ __('Join Date') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role->name }}</td>
                            <td class="text-center"><img src="{{ asset('storage/uploads/avatar/' . $user->avatar) }}" width="40px" alt="Avatar"></td>
                            <td>{{ $user->created_at->format('Y-m-d') }}</td>
                            <td>
                                <form method="POST" action="{{ route('user.destroy', $user->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" title="{{ __('Delete') }}">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-center mt-3">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
