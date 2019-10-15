 <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">

   <!-- sidebar: style can be found in sidebar.less -->
   <section class="sidebar">

     <!-- Sidebar user panel (optional) -->
     <div class="user-panel">
       <div class="pull-left image">
         <img src="<?= base_url() ?>dist/img/user2-160x160.jpg" class="img-circle">
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
       <li><a href="<?= base_url() ?>Admin/student_accounts"><i class="fa fa-user"></i> <span>Student Accounts</span></a></li>
       <li><a href="<?= base_url() ?>Admin/academic_calendar"><i class="fa fa-bullhorn"></i><span>School Announcements</span></a></li>
       <li><a href="<?= base_url() ?>Admin/curricula"><i class="fa fa-file-text-o"></i><span>All Curricula</span></a></li>
       <li><a href="<?= base_url() ?>Admin/course_petitions"><i class="fa fa-file-text-o"></i><span>Course Petitions</span></a></li>
       <li><a href="<?= base_url() ?>Admin/cor"><i class="fa fa-file-text-o"></i><span>COR Revision</span></a></li>
       <li><a href="<?= base_url() ?>Admin/underload"><i class="fa fa-file-text-o"></i><span>Underload Requests</span></a></li>
       <li><a href="<?= base_url() ?>Admin/overload"><i class="fa fa-file-text-o"></i><span>Overload Requests</span></a></li>
       <li><a href="<?= base_url() ?>Admin/simul"><i class="fa fa-file-text-o"></i><span>Simul Requests</span></a></li>
     </ul>
     <!-- /.sidebar-menu -->
   </section>
   <!-- /.sidebar -->
 </aside>