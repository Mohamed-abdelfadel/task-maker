@php use Carbon\Carbon; @endphp
@extends('layout.index')

@section('title')
    {{__('Tasks')}}
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>{{ __('View tasks') }}</h5>
            <hr>
        </div>
        <div class="card-body row">
            <div class="table-responsive col-12">
                <table class="table ">
                    <thead class="thead-dark">
                    <tr>
                        <th>{{ __('Title') }}</th>
                        <th>{{ __('Description') }}</th>
                        <th>{{ __('Completed') }}</th>
                        <th>{{ __('Due Date') }}</th>
                        <th>{{ __('Assigned to') }}</th>
                        <th>{{ __('Created By') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td class="text-center">
                                @if ($task->completed_at)
                                    <span class="badge bg-success">{{ __('Yes') }}</span>
                                @else
                                    <span class="badge bg-danger">{{ __('No') }}</span>
                                @endif
                            </td>
                            <td>
                                <span
                                    class="{{ (strtotime($task->due_date) < time()) ? 'text-danger' : '' }}">{{ date("Y-m-d", strtotime($task->due_date)) }}</span>
                            </td>
                            <td>{{ $task->assignedTo ? $task->assignedTo->name : __('[Unassigned]') }}</td>
                            <td>{{ $task->createdBy ? $task->createdBy->name : __('[Unassigned]') }}</td>
                            <td>
                                <div class="d-flex">
                                    <form id="delete-form-{{ $task->id }}" method="POST"
                                          action="{{ route('task.destroy', $task->id) }}" class="me-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-danger btn-sm align-items-center bs-pass-para"
                                                data-bs-toggle="tooltip" title="{{ __('Delete') }}">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </form>

                                    <form method="get" action="{{ route('task.done', $task->id) }}" class="me-2">
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
                <div class="d-flex justify-content-center mt-3">
                    {{ $tasks->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
