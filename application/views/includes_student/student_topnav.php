<!-- Main Header -->
<header class="main-header">

  <!-- Logo -->
  <a href="<?= base_url() ?>Admin" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>FIT</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>FEUTECH</b></span>
  </a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->

        <!--NOTIFICATION SUBMODULE-->

        <!-- <li class="dropdown notifications-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span id="notifbadge" class="label label-warning"></span>
          </a>
          <ul class="dropdown-menu">
            <li class="header"><strong>Notifications</strong></li>
            <table class="table" id="notiftable">
              <tbody>
              </tbody>
            </table>
            <li class="footer"><a href="#">See all</a></li>
          </ul>
        </li>
        <script type="text/javascript">
          const notifbody = document.querySelector('#notiftable > tbody');

          function loadNotifications() {
            setInterval(function() {
              fetch('<?= base_url() ?>Student/notifications').then(function(response) {
                return response.json();
              }).then(function(obj) {
                populateNotif(obj);
              }).catch(function(error) {
                console.warn(error);
              });

            }, 1000);
          }

          function populateNotif(notif) {

            const notifbadge = document.getElementById('notifbadge');
            notifbadge.innerHTML = notif.length;
            while (notifbody.firstChild) {
              notifbody.removeChild(notifbody.firstChild);
            }
            notif.forEach((row) => {
              const tr = document.createElement("tr");
              var newRow = $.map(row, function(value, index) {
                return [value];
              });
              newRow.forEach((cell) => {
                const td = document.createElement("td");
                td.textContent = cell + " posted an announcement";
                tr.appendChild(td);
              });

              notifbody.appendChild(tr);
            });

          }

          document.addEventListener("DOMContentLoaded", () => {
            loadNotifications()
          });
        </script> -->

        <!--END OF NOTIFICATION SUBMODULE-->

        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">

            <img src="<?= base_url() ?>dist/img/user2-160x160.jpg" class="user-image" alt="User Image">

            <span class="hidden-xs"><?= $this->session->Firstname . ' ' . $this->session->Lastname ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- The user image in the menu -->
            <li class="user-header">
              <img src="<?= base_url() ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

              <p>
                <?= $this->session->Firstname . ' ' . $this->session->Lastname ?>
                <small><?= $this->session->access ?></small>
                <!-- <small>Member since Nov. 2012</small> -->
              </p>
            </li>

            <li class="user-footer">
              <div class="pull-left">
                <a href="<?= base_url() ?>Student/Profile/<?= $this->session->acc_number ?>" class="btn btn-default btn-flat"><span class="fa fa-user"></span>&nbsp&nbsp Profile</a>
              </div>
              <div class="pull-right">
                <a href="<?= base_url() ?>UserAuth/logout" class="btn btn-default btn-flat"><span class="fa fa-sign-out"></span>&nbsp&nbsp Logout</a>
              </div>
            </li>
          </ul>
        </li>

        <!-- Control Sidebar Toggle Button -->
        <!-- <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-calendar"></i></a>
        </li> -->
      </ul>
    </div>
  </nav>
</header>