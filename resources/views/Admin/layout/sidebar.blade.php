


 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('admin/assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('admin/assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    




       
 <!-- start Admins -->
 <li class="nav-item    {{Route::is('admins.index')||Route::is('admins.create')?'menu-open': ''}}">
            <a href="#" class="nav-link     {{Route::is('admins.index')||Route::is('admins.create')?'active ': ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
             Admins
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admins.index')}}" class="nav-link  {{Route::is('admins.index')?'active ': ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admins.create')}}" class="nav-link  {{Route::is('admins.create')?'active ': ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Admin</p>
                </a>
              </li>
        
        
            </ul>
          </li>  
          
        
               
       
 <!-- start doctors -->
 <li class="nav-item    {{Route::is('doctors.index')||Route::is('doctors.create')?'menu-open': ''}}">
            <a href="#" class="nav-link     {{Route::is('doctors.index')||Route::is('doctors.create')?'active ': ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
             Doctors
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('doctors.index')}}" class="nav-link  {{Route::is('doctors.index')?'active ': ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Doctors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('doctors.create')}}" class="nav-link  {{Route::is('doctors.create')?'active ': ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Doctor</p>
                </a>
              </li>
            </ul>
</li>
                
       

 <!-- start patients-->
 <li class="nav-item    {{Route::is('patients.index')||Route::is('patients.create')?'menu-open': ''}}">
            <a href="#" class="nav-link     {{Route::is('patients.index')||Route::is('patients.create')?'active ': ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
             Patients
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('patients.index')}}" class="nav-link  {{Route::is('patients.index')?'active ': ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Patients</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('patients.create')}}" class="nav-link  {{Route::is('patients.create')?'active ': ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Patient</p>
                </a>
              </li>
            </ul>
</li>
         




 <!-- start examinations-->
 <li class="nav-item    {{Route::is('examinations.index')||Route::is('examinations.create')?'menu-open': ''}}">
            <a href="#" class="nav-link     {{Route::is('examinations.index')||Route::is('examinations.create')?'active ': ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
             Examinations
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('examinations.index')}}" class="nav-link  {{Route::is('examinations.index')?'active ': ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Examinations</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('examinations.create')}}" class="nav-link  {{Route::is('examinations.create')?'active ': ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Examination</p>
                </a>
              </li>
            </ul>
</li>
       


 <!-- start specialties -->
 <li class="nav-item    {{Route::is('specialties.index')||Route::is('specialties.create')?'menu-open': ''}}">
            <a href="#" class="nav-link     {{Route::is('specialties.index')||Route::is('specialties.create')?'active ': ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
             Specialties
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('specialties.index')}}" class="nav-link  {{Route::is('specialties.index')?'active ': ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Specialties</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('specialties.create')}}" class="nav-link  {{Route::is('specialties.create')?'active ': ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Specialty</p>
                </a>
              </li>
        
        
            </ul>
          </li>  
          
        
       
 <!-- start settings -->
 <li class="nav-item    {{Route::is('settings.index')||Route::is('settings.create')?'menu-open': ''}}">
            <a href="#" class="nav-link     {{Route::is('settings.index')||Route::is('settings.create')?'active ': ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
             Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('settings.index')}}" class="nav-link  {{Route::is('settings.index')?'active ': ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Setting</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('settings.create')}}" class="nav-link  {{Route::is('settings.create')?'active ': ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Setting</p>
                </a>
              </li>
        
        
            </ul>
          </li>  
          
        
       
                
         
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>