@extends('layout.index')

@section('title')
    {{__('Dashboard')}}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <a href="{{route('users.index')}}" class="text-decoration-none">
                <div class="card bg-primary-subtle">
                    <div class="card-body">
                        <div class="fs-1"><i class="fa-solid fa-users"></i></div>
                        <p class="text-muted text-sm mt-4 mb-2">Total</p>
                        <h6 class="mb-3">Users</h6>
                        <h3 class="mb-0">{{$totalUsers}}</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <a href="{{route('users.index')}}" class="text-decoration-none">
                <div class="card bg-danger-subtle">
                    <div class="card-body">
                        <div class="fs-1"><i class="fa-solid fa-user-large"></i></div>
                        <p class="text-muted text-sm mt-4 mb-2">Total</p>
                        <h6 class="mb-3">Employees</h6>
                        <h3 class="mb-0">{{$totalEmployees}}</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <a href="{{route('users.index')}}" class="text-decoration-none">
                <div class="card bg-warning-subtle">
                    <div class="card-body ">
                        <div class="fs-1"><i class="fa-solid fa-user-tie"></i></div>
                        <p class="text-muted text-sm mt-4 mb-2">Total</p>
                        <h6 class="mb-3">Admins</h6>
                        <h3 class="mb-0">{{$totalAdmins}}</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <a href="{{route('tasks.index')}}" class="text-decoration-none">
                <div class="card bg-success-subtle">
                    <div class="card-body ">
                        <div class="fs-1"><i class="fa-solid fa-list-check"></i></div>
                        <p class="text-muted text-sm mt-4 mb-2">Total</p>
                        <h6 class="mb-3">Tasks</h6>
                        <h3 class="mb-0">{{$totalTasks}}</h3>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12">
            <div class="card">
                <a href="{{ route('tasks.index') }}" class="text-decoration-none text-dark">
                    <div class="card-header">
                        <h5 class="mt-1 mb-0">{{__('Most Due Tasks')}}</h5>
                    </div>
                    <hr>
                </a>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Completed') }}</th>
                                <th>{{ __('Due Date') }}</th>
                                <th>{{ __('Assigned to') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($nearestDueTasks as $nearestDueTask)
                                <tr>
                                    <td>{{ $nearestDueTask->title }}</td>
                                    <td class="text-center">
                                        @if ($nearestDueTask->completed_at)
                                            <span class="badge bg-success">Yes</span>
                                        @else
                                            <span class="badge bg-danger">No</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span
                                            class="{{ (strtotime($nearestDueTask->due_date) < time()) ? 'text-danger' : '' }}">{{ date("Y-m-d", strtotime($nearestDueTask->due_date)) }}</span>
                                    </td>
                                    <td>{{ $nearestDueTask->assignedTo ? $nearestDueTask->assignedTo->name : '[Unassigned]' }}</td>

                                    <td>
                                        <div class="d-flex">
                                            <form method="POST"
                                                  action="{{ route('task.destroy', $nearestDueTask->id) }}"
                                                  class="me-2">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="btn btn-danger btn-sm align-items-center bs-pass-para"
                                                        data-bs-toggle="tooltip" title="{{ __('Delete') }}">
                                                    <i class="fa-regular fa-trash-can"></i>
                                                </button>
                                            </form>

                                            <form method="get" action="{{ route('task.done', $nearestDueTask->id) }}"
                                                  class="me-2">
                                                @csrf
                                                @method('put')
                                                <button type="submit"
                                                        class="btn btn-success btn-sm align-items-center bs-pass-para"
                                                        data-bs-toggle="tooltip" title="{{ __('Done') }}">
                                                    <i class="fa-solid fa-check"></i>
                                                </button>

                                            </form>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="card ">
                <a href="{{ route('users.index') }}" class="text-decoration-none text-dark">
                    <div class="card-header">
                        <h5 class="mt-1 mb-0">{{__('Top Contributors')}}</h5>
                    </div>
                    <hr>
                </a>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Task Count') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($mostContributors as $mostContributor)
                                <tr>
                                    <td>{{ $mostContributor->assignedTo->name }}</td>
                                    <td>{{ $mostContributor->task_count }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <form method="get" action="" class="me-2">
                                                @csrf
                                                @method('get')
                                                <button type="submit"
                                                        class="btn btn-success btn-sm align-items-center bs-pass-para"
                                                        data-bs-toggle="tooltip" title="{{ __('Promote') }}">
                                                    <i class="fa-solid fa-star"></i>
                                                </button>
                                            </form>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
