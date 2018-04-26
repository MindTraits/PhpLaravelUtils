@extends('admin.layouts.adminlayout')
@section('content')
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->              
            <div class="row">
                  <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
                  </div>                
            </div>              
            @if(count($errors)>0) 
            @foreach($errors->all() as $error)
            {{ $error }}
            @endforeach
            @endif              
            
                     <div class="row">
                       <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                            Course Category
                          </header>                          
                          @if(Session::has('success'))
                         {{ Session::get('success') }}
                          @endif                          
                          @if(Session::has('error'))
                           {{ Session::get('error') }}
                          @endif                     
                          <div class="panel-body">
                              {!! Form::open(array('url'=>'admin/store'))!!}                              
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category name <span class="required">*</span></label>
                                <input type="text" name="categoryname" class="form-control" id="exampleInputEmail1" placeholder="Enter Course name">
                            </div>

                          <div class="form-group">
                              <label class="col-lg-2 control-label">Course desc <span class="required">*</span></label>
                              <div class="col-lg-10">
                                  <textarea name="coursedesc" id="" class="form-control" cols="30" rows="5"></textarea>
                              </div>
                          </div>
                                <button type="submit" class="btn btn-primary">Submit</button>                              
                              {!! Form::close() !!}
                          </div>
                      </section>
                  </div>
              </div>
              <!-- Inline form-->
          </section>
          <div class="text-right">
          <div class="credits">               
          
          </div>
        </div>
      </section>
      <!--main content end-->
@endsection