@extends('admin.layouts.adminlayout')
@section('content')
 <!--main content start-->
 <section id="main-content">
          <section class="wrapper">
		  <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-table"></i> Table</h3>
                    </div>
                 </div>
              <!-- page start-->
                    @if(Session::has('sucessfullyupdate'))
                    {{ Session::get('sucessfullyupdate') }}
                     @endif

                     @if(Session::has('success'))
                    {{ Session::get('success') }}
                     @endif
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">                             
                              <a href="post">Add User</a>
                          </header>
                         
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th><i class="icon_profile"></i> Name</th>                                
                                 <th><i class="icon_mail_alt"></i> Email</th>
                                 <th><i class="icon_mail_alt"></i> Role</th>
                                 <th><i class="icon_calendar"></i> Date</th>
                                 <th><i class="icon_cogs"></i>Action</th>
                              </tr>
                             @foreach($users as $user)
                              <tr>
                                 <td>{!! $user->name !!}</td>
                                 <td>{!! $user->email !!}</td>
                                 @if($user->role=='2')
                                 <td>Teacher</td>
                                 @else
                                  <td>Student</td>
                                  @endif
                                 <td>{!! date('F d, Y', strtotime($user->created_at)) !!}</td>
                                 <td>
                                  <div class="btn-group">
                                      <a class="btn btn-primary" href="{{ url('admin'.'/edituserlist/'.$user->id) }}"><i class="icon_plus_alt2"></i></a>
                                      <a class="btn btn-danger" href="{{ url('admin'.'/deluser/'.$user->id) }}"><i class="icon_close_alt2"></i></a>
                                  </div>
                                  </td>
                              </tr>                            
                              @endforeach
                           </tbody>
                        </table>
                         {!! str_replace('/admin?', '?', $users->render()) !!}
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
      <div class="text-right">
            <div class="credits">
<!--                <a href="https://bootstrapmade.com/free-business-bootstrap-themes-website-templates/">Business Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>-->
            </div>
        </div>
  </section> <!--main content end-->
@endsection