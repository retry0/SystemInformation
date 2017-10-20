<?php
	require_once('session.php');

    $id = mysqli_real_escape_string($conn,$_GET['id']);
    $now_time = date('Y-m-d H:i:s');
    // $now_time = date('Y-m-20 17:00:00');
    
    if($_GET['which']=='routine'){
        $insert = mysqli_query($conn,"UPDATE `tb_routine_progress` 
                            SET `end_date` = '".$now_time."' 
                            WHERE routine_id = '$id'
                            AND user = '".$u['user']."' ") or die(mysqli_error($conn));

        $query = "SELECT rp.*, st.rate
                        FROM `tb_routine` r
                        LEFT JOIN tb_routine_progress rp
                            ON rp.routine_id = r.id
                        LEFT JOIN tb_staff st
                            ON st.user=r.user
                    WHERE r.id = '".$id."'";
        $header ='location:../routine-progress.php?id='.$id;
    }
    else{
        $_GET['which'] = 'task';
        $sql_1 = mysqli_query($conn,"SELECT * FROM `tb_task` WHERE id = '$id'") or die(mysqli_error());
        $s1 = mysqli_fetch_array($sql_1);
        $project_title = $s1['project_title'];
        $project_task = $s1['project_task'];
        $progress = $s1['progress'];

        $insert = mysqli_query($conn,"UPDATE `tb_task_progress` SET `end_date` = '".$now_time."',`progress` = '$progress' WHERE task_id = '$id' AND user = '$users'") or die(mysqli_error());
        
        $query = "SELECT tp.*, st.rate
                        FROM `tb_task` t
                        LEFT JOIN tb_task_progress tp
                            ON tp.task_id = t.id
                        LEFT JOIN tb_staff st
                            ON st.user=t.user
                    WHERE t.id = '".$id."'";
        
        $header = 'location:../task-progress.php?id='.$id;
    }
    
    //add to transaksi
    $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
    $data = mysqli_fetch_array($result);
    
    $task_start = new DateTime($data['start_date']);
    $task_end = new DateTime($data['end_date']);
    // The diff-methods returns a new DateInterval-object...
    $work_diff = $task_end->diff($task_start);
    
    $break_start = new DateTime($data['break_start']);
    $break_end = new DateTime($data['break_end']);
    $break_diff = $break_end->diff($break_start);
    
    $e = new DateTime('00:00');
    $f = clone $e;
    $e->add($work_diff);
    $e->sub($break_diff);
    $total_diff = $f->diff($e);
    
    $accept_hour = $total_diff->format('%h');  
    $accept_minutes = $total_diff->format('%i');
  
    $accept_cost_hour = $accept_hour * $data['rate'];
    $accept_cost_minute = ($accept_minutes/60) * $data['rate'];
    
    $cost = bcadd($accept_cost_hour, $accept_cost_minute,0);
    
    $type = mysqli_real_escape_string($conn, $_GET['which']);
    $query = "INSERT INTO tb_transaksi
            (type,parent,user,cost)
            VALUES
            ('".$type."', '".$id."', '".$u['user']."', '".$cost."')
            ";
    
    $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
    
    header($header);
?>