@extends('layouts.app')
@section('content')
<link href= "{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">

          



             {{-- sidebarr --}}

<div class="page-wrapper toggled">
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <a href="#" id="toggle-sidebar">
      <div class="sidebar-brand">
        <a href="#">TLS</a>
      </div>
      <div class="sidebar-header">
        <div class="user-pic">
          <img class="img-responsive img-rounded" src="http://127.0.0.1:8080/admin.jpg" alt="admin-profile" width="60px">
        </div>
        <div class="user-info">
          <span class="user-name">
            @foreach($admins as $admin)
            {{ $admin->name }}
            @endforeach
          </span>

          <span class="user-role">Administrator</span>
          <div class="user-status">
            <a href="#">
              <i class="fa fa-circle"></i>
              <span>Online</span></a>
          </div>
        </div>
      </div>
      <!-- sidebar-header  -->
      <div class="sidebar-search">
      
      </div>
      <!-- sidebar-search  -->
      <div class="sidebar-menu">
        <ul>
          <li class="header-menu"><span>General</span></li>
          <li class="sidebar-dropdown">
            <a href="/admin"><i class="fa fa-dashboard"></i><span>DASHBOARD</span></a>
           
          </li>
          <li class="sidebar-dropdown">
            <a href="#"><i class="fa fa-user"></i><span>MEMBERSHIP</span></a>
            <div class="sidebar-submenu">
              <ul>
                <li><a href="/admin/member/view">View All Members</a></li>
                <li><a href="/admin/member/create">Add new Member</a></li>
               
                @foreach($members as $member)
                <li><a href="/admin/member/{{ $member->id }}">Member Settings</a></li>
                @endforeach
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#"><i class="fa fa-fire"></i><span>SERVICES</span></a>
            <div class="sidebar-submenu">
              <ul>
                <li><a href="/admin/services/view">View Services</a></li>
                <li><a href="/admin/service/create">Add Service</a></li>
                 
               
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="/admin/group-units/view"><i class="fa fa-users"></i><span>GROUPS/UNITS</span></a>
            
          </li>

          <li class="sidebar-dropdown">
            <a href="#"><i class="fa fa-money"></i><span>FINANCE</span></a>
            <div class="sidebar-submenu">
              <ul>
               <li><a href="/admin/finance/income-expenses/view">Income</a></li>
                <li><a href="/admin/finance/income-expenses/view">Expense</a></li>
                <li><a href="/admin/services/view">Remitance</a></li>
                <li><a href="/admin/finance/financial-report">Financial Report</a></li>
              </ul>
            </div>
          </li>s


            <li class="sidebar-dropdown">
            <a href="#"><i class="fa fa-cog"></i><span>SETTINGS</span></a>
            <div class="sidebar-submenu">
              <ul>
                  @foreach($members as $member)
                <li><a href="/admin/member/{{ $member->id }}">Member Settings</a></li>
                @endforeach
                <li><a href="/admin/services/view">Service Settings</a></li>
                
                <li><a href="/admin/group-units/view">Group Settings</a></li>
              </ul>
            </div>
          </li>
         
          


        </ul>
      </div>
      <!-- sidebar-menu  -->
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->

    
  </nav>
  <!-- sidebar-wrapper  -->
  <main class="page-content">
    <div class="container-fluid">
      <div class="row">

        {{-- view member --}}
         <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                  @foreach($members as $member)
                  {{-- card header --}}
            <div class="card">
                <div class="card-header"><h4 class="text-capitalize"><strong>{{ $member->surname}}&nbsp&nbsp{{ $member->othernames }}</strong></h4>

              {!! Form::open(['action'=>['MembershipController@destroy',$member->id],'method'=>'POST']) !!} 
                {!! Form::hidden('_method', 'DELETE' ) !!} 
                {!! Form::submit('DEL', ['class'=>'btn btn-danger btn-sm pull-right mt-0']) !!} 
                {!! Form::close() !!} 

              <a href="/admin/member/{{ $member->id }}/edit" class="btn btn-primary btn-sm pull-right">EDIT</a>
                 </div>

            {{--  card body --}}
            <div class="card-body">

              <table class="table table-responsive font-weight-bold">
                <tbody>
                  <tr>
                    <td>
               <img width ="120px" height="120px" src="/storage/profile_pics/{{ $member->profile_pic }}" class="rounded-circle shadow-lg mb-5 ml-5" alt="profile_pic">
             </td><td></td><td></td><td></td>

             {{-- Bio Details --}}
             <td >
               <h5 class="text-danger "><strong>BIO DETAILS</strong></h5>Sex:&nbsp {{$member->sex }}<br><br>
               Marital Status:&nbsp{{ $member->marital_status }}<br><br>
               Date Of Birth:&nbsp{{ $member->date_of_birth }}<br><br>
              Place Of Birth:&nbsp{{ $member->birth_place }}

             </td><td></td><td></td>

             {{-- Address Details --}}
             <td>
               <h5 class="text-danger"><strong>CONTACT DETAILS</strong></h5>
                Address: &nbsp {{$member->address  }}<br><br>
                E-Mail Address: &nbsp {{$member->e_mail_address  }}<br><br>
                Phone: &nbsp {{$member->telephone  }}<br><br>
                City / Town: &nbsp {{$member->city_town  }}

             </td><td></td><td></td>

             {{-- Extra Details --}}
             <td>
               <h5 class="text-danger"><strong>EXTRA DETAILS</strong></h5>
               Occupation: &nbsp {{$member->occupation  }}<br><br>
                Position: &nbsp {{$member->postion  }}
                
             </td>

           </tr>
                
                <tr>
                  <td>
                {{-- send mail --}}
               <a href="mailto:{{ $member->e_mail_address }}?subject=...&body=Body-goes-here" class="btn btn-info ml-5 shadow-sm">SEND E-MAIL</a>
             </td>
           </tr>
              
            
              {{-- bio details--}}
               
            
            </tbody>
            </div>
          </div>
        























               @endforeach
            </div>
        </div>
    </div>
</div>
       </div>
    </div>
  </main>
  <!-- page-content" -->
</div>
<!-- page-wrapper -->



   

    <!-- Load sidebar Toggle Script -->
    <script src="{{ asset('/js/sidebar.js') }}">
    </script>

          

@endsection()