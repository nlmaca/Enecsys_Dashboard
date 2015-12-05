<?php
// page version: 2.1
include 'language/' . $language . '.inc.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $TITLE; ?></title>
    <meta name="description" content="<?php echo $DESCRIPTION; ?>">
    <meta name="author" content="J. van Marion">
     <link href="<?php echo $DOCUMENT_ROOT; ?>/assets/css/sticky-footer.css" rel="stylesheet">
    <link href="<?php echo $DOCUMENT_ROOT; ?>/assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo $DOCUMENT_ROOT; ?>/assets/css/style.min.css" rel="stylesheet">
    <link href="<?php echo $DOCUMENT_ROOT; ?>/assets/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="icon" href="<?php echo $DOCUMENT_ROOT; ?>/img/favicon.ico?v=2" type="image/x-icon" />
    <script src="<?php echo $DOCUMENT_ROOT; ?>/assets/jquery-2.1.4.min.js"></script>
    <link rel="stylesheet" href="<?php echo $DOCUMENT_ROOT; ?>/assets/jquery/jquery-ui.1.11.4/jquery-ui.css">
    <script src="<?php echo $DOCUMENT_ROOT; ?>/assets/jquery/1.11.3/jyquery-1.11.3.js"></script>
    <script src="<?php echo $DOCUMENT_ROOT; ?>/assets/jquery/jquery-ui.1.11.4/jquery-ui.js"></script>
 
</head>

<body>
<div id="wrap">
    <nav class="navbar navbar-default bg-black">
        <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only"><?php echo $LANG_HEADER_SHOW_MENU; ?></span>
                    <i class="fa fa-bars fa-2x"></i>
                </button>
                <a class="navbar-brand" href="<?php echo $DOCUMENT_ROOT; ?>/products/solar/overview.php">
                    <img alt="Brand" src="<?php echo $DOCUMENT_ROOT; ?>/img/sun-32.png" alt="Enecsys Dashboard" title="Enecsys Dashboard">
                </a>
            </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- live button -->       
                    <li><a href="<?php echo $DOCUMENT_ROOT; ?>/products/solar/overview.php"><i class="fa fa-bookmark-o fa-fw"></i> LIVE</a></li>
                            
                    <!-- history -->       
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-server fa-fw"></i> <?php echo $LANG_HEADER_HISTORY; ?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $DOCUMENT_ROOT; ?>/products/history/index.php"><i class="fa fa-calendar fa-fw"></i> <?php echo $LANG_HEADER_OVERVIEW; ?></a></li>
                            
                        </ul>
                    </li>
                    <!-- settings -->       
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cogs fa-fw"></i> <?php echo $LANG_HEADER_SETTINGS; ?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $DOCUMENT_ROOT; ?>/settings/inverters_overview.php"><i class="fa fa-bolt fa-fw"></i> <?php echo $LANG_HEADER_INVERTERS; ?></a></li>
                            <li><a href="<?php echo $DOCUMENT_ROOT; ?>/performance/optimize_database.php"><i class="fa fa-database fa-fw"></i> <?php echo $LANG_HEADER_DB; ?></a></li>
                           
                        </ul>
                    </li>
                    <!-- users -->       
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-users fa-fw"></i> <?php echo $LANG_HEADER_USERS; ?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <!--<li role="separator" class="divider"></li>-->
                            <li><a href="<?php echo $DOCUMENT_ROOT; ?>/settings/user_overview.php"><i class="fa fa-user fa-fw"></i> <?php echo $LANG_HEADER_OVERVIEW_USERS; ?></a></li>
                          
                        </ul>
                    </li>
                    <!-- logout -->
                    <li><a href="<?php echo $DOCUMENT_ROOT; ?>/logout.php"><i class="fa fa-power-off fa-fw"></i> <?php echo $LANG_HEADER_LOGOFF; ?></a></li>
                    
                   
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
<!-- end navigation -->
