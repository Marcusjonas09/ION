 <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">

   <!-- sidebar: style can be found in sidebar.less -->
   <section class="sidebar">

     <!-- Sidebar user panel (optional) -->
     <div class="user-panel">
       <div class="pull-left image">
         <img src="<?= base_url() ?>dist/img/default_avatar.png" class="img-circle">
       </div>
       <div class="pull-left info">
         <p><?= $this->session->Firstname . ' ' . $this->session->Lastname ?></p>
         <!-- Status -->
         <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
       </div>
     </div>

     <!-- Sidebar Menu -->
     <ul class="sidebar-menu" data-widget="tree">
       <li class="header">MAIN NAVIGATION</li>
       <!-- Optionally, you can add icons to the links -->
       <li class="active"><a href="<?= base_url() ?>Admin/"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
       <li><a href="<?= base_url() ?>SuperAdmin/view_all_admin"><i class="fa fa-user"></i> <span>Admin Accounts</span></a></li>
       <li><a href="<?= base_url() ?>SuperAdmin/manage_students"><i class="fa fa-user"></i> <span>Manage Students</span></a></li>
       <!-- <li><a href="<?= base_url() ?>SuperAdmin/school_announcements"><i class="fa fa-bullhorn"></i><span>School Announcements</span>
       <li><a href="<?= base_url() ?>SuperAdmin/academic_calendar"><i class="fa fa-bullhorn"></i><span>School Calendar</span></a></li>
       <li><a href="<?= base_url() ?>SuperAdmin/curricula"><i class="fa fa-file-text-o"></i><span>All Curricula</span></a></li>
       <li><a href="<?= base_url() ?>SuperAdmin/course_petitions"><i class="fa fa-file-text-o"></i><span>Course Petitions</span></a></li>
       <li><a href="<?= base_url() ?>SuperAdmin/cor"><i class="fa fa-file-text-o"></i><span>COR Revision</span></a></li>
       <li><a href="<?= base_url() ?>SuperAdmin/underload"><i class="fa fa-file-text-o"></i><span>Underload Requests</span></a></li>
       <li><a href="<?= base_url() ?>SuperAdmin/overload"><i class="fa fa-file-text-o"></i><span>Overload Requests</span></a></li>
       <li><a href="<?= base_url() ?>SuperAdmin/simul"><i class="fa fa-file-text-o"></i><span>Simul Requests</span></a></li> -->
     </ul>
     <!-- /.sidebar-menu -->
   </section>
   <!-- /.sidebar -->
 </aside>