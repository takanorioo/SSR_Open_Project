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

  <?php echo $this->fetch('content'); ?>

</html>