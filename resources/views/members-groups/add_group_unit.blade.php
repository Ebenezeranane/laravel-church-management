
@extends('layouts.app')
<link href= "{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">

@section('content')



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
                <li><a href="/admin/member/view">View All Members<span>2</span></a></li>
                <li><a href="admin/member/create">Add new Member</a></li>
               
                @foreach($members as $member)
                <li><a href="/admin/member/{{ $member->id }}"> Settings</a></li>
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
        <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
    <div class="form-group">
             {!! Form::open(['method'=>'POST','action'=>'GroupUnitsController@store']) !!}

            

                  
       {!! Form::label('group_units','Group/unit Name',['class'=>'form-control ']) !!} 
                {!! Form::text('group_units', '', ['class'=>'form-control','placeholder'=>'Group/Unit Name']) !!} <br>
      


       {!! Form::label('members','Members',['class'=>'form-control ']) !!} 
                {!! Form::text('members', '', ['class'=>'form-control','placeholder'=>'Members']) !!} <br>


      

    


       {!! Form::label('head','Head',['class'=>'form-control ']) !!} 
                {!! Form::text('head','', ['class'=>'form-control','placeholder'=>'Head']) !!} <br>


    

       {!! Form::submit('submit', ['class'=>'btn btn-primary mt-3 ']) !!} 

              {!! Form::close() !!}  
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








@endsection







































