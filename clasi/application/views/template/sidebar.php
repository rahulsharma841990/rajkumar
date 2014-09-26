<div id="sidebar"> 
    <ul class="user_menu">
      <li class="opt_publicprofile"><a href="<?php echo base_url(); ?>profile/user/<?php echo $this->session->userdata('userid'); ?>">Public Profile</a></li>
      <li class="opt_items"><a href="http://localhost/os/user/items">Listings</a></li>
      <li class="opt_alerts"><a href="http://localhost/os/user/alerts">Alerts</a></li>
      <li class="opt_account"><a href="http://localhost/os/user/profile">Account</a></li>
      <li class="opt_change_email"><a href="http://localhost/os/email/change">Change email</a></li>
      <li class="opt_change_username"><a href="http://localhost/os/username/change">Change username</a></li>
      <li class="opt_change_password"><a href="http://localhost/os/password/change">Change password</a></li>
      <li class="opt_delete_account"><a href="#">Delete account</a></li>
    </ul>
  </div>