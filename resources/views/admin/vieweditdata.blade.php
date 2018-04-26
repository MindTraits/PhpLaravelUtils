@extends('admin.layouts.adminlayout')
@section('content')
 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
            <div class="row">
                  <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                            <li><i class="fa fa-laptop"></i>Dashboard</li>						  	
                        </ol>
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
                             Edit User Registration
                          </header>                                                           
                          <div class="panel-body">
                              {!! Form::open(array('url'=>'admin/updatedata'))!!}                              
                                @foreach($editusers as $user)
                                  <div class="form-group">
                                      <label for="exampleInputEmail1">User name</label>
                                      <input type="text" name="username" value="{{ $user->name }}" class="form-control" id="exampleInputEmail1" placeholder="Enter user">
                                  </div>
                                
                                <div class="form-group">
                                      <label for="exampleInputEmail1">User role </label>
                                      <select name="userrole" class="form-control m-bot15">
                                        <option value="">-Select role-</option>
                                        <option value="1" {{ $user->role == '1' ? 'selected="selected"' : '' }}>Teacher</option>
                                        <option value="2" {{ $user->role == '2'  ? 'selected="selected"' : '' }}>Student</option>
                                      </select>                                     
                                  </div>
                                
                                    <div class="form-group">
<!--                                  <label for="exampleInputEmail1">Email address</label>-->
                                     <input type="hidden" name="hiddenid" class="form-control" id="hiddenid" value="{{ $user->id }}">
                                  </div>
                                  <button type="submit" class="btn btn-primary">Update</button>
                             @endforeach
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