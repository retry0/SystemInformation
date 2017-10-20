<?php include('session.php'); 

if($_GET['del']){
    //var_dump($_GET['del']);
    //die();
    foreach (glob('../upload/files/'.$_GET['del']) as $filename) {
        unlink($filename);
    }
    
    header('location:slider.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrator Area | Selamat Datang ...</title>
    <meta name="description" content=" ">
    <meta name="keywords" content=" ">
    <meta name="resource-type" content="document" />
    <meta http-equiv="content-type" content="text/html; charset=US-ASCII" />
    <meta http-equiv="content-language" content="en-us" />
    <meta name="author" content="Arie Budi" />
    <meta name="contact" content="arie.budip@gmail.com" />
    <meta name="copyright" content="Copyright (c) Ariebudi.com. All Rights Reserved." />
    <meta name="robots" content="index, nofollow">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="css/skins/skin-black.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text or -->
    <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="js/jquery-1.11.0.min.js"></script>
  </head>
  <body class="skin-black">
  	<div class="wrapper">
  		<header class="main-header">
  			<a href="index.php" class="logo">ADMINISTRATOR</a>
  			<nav class="navbar navbar-static-top" role="navigation">
	          <!-- Sidebar toggle button-->
	          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
	            <span class="sr-only">Toggle navigation</span>
	          </a>
	          <div class="navbar-custom-menu">
	          	<?php include('top_menu.php'); ?>
	          </div>
	        </nav>
  		</header>

  		<aside class="main-sidebar">
	        <!-- sidebar: style can be found in sidebar.less -->
	        <?php require_once('sidebar.php'); ?>
	        <!-- /.sidebar -->
	    </aside>

        <div class="content-wrapper">
            <section class="content-header">
              <h1>
                Manage
                <small>Slides</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Slides</li>
              </ol>
              <hr>
            </section>
            <section class="content">
                <div class="container" >
                    <div class="form-group rounded text-center row bg-light dropzone" style='cursor:pointer;border:1px dashed gray;height:150px;'>
                      <div class='col align-self-center'>
                        <div >Click or drag images here</div>
                      </div>
                    </div>
                    
                    <input id="fileupload" type="file" name="files[]" multiple style='display:none;'>
                    
                    <div class="row progress mb-2">
                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" ></div>
                    </div>
                    
                    <div class="row thumbnail">
                        <?php
                        $dir_file = "../upload/files/";
                        if (is_dir($dir_file) AND $dh = opendir($dir_file)){
                        
                            while( ($file = readdir($dh))!==false ){
                                $fileinfo = pathinfo($file);
                                $ext = $fileinfo['extension'];
                                // $dir_file.$file;
                                if(getImageSize($dir_file.$file)){
                                    ?>
                                    <div style='position:relative;'>
                                        <img src="<?=$dir_file.$file?>" alt="Uploaded Thumbnail" style='margin-right:5px;max-height:200px;width:200px;' class="col col-md-2 img-thumbnail mr-auto ml-auto">
                                        <a href='?del=<?=rawurlencode($file)?>'><span class='fa fa-times-circle' style='color:red;position:absolute;margin-left:-20px;cursor:pointer;'> </span></a>
                                    </div>
                                    <?php
                                }
                            }
                            closedir($dh);
                        }
                        ?>
                    </div>
                </div>
            </section>
        </div>
  	</div>
  	

    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>   
    <!-- Morris.js charts -->
    <script src="plugins/raphael/raphael-min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="js/app.min.js" type="text/javascript"></script>
    
    <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
    <script src="plugins/fileupload/jquery.ui.widget.js"></script>
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="plugins/fileupload/jquery.iframe-transport.js"></script>
    <!-- The basic File Upload plugin -->
    <script src="plugins/fileupload/jquery.fileupload.js"></script>
    <script>
        //$('.progress-bar').addClass('progress-bar-animated');
        //$('.progress-bar').removeClass('progress-bar-animated');
        $(function () {
            $('.dropzone').click(function(){
                $('#fileupload').click();
            })

            'use strict';
            // Change this to the location of your server-side upload handler:
            var url = '../upload/';
            $('#fileupload').fileupload({
                url: url,
                dataType: 'json',
                dropZone: $('.dropzone'),
                limitMultiFileUploads:5,
                acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
                sequentialUploads: true,
                //imageForceResize: true,
                //imageMaxWidth: 150,
                //imageMaxHeight: 150,
                //imageCrop: true,
                done: function (e, data) {
                    $.each(data.result.files, function (index, file) {
                        
                        $('<div style="position:relative;">\n'+
                            '<img src="'+file.url+'" alt="Uploaded Thumbnail" style="margin-right:5px;max-height:200px;width:200px;" class="col col-md-2 img-thumbnail mr-auto ml-auto">\n'+
                            '<a href="?del='+file.name+'"><span class="fa fa-times-circle" style="color:red;position:absolute;margin-left:-20px;cursor:pointer;"> </span></a>\n'+
                        '</div>')
                        .appendTo('.thumbnail');
                    });
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('.progress-bar').css(
                        'width',
                        progress + '%'
                    );
                },
                fileuploadfail: function (e, data) {
                    console.log("===start of error===");
                    console.log(data.errorThrown);
                    console.log(data.textStatus);
                    console.log(data.jqXHR);
                    console.log("===end of error===");
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');
        });
    </script>
    
  </body>
</html>