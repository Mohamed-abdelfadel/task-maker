@php use Carbon\Carbon; @endphp
@extends('layout.index')

@section('title')
    {{__('Tasks')}}
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>View tasks</h3>
            <hr>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="table myTable datatable">
                    <thead>
                    <tr>
                        <th> {{__('Title')}}</th>
                        <th> {{__('Description')}}</th>
                        <th> {{__('Completed')}}</th>
                        <th> {{__('Due_date')}}</th>
                        <th> {{__('Assigned to')}}</th>
                        <th>{{__('Created By')}}</th>
                        <th>{{__('Action')}}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($tasks as $task)

                        <tr>
                            <td>{{$task->title}}</td>
                            <td>{{$task->description}}</td>
                            <td>
                                @if($task->completed)
                                    <p class="text-success">Yes</p>
                                @else
                                    <p class="text-danger">No</p>

                                @endif</td>
                            <td>
                                <p class="{{ (strtotime($task->due_date) < time()) ? 'text-danger' : '' }}">{{date("Y-m-d", strtotime($task->due_date))}}</p>
                            </td>
                            <td>{{$task->assignedTo->name}}</td>
                            <td>{{$task->createdBy->name}}</td>


                            <td>
                                <div class="ms-2">
                                    <form id="delete-form-{{ $task->id }}" method="POST" action="{{ route('task.destroy', $task->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm align-items-center bs-pass-para" data-bs-toggle="tooltip" title="{{ __('Delete') }}">
                                            <i class="fa-regular fa-trash-can"></i>                                        </button>
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
@endsection
