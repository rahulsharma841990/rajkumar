<?php $this->load->view('template/head'); ?>
<body class="has-searchbox home">
<?php $this->load->view('template/header'); ?>
<div class="wrapper wrapper-flash"> </div>
<div class="wrapper" id="content">
  <?php $this->load->view('template/'.$page); ?>
</div>
<div id="responsive-trigger"></div>
<!-- footer -->
<div class="clear"></div>

<?php $this->load->view('template/footer'); ?>


</body>
</html>
