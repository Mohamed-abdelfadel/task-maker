@extends('layout.index')

@section('title')
    {{__('Tasks')}}
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Create task</h5>
            <hr>
        </div>
        <div class="card-body row">
            <form action="{{route('tasks.store')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" id="title" name="title" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="date" id="start_date" name="start_date" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="due_date" class="form-label">End Date</label>
                                <input type="date" id="due_date" name="due_date" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="created_by" class="form-label">Created By</label>
                                <select id="created_by" name="created_by" class="form-control" required>
                                    <option value="">Select Created By</option>
                                    @foreach($admins as $admin)
                                        <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="assigned_to" class="form-label">Assigned To</label>
                                <select id="assigned_to" name="assigned_to" class="form-control" required>
                                    <option value="">Select Assigned To</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer mt-5">
                        <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
                        <input type="submit" value="Create" class="btn btn-success">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
