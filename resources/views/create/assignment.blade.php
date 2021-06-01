@extends('master.master_admin')

@section('title')
    Form
@endsection


@section('content')
<div class="content">
	<div class="container-fluid">
	    <div class="row">
	        <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-6 offset-lg-3 offset-md-8 offset-md-2">
                                <form action="{{route('assignment.store')}}" method="POST">
                                @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name"><h5>Assignment Name</h5></label>
                                            <input type="name" name="assignment" class="form-control" id="name" placeholder="Enter Assignment Name" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="reporter"><h5>Assigned To</h5></label>
                                            <input type="name" name="reporter" class="form-control" id="reporter" placeholder="Enter Reporter Name" required>
                                        </div>



                                        
                                        
                                        
                                        <div class="form-group">
                                            <label for="date">Starting Date</label>
                                                <input type="date" id="date" class="form-control" name="start">
                                        </div>

                                        <div class="form-group">
                                            <label for="date">Deadline Date</label>
                                                <input type="date" id="date" class="form-control" name="submission">
                                        </div>

                                        


                                        

                                        

                                        

                                    
                        
                                    
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection