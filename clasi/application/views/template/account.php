<div class="wrapper wrapper-flash">
  <div class="breadcrumb">
    <ul class="breadcrumb">
      <li class="first-child" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="http://localhost/os/" itemprop="url"><span itemprop="title">Mbi24</span></a></li>
      <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"> » <a href="http://localhost/os/user/dashboard" itemprop="url"><span itemprop="title">Account</span></a></li>
      <li class="last-child" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"> » <span itemprop="title">Update account</span></li>
    </ul>
    <div class="clear"></div>
  </div>
</div>
<div class="wrapper" id="content">
  
  <?php $this->load->view('template/sidebar'); ?>
  <div id="main">
    <h1>Update account</h1>
    
    <div class="form-container form-horizontal">
      <div class="resp-wrapper">
        <ul id="error_list">
        </ul>
        <form action="<?php echo base_url(); ?>site/update_profile" method="post">
        <div class="control-group">
            <label class="control-label" for="name">User ID</label>
            <div class="controls">
              <input id="s_name" type="text" name="user_id" value="<?php echo $profile[0]->user_id; ?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="name">Name</label>
            <div class="controls">
              <input id="s_name" type="text" name="full_name" value="<?php echo $profile[0]->full_name; ?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="user_type">User type</label>
            <div class="controls">
              <div class="select-box undefined">
                <select name="user_type" >
                <?php
					if($profile[0]->user_type==0)
					{ 
				?>
                  <option value="0" selected="selected">User</option>
                  <option value="1">Company</option>
                <?php 
					}
					else
					{
				?>
                	<option value="0">User</option>
                    <option value="1" selected="selected">Company</option>
                <?php
					}
				?>
                </select>
               </div>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="phoneMobile">Cell phone</label>
            <div class="controls">
              <input id="s_phone_mobile" type="text" name="cell_phone" value="<?php echo $profile[0]->cell_phone; ?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="phoneLand">Phone</label>
            <div class="controls">
              <input id="s_phone_land" type="text" name="phone" value="<?php echo $profile[0]->phone; ?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="country">Country</label>
            <div class="controls">
              <!--<div class="select-box undefined">
                <select name="countryId" >
                  <option value="">Select a country...</option>
                  <option value="IN">India</option>
                  <option value="US">USA</option>
                </select>
                </div>-->
                <input id="s_phone_land" type="text" name="country" value="<?php echo $profile[0]->country; ?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="region">Region</label>
            <div class="controls">
              <div class="select-box undefined">
                <input id="Region" type="text" name="region" value="<?php echo $profile[0]->region; ?>">
                </div>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="city">City</label>
            <div class="controls">
              <!--<div class="select-box undefined">
                <select name="cityId">
                  <option value="">Select a city...</option>
                  <option value="278683">Amritsar</option>
                </select> 
                </div>-->
                <input id="Region" type="text" name="city" value="<?php echo $profile[0]->city; ?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="city_area">City area</label>
            <div class="controls">
              <input id="cityArea" type="text" name="city_area" value="<?php echo $profile[0]->city_area; ?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" l="" for="address">Address</label>
            <div class="controls">
              <input id="address" type="text" name="address" value="<?php echo $profile[0]->address; ?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="webSite">Website</label>
            <div class="controls">
              <input id="s_website" type="text" name="website" value="<?php echo $profile[0]->website; ?>">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="s_info">Description</label>
            <div class="controls">
              <textarea id="s_infoen_US" name="description" rows="10"><?php echo $profile[0]->description; ?></textarea>
            </div>
          </div>
          <div class="control-group">
            <div class="controls">
              <button type="submit" class="ui-button ui-button-middle ui-button-main">Update</button>
            </div>
          </div>
          <div class="control-group">
            <div class="controls"> </div>
          </div>
        </form>
        <form method="post" action="<?php echo base_url(); ?>site/profile_pic" enctype="multipart/form-data">
        <div class="control-group">
            <label class="control-label" for="webSite">Image</label>
            <div class="controls">
            	<div><img src="<?php echo base_url()."front/profile_pics/".$profile[0]->user_image; ?>" width="200" height="150"/></div>
              <div style="margin-top:2%;"><input type="file" name="image" /></div>
            </div>
          </div>
          
          <div class="control-group">
            <div class="controls">
              <button type="submit" class="ui-button ui-button-middle ui-button-main">Update</button>
              <label style="color:#FF0004;"><?php echo @$error; ?></label>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- content --> 
</div>
