@extends('app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">Your account has been successfully deleted.</div>
                <div class="panel-body">
                    <div class="alert alert-info text-center">
                        <p>We're sorry to see you go. Care to tell us why?</p>
                    </div><!-- /.alert alert-info -->

                    <form class="form-horizontal" role="form" method="POST" action="{{{ route('turnkey.feedback.handle') }}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <div class="col-md-12">
                                <textarea class="form-control" name="body" rows="10"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Goodbye
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
