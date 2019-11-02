        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="<?= base_url() ?>/Student/profile">

            <img src="<?= base_url() ?>dist/img/default_avatar.png" class="user-image" alt="User Image">

            <span class="hidden-xs"><?= $this->session->Firstname . ' ' . $this->session->Lastname ?></span>
          </a>

        </li>

        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="<?= base_url() ?>UserAuth/logout"><span class="fa fa-sign-out"></span>&nbsp&nbsp Logout</a>
        </li>

        <!-- Control Sidebar Toggle Button -->
        <!-- <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-calendar"></i></a>
        </li> -->
        </ul>
        </div>
        </nav>
        </header>