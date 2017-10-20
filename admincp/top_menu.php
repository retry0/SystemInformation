<?php
$break_notif = get_notification_break();
$deadline_notif = get_notification_deadline();

$total_notif = count($break_notif)+count($deadline_notif);
?>

<ul class="nav navbar-nav">
  <li class="dropdown notifications-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
      <i class="fa fa-bell-o"></i>
      <?php
      if($total_notif > 0){
        ?><span class="label label-danger"><?=$total_notif?></span><?php
      }
      ?>
    </a>
    <ul class="dropdown-menu">
      <li class="header">You have <?=$total_notif?> new notifications</li>
      <li>
        <!-- inner menu: contains the actual data -->
        <ul class="menu">
            <?php
            //if(count($break_notif) > 0){
                foreach($break_notif as $k => $val){
                    if($val['total'] <=0 )
                        continue;
                        
                    echo "<li>
                        <a href='view-working.php'>
                          <i class='fa fa-clock-o text-yellow'></i> ".$val['total']." ".$val['type']."(s) timeout break.
                        </a>
                      </li>";
                }
            //}
            //if(count($deadline_notif) > 0){
                foreach($deadline_notif as $k => $val){
                    if($val['total'] <=0 )
                        continue;
                        
                    echo "<li>
                        <a href='view-working.php'>
                          <i class='fa fa-clock-o text-red'></i> ".$val['total']." ".$val['type']."(s) 3 days deadline.
                        </a>
                      </li>";
                }
            //}
            ?>
        </ul>
      </li>
      <!--<li class="footer"><a href="#">View all</a></li>-->
    </ul>
  </li>
  <!-- Tasks: style can be found in dropdown.less -->
  
  
  <!-- User Account: style can be found in dropdown.less -->
  <li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
      <img src="image/avatar5.png" class="user-image" alt="User Image"/>
      <span class="hidden-xs"><?php echo $u['full_name']; ?></span>
    </a>
    <ul class="dropdown-menu">
      <!-- User image -->
      <li class="user-header">
        <img src="image/avatar5.png" class="img-circle" alt="User Image" />
        <p>
          <?php echo $u['full_name']; ?>
          <small>Aktif - <?php echo $u['join_date']; ?></small>
        </p>
      </li>
      <!-- Menu Body -->
      <li class="user-body">
        
      </li>
      <!-- Menu Footer-->
      <li class="user-footer">
        <div class="pull-left">
          <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
        </div>
        <div class="pull-right">
          <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
        </div>
      </li>
    </ul>
  </li>
</ul>