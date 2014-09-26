<div class="wrapper wrapper-flash">
  <div class="breadcrumb">
    <ul class="breadcrumb">
      <li class="first-child" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="<?php echo base_url(); ?>" itemprop="url"><span itemprop="title">Mbi24</span></a></li>
      <li class="last-child" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"> » <span itemprop="title">Create a new account</span></li>
    </ul>
    <div class="clear"></div>
  </div>
</div>
<div class="wrapper" id="content">
  <div id="main">
    <div class="form-container form-horizontal form-container-box">
      <div class="header">
        <h1>Register an account for free</h1>
      </div>
      <div class="resp-wrapper">
        <form name="register" action="<?php echo base_url(); ?>site/register" method="post">
          <ul id="error_list">
          </ul>
          <div class="control-group">
            <label class="control-label" for="name">Name</label>
            <div class="controls">
              <input id="s_name" type="text" name="s_name" value="">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="email">E-mail</label>
            <div class="controls">
              <input id="s_email" type="text" name="s_email" value="">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="password">Password</label>
            <div class="controls">
              <input id="s_password" type="password" name="s_password" value="">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="password-2">Repeat password</label>
            <div class="controls">
              <input id="s_password2" type="password" name="s_password2" value="">
              <p id="password-error" style="display:none;"> Passwords don't match </p>
            </div>
          </div>
          <div class="control-group">
            <div class="controls"> </div>
          </div>
          <div class="control-group">
            <div class="controls">
              <button type="submit" class="ui-button ui-button-middle ui-button-main">Create</button>
              <label style="color:#FB0004;"><?php echo @$message; ?></label>
            </div>
          </div>
        </form>
      </div>
    </div>
     
  </div>
  <!-- content --> 
</div>
