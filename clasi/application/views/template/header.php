<div id="header">
  <div class="wrapper">
    <div id="logo"> <a href="http://localhost/os/">Mbi24</a> <span id="description"></span> </div>
    <?php if($this->session->userdata('email')==""){ ?>
    <ul class="nav">
      <li><a id="login_open" href="<?php echo base_url(); ?>site/login">Login</a></li>
      <li><a href="<?php echo base_url(); ?>site/register">Register for a free account</a></li>
      <li class="publish"><a href="#">Publish your ad for free</a></li>
    </ul>
    <?php }else{ ?>
    
    <ul class="nav">
      <li class="first logged"> <span>Hi <?php echo $this->session->userdata('name'); ?>!  ·</span> <strong><a href="<?php echo base_url(); ?>site/account">My account</a></strong> · <a href="<?php echo base_url(); ?>site/logout">Logout</a> </li>
      <li class="publish"><a href="#">Publish your ad for free</a></li>
    </ul>
    <?php } ?>
    
  </div>
  <form action="http://localhost/os/index.php" method="get" class="search nocsrf" >
    <input type="hidden" name="page" value="search"/>
    <div class="main-search">
      <div class="cell">
        <input type="text" name="sPattern" id="query" class="input-text" value="" placeholder="ie. PHP Programmer" />
      </div>
      <div class="cell selector">
        <select name="sCategory" id="sCategory">
          <option value="">Select a category</option>
          <option value="1">For sale</option>
          <option value="9">&nbsp;&nbsp;Animals</option>
          <option value="10">&nbsp;&nbsp;Art - Collectibles</option>
          <option value="11">&nbsp;&nbsp;Barter</option>
          <option value="12">&nbsp;&nbsp;Books - Magazines</option>
          <option value="13">&nbsp;&nbsp;Cameras - Camera Accessories</option>
          <option value="14">&nbsp;&nbsp;CDs - Records</option>
          <option value="15">&nbsp;&nbsp;Cell Phones - Accessories</option>
          <option value="16">&nbsp;&nbsp;Clothing</option>
          <option value="17">&nbsp;&nbsp;Computers - Hardware</option>
          <option value="18">&nbsp;&nbsp;DVD</option>
          <option value="19">&nbsp;&nbsp;Electronics</option>
          <option value="20">&nbsp;&nbsp;For Babies - Infants</option>
          <option value="21">&nbsp;&nbsp;Garage Sale</option>
          <option value="22">&nbsp;&nbsp;Health - Beauty</option>
          <option value="23">&nbsp;&nbsp;Home - Furniture - Garden Supplies</option>
          <option value="24">&nbsp;&nbsp;Jewelry - Watches</option>
          <option value="25">&nbsp;&nbsp;Musical Instruments</option>
          <option value="26">&nbsp;&nbsp;Sporting Goods - Bicycles</option>
          <option value="27">&nbsp;&nbsp;Tickets</option>
          <option value="28">&nbsp;&nbsp;Toys - Games - Hobbies</option>
          <option value="29">&nbsp;&nbsp;Video Games - Consoles</option>
          <option value="30">&nbsp;&nbsp;Everything Else</option>
          <option value="2">Vehicles</option>
          <option value="31">&nbsp;&nbsp;Cars</option>
          <option value="32">&nbsp;&nbsp;Car Parts</option>
          <option value="33">&nbsp;&nbsp;Motorcycles</option>
          <option value="34">&nbsp;&nbsp;Boats - Ships</option>
          <option value="35">&nbsp;&nbsp;RVs - Campers - Caravans</option>
          <option value="36">&nbsp;&nbsp;Trucks - Commercial Vehicles</option>
          <option value="37">&nbsp;&nbsp;Other Vehicles</option>
          <option value="3">Classes</option>
          <option value="38">&nbsp;&nbsp;Computer - Multimedia Classes</option>
          <option value="39">&nbsp;&nbsp;Language Classes</option>
          <option value="40">&nbsp;&nbsp;Music - Theatre - Dance Classes</option>
          <option value="41">&nbsp;&nbsp;Tutoring - Private Lessons</option>
          <option value="42">&nbsp;&nbsp;Other Classes</option>
          <option value="4">Real estate</option>
          <option value="43">&nbsp;&nbsp;Houses - Apartments for Sale</option>
          <option value="44">&nbsp;&nbsp;Houses - Apartments for Rent</option>
          <option value="45">&nbsp;&nbsp;Rooms for Rent - Shared</option>
          <option value="46">&nbsp;&nbsp;Housing Swap</option>
          <option value="47">&nbsp;&nbsp;Vacation Rentals</option>
          <option value="48">&nbsp;&nbsp;Parking Spots</option>
          <option value="49">&nbsp;&nbsp;Land</option>
          <option value="50">&nbsp;&nbsp;Office - Commercial Space</option>
          <option value="51">&nbsp;&nbsp;Shops for Rent - Sale</option>
          <option value="5">Services</option>
          <option value="52">&nbsp;&nbsp;Babysitter - Nanny</option>
          <option value="53">&nbsp;&nbsp;Casting - Auditions</option>
          <option value="54">&nbsp;&nbsp;Computer</option>
          <option value="55">&nbsp;&nbsp;Event Services</option>
          <option value="56">&nbsp;&nbsp;Health - Beauty - Fitness</option>
          <option value="57">&nbsp;&nbsp;Horoscopes - Tarot</option>
          <option value="58">&nbsp;&nbsp;Household - Domestic Help</option>
          <option value="59">&nbsp;&nbsp;Moving - Storage</option>
          <option value="60">&nbsp;&nbsp;Repair</option>
          <option value="61">&nbsp;&nbsp;Writing - Editing - Translating</option>
          <option value="62">&nbsp;&nbsp;Other Services</option>
          <option value="6">Community</option>
          <option value="63">&nbsp;&nbsp;Carpool</option>
          <option value="64">&nbsp;&nbsp;Community Activities</option>
          <option value="65">&nbsp;&nbsp;Events</option>
          <option value="66">&nbsp;&nbsp;Musicians - Artists - Bands</option>
          <option value="67">&nbsp;&nbsp;Volunteers</option>
          <option value="68">&nbsp;&nbsp;Lost And Found</option>
          <option value="7">Personals</option>
          <option value="69">&nbsp;&nbsp;Women looking for Men</option>
          <option value="70">&nbsp;&nbsp;Men looking for Women</option>
          <option value="71">&nbsp;&nbsp;Men looking for Men</option>
          <option value="72">&nbsp;&nbsp;Women looking for Women</option>
          <option value="73">&nbsp;&nbsp;Friendship - Activity Partners</option>
          <option value="74">&nbsp;&nbsp;Missed Connections</option>
          <option value="8">Jobs</option>
          <option value="75">&nbsp;&nbsp;Accounting - Finance</option>
          <option value="76">&nbsp;&nbsp;Advertising - Public Relations</option>
          <option value="77">&nbsp;&nbsp;Arts - Entertainment - Publishing</option>
          <option value="78">&nbsp;&nbsp;Clerical - Administrative</option>
          <option value="79">&nbsp;&nbsp;Customer Service</option>
          <option value="80">&nbsp;&nbsp;Education - Training</option>
          <option value="81">&nbsp;&nbsp;Engineering - Architecture</option>
          <option value="82">&nbsp;&nbsp;Healthcare</option>
          <option value="83">&nbsp;&nbsp;Human Resource</option>
          <option value="84">&nbsp;&nbsp;Internet</option>
          <option value="85">&nbsp;&nbsp;Legal</option>
          <option value="86">&nbsp;&nbsp;Manual Labor</option>
          <option value="87">&nbsp;&nbsp;Manufacturing - Operations</option>
          <option value="88">&nbsp;&nbsp;Marketing</option>
          <option value="89">&nbsp;&nbsp;Non-profit - Volunteer</option>
          <option value="90">&nbsp;&nbsp;Real Estate</option>
          <option value="91">&nbsp;&nbsp;Restaurant - Food Service</option>
          <option value="92">&nbsp;&nbsp;Retail</option>
          <option value="93">&nbsp;&nbsp;Sales</option>
          <option value="94">&nbsp;&nbsp;Technology</option>
          <option value="95">&nbsp;&nbsp;Other Jobs</option>
        </select>
      </div>
      <div class="cell reset-padding">
        <button class="ui-button ui-button-big js-submit">Search</button>
      </div>
    </div>
    <div id="message-seach"></div>
  </form>
</div>
