@extends('master.master_admin')

@section('title')
    All Data
@endsection



@section('content')



<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Form Data</h1>
          </div><!-- /.col -->
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Dashboard</a></li>
              <li class="breadcrumb-item active">Catagory</li>
            </ol>
          </div>  -->
           <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content">
	      <div class="container-fluid">
	        <div class="row">
	          <div class="col-lg-12">
              <div class="card">
              <div class="card-header">

                <div class=" d-flex justify-content-between align-items-center">
                <h3 class="card-title">List</h3>
                <a href="{{route('assignment.create')}}" class="btn btn-primary">Create Data</a>

                </div>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>

                      <th>Assignment Name</th>

                      <th>Starting Date</th>
                      <th>Submission Date</th>

                      <th>Time left</th>
                      <th style="width: 150px">Action</th>


                    </tr>
                  </thead>
                  <tbody>
                  @if($assignments->count())
                  @foreach($assignments as $assignment)
                    <tr>
                      <td>{{$assignment->assignment}}</td>

                      <td>{{$assignment->start}}</td>


                      <td>{{$assignment->submission}}</td>

                      <td @if ($assignment->days <= '2' )
                        style="background-color: #bf3434;color: white;"

                      @endif> {{$assignment->days}} days</td>

                      <td class="d-flex">
                        <?php if ($bill->value == '0') { ?>
                        <form action="{{route('bill.update',[$bill->id])}}" method="POST">
                          @csrf
                          @method('PUT')
                          <button name="value" type="submit" value="1" style="color: white;background: #ff7600;width: 120px;">Not Published</button>
                        </form>
                        <?php }else{ ?>
                        <button type="button" style="background:#259e06;color: white;width: 120px;" disabled>Published</button>

                        <?php }?>


                      </td>

                    </tr>
                  @endforeach
                  @else
                  <tr>
                  <td colspan="5">
                  <h5 class="text-center">No Data Found</h5>
                  </td>

                  </tr>



                  @endif

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                    <div class="row text-center pt-5 border-top">
                        <div class="col-md-12">
                        {{$assignments->links()}}
                        </div>
                    </div>
              </div>
            </div>
            </div>
            </div>
            </div>
            </div>



@endsection
