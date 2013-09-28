<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


    <?php echo $this->Html->charset(); ?>

    <?php

        echo $this->Html->css(array('bootstrap-responsive.min.css'));
        echo $this->Html->css(array('bootstrap.min'));
        echo $this->Html->css(array('base'));

        echo $this->Html->script(array('jquery-1.7.1.min'));
        echo $this->Html->script(array('bootstrap.min'));

        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>


</head>
<body style = "padding-top:70px">
  <div class="navbar navbar-fixed-top" style="padding-bottom:40px;">
    <div class="navbar-inner">
      <div class="container">
        <a href="/<?php echo $base_dir;?>/" class="brand">For Student</a>
        <ul class="nav pull-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              Menu
              <span class="caret"> </span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="/<?php echo $base_dir;?>/">Top</a></li>
              <li><a href="/<?php echo $base_dir;?>/student/show">Show Your Account</a></li>
              <li><a href="/<?php echo $base_dir;?>/student/edit">Edit Account</a></li>
            </ul>
          </li>
          <li>
            <a href="/<?php echo $base_dir;?>/logout">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <?php echo $this->fetch('content'); ?>
</body>



</html>