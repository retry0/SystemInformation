<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="image/avatar5.png" class="img-circle" alt="User Image" />
        </div>
	    <div class="pull-left info" style="margin-top: 5px;">
            <p>Welcome, <?php echo $u['full_name']; ?><br><small><?php echo date('d F Y'); ?></small></p>
                 <div id="divjam"></div>
	    </div>
    </div>
    <ul class="sidebar-menu" style="font-size: 12px;">
        <li>
            <a href="index.php">
                <i class="fa fa-dashboard"></i> DASHBOARD
                
            </a>
        </li>
        <li>
        </li>
        <?php
            $level = $u['level'];
            if( strtolower($level) == 'supervisor' ){
                include('side-spv.php');
                //modified by asule
                // include('side-staff.php');
            }
            else if($level == 'staff'){
                include('side-staff.php');
            }
            else {
                include('side-admin.php');
                //modified by asule
                // include('side-spv.php');
                // include('side-staff.php');
            }
        ?>
    </ul>
</section>
<script>
  $(document).ready(function() {
    setInterval(function() {
         $('#divjam').load('clock.php?acak='+ Math.random());
    }, 1000);
  });
</script>