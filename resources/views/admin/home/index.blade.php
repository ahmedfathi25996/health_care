@extends('admin.layouts.layout')
@section('title')
  Dashboard
@endsection

@section('content')
   <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Users Activities</span>
              <span class="info-box-number">{{$activities->count()}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-comments"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Feedbacks</span>
              <span class="info-box-number">{{$feedbacks->count()}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-medkit 
"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Diseases</span>
              <span class="info-box-number">{{$diseases->count()}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Members</span>
              <span class="info-box-number">{{$users->count()}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-6">
          <div class="nav-tabs-custom">
              {!! $userChart->html() !!}  
             

          </div>
        </div>
        <div class="col-md-6">
          <div class="nav-tabs-custom">
               {!! $diseaseChart->html() !!}
             

          </div>
        </div>

      </div>
      <div class="row">
        <!-- Left col -->
        <div class="col-md-6">
                  <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-envelope"></i>

              <h3 class="box-title">Quick Email</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body">
              <form method="POST" action="{{ url('/adminpanel/sendmail') }}">
                {{ csrf_field() }}
                <div class="form-group">
                 <select type="email" name="email" class="form-control input-sum">
                                    <option value="null">Null</option>
                                   @foreach($users as $user)
                                   <option value="{{$user->email}}">{{$user->email}}</option>
                                   @endforeach
                               </select>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" placeholder="Subject">
                </div>
                <div>
                  <textarea class="textarea" name="message" placeholder="Message"
                            style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
                <div class="box-footer clearfix">
             <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Send
                                </button>
            </div>
              </form>
            </div>
            
          </div>
        </div>

            <div class="col-md-6">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Members</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger">8 New Members</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    @foreach($lastUsers as $usr)
                    <li>
                      <img src="/images/{{ $usr->image  }}" height="60" width="60" alt="User Image">
                      <a class="users-list-name" href="#">{{$usr->name}}</a>
                     
                    </li>
                   @endforeach
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="/adminpanel/users" class="uppercase">View All Users</a>
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
      </div>

            

            <!-- /.col -->
          
          <!-- /.row -->
 <div class="row">
        <!-- Left col -->
        <div class="col-md-10">
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Diseases</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Disease ID</th>
                    <th>Disease Name</th>
                    <th>Symptoms</th>
                    
                   
                  </tr>
                  </thead>
                  <tbody>
                     @foreach($lastDiseases as $disease)
                  <tr>
                    <td>{{$disease->id}}</td>
                    <td>{{$disease->name}}</td>
                    <td>@foreach($disease->symptoms as $dis)
                         {{$dis->name}} - 
                         @endforeach</td>
                    
                   
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="/adminpanel/diseases/create" class="btn btn-sm btn-info btn-flat pull-left">Add New Disease</a>
              <a href="/adminpanel/diseases" class="btn btn-sm btn-default btn-flat pull-right">View All Diseases</a>
            </div>
            <!-- /.box-footer -->
          </div>
        </div>
      </div>
          <!-- /.box -->
        </div>
       
      </div>
      <!-- /.row -->
    </section>
    {!! Charts::scripts() !!}
{!! $userChart->script() !!} 
{!! $diseaseChart->script() !!}


     @endsection