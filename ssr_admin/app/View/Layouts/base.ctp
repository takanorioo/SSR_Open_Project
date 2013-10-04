<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


    <?php echo $this->Html->charset(); ?>

    <?php

        echo $this->Html->css(array('bootstrap-responsive.min.css'));
        echo $this->Html->css(array('bootstrap.min'));
        echo $this->Html->css(array('base'));
        echo $this->Html->css(array('jquery.ui.all'));

        echo $this->Html->script(array('jquery-1.7.1.min'));
        echo $this->Html->script(array('bootstrap.min'));
        echo $this->Html->script(array('jquery.ui.core.min'));
        echo $this->Html->script(array('jquery.ui.datepicker.min'));
        echo $this->Html->script(array('jquery.ui.datepicker-ja'));

        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>
    <script>
      $(function() {
        $('.date').datepicker();
    });
    </script>

</head>
<body style = "padding-top:70px">
  <div class="navbar navbar-fixed-top" style="padding-bottom:40px;">
    <div class="navbar-inner">
      <div class="container">
        <a href="/<?php echo $base_dir;?>/" class="brand">For Administrator</a>
        <ul class="nav pull-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              在学生管理
              <span class="caret"> </span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="/<?php echo $base_dir;?>/student">在学生管理 Top</a></li>
              <li><a href="/<?php echo $base_dir;?>/student/search">在学生を検索</a></li>
              <li><a href="/<?php echo $base_dir;?>/student/add">在学生を新規登録</a></li>
            </ul>
          </li>
          <li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              修了生管理
              <span class="caret"> </span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="/<?php echo $base_dir;?>/completion">修了生管理 Top</a></li>
              <li><a href="/<?php echo $base_dir;?>/completion/search">修了生管理を検索</a></li>
              <li><a href="/<?php echo $base_dir;?>/completion/student">修了生を新規登録</a></li>
              <li><a href="/<?php echo $base_dir;?>/completion/certification">修了証明書発行依頼情報</a></li>
              <li><a href="/<?php echo $base_dir;?>/event">イベント告知情報</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              説明会管理
              <span class="caret"> </span>
            </a>
            <ul class="dropdown-menu">
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