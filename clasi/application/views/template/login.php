<div class="wrapper wrapper-flash">
  <div class="breadcrumb">
    <ul class="breadcrumb">
      <li class="first-child" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="<?php echo base_url(); ?>" itemprop="url"><span itemprop="title">Mbi24</span></a></li>
      <li class="last-child" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"> » <span itemprop="title">Login</span></li>
    </ul>
    <div class="clear"></div>
  </div>
  <div id="flash_js"></div>
</div>
<div class="wrapper" id="content" style="margin:0 auto;">
  <div id="main">
    <div class="form-container form-horizontal form-container-box">
      <div class="header">
        <h1>Access to your account</h1>
      </div>
      <div class="resp-wrapper">
        <form action="" method="post">
          
          <div class="control-group">
            <label class="control-label" for="email">E-mail</label>
            <div class="controls">
              <input id="email" type="text" name="email" value=""> <label style="color:#FF0004;"><?php echo form_error('email'); ?></label>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="password">Password</label>
            <div class="controls">
              <input id="password" type="password" name="password" value=""><label style="color:#FF0004;"><?php echo form_error('password'); ?></label>
            </div>
          </div>
          <div class="control-group">
            <div class="controls checkbox">
              <input id="remember" type="checkbox" name="remember" value="1">
              <label for="remember">Remember me</label>
            </div>
            <div class="controls">
              <button type="submit" class="ui-button ui-button-middle ui-button-main">Log in</button>
              <label style="color:#FF0004;"><?php echo @$message; ?></label>
            </div>
          </div>
          <div class="actions"> <a href="<?php echo base_url(); ?>site/register">Register for a free account</a><br>
            <a href="http://localhost/os/user/recover">Forgot password?</a> </div>
        </form>
      </div>
    </div>
  </div>
  <!-- content --> 
</div>
