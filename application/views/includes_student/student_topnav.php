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