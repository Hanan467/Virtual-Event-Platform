@extends('organizer.layouts.app')

@section('page-title', 'Dashboard')
@section('breadcrumb', 'Create Evento')

@section('content')

@if (session('success'))
        <div class="alert alert-success alert-dismissible fade category" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade category" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
                <div class="col-7 mt-5 mx-5 ms-5 center">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Create event</h4>
                                        <form class="form-horizontal" id="myForm" action="{{ route('organizer.createevents') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                            <div class="form-group row mx-5">
                                                <div class="col-sm-12">
                                                    <label class="col-form-label" for="name">Title</label>
                                                    <input type="text" class="form-control" id="name" name="name">
                                                </div>
                                            </div>
                                            <div class="form-group row mx-5">
                                                <div class="col-sm-12">
                                                <label class="col-form-label" for="description">Description</label>
                                                <textarea name="description" id="description" rows="3" class="col-sm-12"  ></textarea>       
                                            </div>
                                            </div>
                                            <div class="form-group row mx-5">
                                                <div class="col-sm-6">
                                                <label class="col-form-label" for="start_time">Start time</label>
                                                <input type="datetime" class="form-control" id="start_time" name="start_time">

                                        </div>
                                        <div class="col-sm-6">
                                                <label class="col-form-label" for="end_time">End time</label>
                                                <input type="datetime" class="form-control" id="end_time" name="end_time">             
                                        </div>
                                            </div>
                                            <div class="form-group row mx-5">
                                                <div class="col-sm-6">
                                                    <label for="videostsream">Video stream Url</label>
                                                    <input type="url" class="form-control" id="videostsream" name="videostsream">
                                                </div>
                                                <div class="col-sm-6">
                                                <div class="custom-file">
                                                  
                                                    <label for="image">Banner Image</label>
                                                    <input class="form-control" type="file" id="image" name="image">
                                                </div>
                                                </div>
                                            </div>

                                            <div class="form-group row mx-5">
                                                <div class="col-sm-6">
                                                    <label for="price">Ticket price</label>
                                                    <input type="number" class="form-control" id="price" name="price">
                                                </div>
                                                <div class="col-sm-6">
                                                <div class="custom-file">
                                                  
                                                    <label for="amount">Ticket amount</label>
                                                    <input class="form-control" type="number" id="amount" name="amount">
                                                </div>
                                                </div>
                                            </div>

                                            <div class="card-footer">
                                            <button type="submit" class="btn btn-primary float-right">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

<script>
    function categoryChanged(event) {
        var selectedcategoryId = event.target.value;
        document.getElementById('selectedcategoryId').value = selectedcategoryId;
    }

    function conditionChanged(event) {
        var selectedcondition = event.target.value;
        document.getElementById('selectedcondition').value = selectedcondition;
    }
</script>

@endsection