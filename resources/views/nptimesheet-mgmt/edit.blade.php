@extends('nptimesheet-mgmt.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update timesheet</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('nptimesheet-management.update', ['id' => $nptimesheet->id]) }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                       <div class="form-group{{ $errors->has('week') ? ' has-error' : '' }}">
                            <label for="week" class="col-md-4 control-label">Week</label>

                            <div class="col-md-6">
                                <input id="week" type="text" class="form-control" name="week" value="{{ $nptimesheet->week }}" required>

                                @if ($errors->has('week'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('week') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ $nptimesheet->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>
                            <div class="form-group">
                            <label class="col-md-4 control-label">Department Name</label>
                            <div class="col-md-6">
                                <select class="form-control" name="department_id">
                                    @foreach ($departments as $department)
                                        <option value="{{$department->id}}" {{$department->id == $nptimesheet->department_id ? 'selected' : ''}}>{{$department->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                            <div class="form-group">
                            <label class="col-md-4 control-label">Task Name</label>
                            <div class="col-md-6">
                                <select class="form-control" name="nptask_id">
                                    @foreach ($nptasks as $nptask)
                                        <option value="{{$nptask->id}}" {{$nptask->id == $nptimesheet->nptask_id ? 'selected' : ''}}>{{$nptask->nptask_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                            <div class="form-group{{ $errors->has('remarks') ? ' has-error' : '' }}">
                            <label for="remarks" class="col-md-4 control-label">Remarks</label>

                            <div class="col-md-6">
                                <input id="remarks" type="text" class="form-control" name="remarks" value="{{ $nptimesheet->remarks }}" required autofocus>

                                @if ($errors->has('remarks'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('remarks') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                            <div class="form-group{{ $errors->has('monday') ? ' has-error' : '' }}">
                            <label for="monday" class="col-md-4 control-label">Monday</label>

                            <div class="col-md-6">
                                <input id="monday" type="text" class="form-control" name="monday" value="{{ $nptimesheet->monday }}" required autofocus>

                                @if ($errors->has('monday'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('monday') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                           <div class="form-group{{ $errors->has('tuesday') ? ' has-error' : '' }}">
                            <label for="tuesday" class="col-md-4 control-label">Tuesday</label>

                            <div class="col-md-6">
                                <input id="tuesday" type="text" class="form-control" name="tuesday" value="{{ $nptimesheet->tuesday }}" required autofocus>

                                @if ($errors->has('tuesday'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tuesday') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                           <div class="form-group{{ $errors->has('wednesday') ? ' has-error' : '' }}">
                            <label for="wednesday" class="col-md-4 control-label">Wednesday</label>

                            <div class="col-md-6">
                                <input id="wednesday" type="text" class="form-control" name="wednesday" value="{{ $nptimesheet->wednesday }}" required autofocus>

                                @if ($errors->has('wednesday'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('wednesday') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                            <div class="form-group{{ $errors->has('thursday') ? ' has-error' : '' }}">
                            <label for="thursday" class="col-md-4 control-label">Thursday</label>

                            <div class="col-md-6">
                                <input id="thursday" type="text" class="form-control" name="thursday" value="{{ $nptimesheet->thursday }}" required autofocus>

                                @if ($errors->has('thursday'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('thursday') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                           <div class="form-group{{ $errors->has('friday') ? ' has-error' : '' }}">
                            <label for="friday" class="col-md-4 control-label">Friday</label>

                            <div class="col-md-6">
                                <input id="friday" type="text" class="form-control" name="friday" value="{{ $nptimesheet->friday }}" required autofocus>

                                @if ($errors->has('friday'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('friday') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                           <div class="form-group{{ $errors->has('saturday') ? ' has-error' : '' }}">
                            <label for="saturday" class="col-md-4 control-label">Saturday</label>

                            <div class="col-md-6">
                                <input id="saturday" type="text" class="form-control" name="saturday" value="{{ $nptimesheet->saturday }}" required autofocus>

                                @if ($errors->has('saturday'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('saturday') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                           <div class="form-group{{ $errors->has('sunday') ? ' has-error' : '' }}">
                            <label for="sunday" class="col-md-4 control-label">Sunday</label>

                            <div class="col-md-6">
                                <input id="sunday" type="text" class="form-control" name="sunday" value="{{ $nptimesheet->sunday }}" required autofocus>

                                @if ($errors->has('sunday'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sunday') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
