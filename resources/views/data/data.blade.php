@extends('master.master_admin')

@section('title')
    All Data
@endsection

@section('search')

        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                    <form class="form-inline"  type="get" action="{{url('/search')}}">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" name="query" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                        <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                            <i class="fas fa-times"></i>
                        </button>
                        </div>
                    </div>
                    </form>
            </div>
        </li>

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
                <a href="{{route('form.create')}}" class="btn btn-primary">Create Data</a>

                </div>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>

                      <th>Assignment Name</th>
                      <th>Reporters Name</th>
                      <th>Starting Date</th>
                      <th>Submission Date</th>
                      <th style="width: 150px">Action</th>


                    </tr>
                  </thead>
                  <tbody>
                  @if($forms->count())
                  @foreach($forms as $form)
                    <tr>
                      <td>{{$form->assignment}}</td>
                      <td>
                      @foreach($form->reporters as $reporter)

                      <span>{{$reporter}}</span>,

                      @endforeach

                      </td>
                      <td>{{$form->start}}</td>


                      <td>{{$form->submission}}</td>

                      <td class="d-flex">
                        <?php if ($form->value == '0') { ?>
                        <form action="{{route('form.update',[$form->id])}}" method="POST">
                          @csrf
                          @method('PUT')
                          <button name="value" type="submit" value="1">Not Published</button>
                        </form>
                        <?php }else{ ?>
                        <button type="button" disabled>Published</button>

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
                        {{$forms->links()}}
                        </div>
                    </div>
              </div>
            </div>
            </div>
            </div>
            </div>
            </div>



@endsection
