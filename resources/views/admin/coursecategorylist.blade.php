@extends('admin.layouts.adminlayout')
@section('content')
 <!--main content start-->
 <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
                                    <h3 class="page-header"><i class="fa fa-table"></i> Table</h3>
<!--                                    <ol class="breadcrumb">
                                        <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                                        <li><i class="fa fa-table"></i>Table</li>
                                        <li><i class="fa fa-th-list"></i>Basic Table</li>
                                    </ol>-->
				</div>
			</div>
              <!-- page start-->
                @if(Session::has('sucessfullyupdate'))
                {{ Session::get('sucessfullyupdate') }}
                @endif
                          
                    @if(Session::has('success'))
                    {{ Session::get('success') }}
                     @endif                          
                     @if(Session::has('error'))
                      {{ Session::get('error') }}
                     @endif
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">                             
                              <a href="addcoursecategory">Add Course Category</a>
                          </header>
                         
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th><i class="icon_profile"></i> Name</th>                                
                                 <th><i class="icon_mail_alt"></i> Tile</th>
                                 <th><i class="icon_calendar"></i> Description</th>
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>
                           @if(count($coursecategory) === 1)
                           @foreach($coursecategory as $user)
                              <tr>
                                 <td>{!! $user->id !!}</td>
                                 <td>{!! $user->title !!}</td>
                                  <td>{!! substr($user->description, 0,2) !!}</td>
                                 <td>
                                  <div class="btn-group">
                                      <a class="btn btn-primary" href="{{ url('admin'.'/edituserlist/'.$user->id) }}"><i class="icon_plus_alt2"></i></a>
                                      <a class="btn btn-danger" href="{{ url('admin'.'/delcourse/'.$user->id) }}"><i class="icon_close_alt2"></i></a>
                                  </div>
                                  </td>
                              </tr>                            
                              @endforeach
                              @else
                               <tr>
                                   <td colspan="4">Not any data found.</td>                                 
                              </tr>      
                              @endif
                              
                           </tbody>
                        </table>
                         {!! str_replace('/admin?', '?', $coursecategory->render()) !!}
                          
                         
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
      <div class="text-right">
<!--            <div class="credits">
                <a href="https://bootstrapmade.com/free-business-bootstrap-themes-website-templates/">Business Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>-->
        </div>
  </section> <!--main content end-->
@endsection