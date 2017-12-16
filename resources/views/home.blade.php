@extends('layouts.app')

@section('content')
<div id="dashboard" class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome! Today is <span>@{{ todayDate }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    var today = new Date();
    var vm = new Vue({
        el: '#dashboard',
        data: {
            todayDate: today.toDateString()
        }
    });
</script>
@endpush
