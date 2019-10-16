<li class="dropdown messages-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-bell"></i>
        <span class="label label-warning">4</span>
    </a>
    <ul class="dropdown-menu">
        <li class="header">You have 4 messages</li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">

                <?php foreach ($notifications as $notif) : ?>
                    <li>
                        <a href="#">
                            <div class="pull-left">
                                <img src="<?= base_url() ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                            </div>
                            <h4>
                                Support Team
                                <small><?= date("g:i:a", $notif->notif_created_at) ?></small>
                            </h4>
                            <p><?= $notif->notif_content . '<br/>' ?></p>
                        </a>
                    </li>
                <?php endforeach; ?>
                <!-- end message -->
            </ul>
        </li>
        <li class="footer"><a href="#">See All Messages</a></li>
    </ul>
</li>