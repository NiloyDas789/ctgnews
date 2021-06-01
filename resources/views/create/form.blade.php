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
                                <form action="{{route('form.store')}}" method="POST">
                                @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name"><h5>Assignment Name</h5></label>
                                            <input type="name" name="assignment" class="form-control" id="name" placeholder="Enter Name" required>
                                        </div>

                                        
                                        <div class="col-sm-12">
                                        <!-- Select multiple-->
                                            <div class="form-group">
                                            <label for="reporters">Reporters Name</label>
                                                <div class="d-flex flex-wrap">
                                                
                                    
                                                
                                                    <div class="form-check">
                                                    <input class="form-check-input" name="reporters[]" value="রাকিব" type="checkbox">
                                                    <label class="form-check-label"> রাকিব </label>
                                                    </div>
                                                    <div class="form-check">
                                                    <input class="form-check-input" name="reporters[]" value="প্রিতম নন্দী" type="checkbox" >
                                                    <label class="form-check-label"> প্রিতম নন্দী </label>
                                                    </div>
                                                    
                                                    <div class="form-check">
                                                    <input class="form-check-input" name="reporters[]" value="রিফাত" type="checkbox" >
                                                    <label class="form-check-label"> রিফাত </label>
                                                    </div>

                                                    <div class="form-check">
                                                    <input class="form-check-input" name="reporters[]" value="আবির" type="checkbox" >
                                                    <label class="form-check-label"> আবির </label>
                                                    </div>
                                                
                                                    
                                                
                                                
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="date">Starting Date</label>
                                                <input type="date" id="date" class="form-control" name="start">
                                        </div>

                                        <div class="form-group">
                                            <label for="date">Submission Date</label>
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