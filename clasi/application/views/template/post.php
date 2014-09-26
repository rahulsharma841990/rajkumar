<div class="wrapper wrapper-flash">
  <div class="breadcrumb">
    <ul class="breadcrumb">
      <li class="first-child" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="http://localhost/os/" itemprop="url"><span itemprop="title">Mbi24</span></a></li>
      <li class="last-child" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"> » <span itemprop="title">Publish a listing</span></li>
    </ul>
    <div class="clear"></div>
  </div>
</div>
<div class="wrapper" id="content">
  <div id="main"> 
    <script type="text/javascript">
    $(document).ready(function(){

        $('#countryName').attr( "autocomplete", "off" );
        $('#region').attr( "autocomplete", "off" );
        $('#city').attr( "autocomplete", "off" );

        $('#countryId').change(function(){
            $('#regionId').val('');
            $('#region').val('');
            $('#cityId').val('');
            $('#city').val('');
        });

        $('#countryName').on('keyup.autocomplete', function(){
            $('#countryId').val('');
            $( this ).autocomplete({
                source: "http://localhost/os/index.php?page=ajax&action=location_countries",
                minLength: 0,
                select: function( event, ui ) {
                    $('#countryId').val(ui.item.id);
                    $('#regionId').val('');
                    $('#region').val('');
                    $('#cityId').val('');
                    $('#city').val('');
                }
            });
        });

        $('#region').on('keyup.autocomplete', function(){
            $('#regionId').val('');
            $( this ).autocomplete({
                source: "http://localhost/os/index.php?page=ajax&action=location_regions&country="+$('#countryId').val(),
                minLength: 2,
                select: function( event, ui ) {
                    $('#cityId').val('');
                    $('#city').val('');
                    $('#regionId').val(ui.item.id);
                }
            });
        });

        $('#city').on('keyup.autocomplete', function(){
            $('#cityId').val('');
            $( this ).autocomplete({
                source: "http://localhost/os/index.php?page=ajax&action=location_cities&region="+$('#regionId').val(),
                minLength: 2,
                select: function( event, ui ) {
                    $('#cityId').val(ui.item.id);
                }
            });
        });

        $('.ui-autocomplete').css('zIndex', 10000);

        /**
         * Validate form
         */

        // Validate description without HTML.
        $.validator.addMethod(
            "minstriptags",
            function(value, element) {
                altered_input = strip_tags(value);
                if (altered_input.length < 3) {
                    return false;
                } else {
                    return true;
                }
            },
            'Description needs to be longer.'
        );

        // Code for form validation
        $("form[name=item]").validate({
            rules: {
                catId: {
                    required: true,
                    digits: true
                },
                                price: {
                    maxlength: 50
                },
                currency: "required",
                                                "photos[]": {
                    accept: "png,gif,jpg,jpeg"
                },
                                                contactName: {
                    minlength: 3,
                    maxlength: 35
                },
                contactEmail: {
                    required: true,
                    email: true
                },
                                address: {
                    minlength: 3,
                    maxlength: 100
                }
            },
            messages: {
                catId: "Choose one category.",
                                price: {
                    maxlength: "Price: no more than 50 characters."
                },
                currency: "Currency: make your selection.",
                                                "photos[]": {
                    accept: "Photo: must be png,gif,jpg,jpeg."
                },
                                                contactName: {
                    minlength: "Name: enter at least 3 characters.",
                    maxlength: "Name: no more than 35 characters."
                },
                contactEmail: {
                    required: "Email: this field is required.",
                    email: "Invalid email address."
                },
                                address: {
                    minlength: "Address: enter at least 3 characters.",
                    maxlength: "Address: no more than 100 characters."
                }
            },
            errorLabelContainer: "#error_list",
            wrapper: "li",
            invalidHandler: function(form, validator) {
                $('html,body').animate({ scrollTop: $('h1').offset().top }, { duration: 250, easing: 'swing'});
            },
            submitHandler: function(form){
                $('button[type=submit], input[type=submit]').attr('disabled', 'disabled');
                form.submit();
            }
        });
    });

    /**
     * Strip HTML tags to count number of visible characters.
     */
    function strip_tags(html) {
        if (arguments.length < 3) {
            html=html.replace(/<\/?(?!\!)[^>]*>/gi, '');
        } else {
            var allowed = arguments[1];
            var specified = eval("["+arguments[2]+"]");
            if (allowed){
                var regex='</?(?!(' + specified.join('|') + '))\b[^>]*>';
                html=html.replace(new RegExp(regex, 'gi'), '');
            } else{
                var regex='</?(' + specified.join('|') + ')\b[^>]*>';
                html=html.replace(new RegExp(regex, 'gi'), '');
            }
        }
        return html;
    }

    function delete_image(id, item_id,name, secret) {
        //alert(id + " - "+ item_id + " - "+name+" - "+secret);
        var result = confirm('This action can\'t be undone. Are you sure you want to continue?');
        if(result) {
            $.ajax({
                type: "POST",
                url: 'http://localhost/os/index.php?page=ajax&action=delete_image&id='+id+'&item='+item_id+'&code='+name+'&secret='+secret,
                dataType: 'json',
                success: function(data){
                    var class_type = "error";
                    if(data.success) {
                        $("div[name="+name+"]").remove();
                        class_type = "ok";
                    }
                    var flash = $("#flash_js");
                    var message = $('<div>').addClass('pubMessages').addClass(class_type).attr('id', 'flashmessage').html(data.msg);
                    flash.html(message);
                    $("#flashmessage").slideDown('slow').delay(3000).slideUp('slow');
                }
            });
        }
    }


</script>
    <div class="form-container form-horizontal">
      <div class="resp-wrapper">
        <div class="header">
          <h1>Publish a listing</h1>
        </div>
        <ul id="error_list">
        </ul>
        <form name="item" action="http://localhost/os/index.php" method="post" enctype="multipart/form-data" id="item-post">
          <input type="hidden" name="CSRFName" value="CSRF959733228_428618732">
          <input type="hidden" name="CSRFToken" value="28e8dc7ac9758b582fe1bd3d36aabf84272fc1a34ef3a0a7f04a064afb5dc22cbd0a59feefb316aec7e8ebd2b04cbc66f00e2e71878c0ba7317c02973f423b41">
          <fieldset>
            <input type="hidden" name="action" value="item_add_post">
            <input type="hidden" name="page" value="item">
            <h2>General Information</h2>
            <div class="control-group">
              <label class="control-label" for="select_1">Category</label>
              <div class="controls">
                <div class="select-box undefined">
                  <select name="catId" id="catId" style="opacity: 0;">
                    <option value="">Select a category</option>
                    <optgroup label="For sale">
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
                    </optgroup>
                    <optgroup label="Vehicles">
                    <option value="31">&nbsp;&nbsp;Cars</option>
                    <option value="32">&nbsp;&nbsp;Car Parts</option>
                    <option value="33">&nbsp;&nbsp;Motorcycles</option>
                    <option value="34">&nbsp;&nbsp;Boats - Ships</option>
                    <option value="35">&nbsp;&nbsp;RVs - Campers - Caravans</option>
                    <option value="36">&nbsp;&nbsp;Trucks - Commercial Vehicles</option>
                    <option value="37">&nbsp;&nbsp;Other Vehicles</option>
                    </optgroup>
                    <optgroup label="Classes">
                    <option value="38">&nbsp;&nbsp;Computer - Multimedia Classes</option>
                    <option value="39">&nbsp;&nbsp;Language Classes</option>
                    <option value="40">&nbsp;&nbsp;Music - Theatre - Dance Classes</option>
                    <option value="41">&nbsp;&nbsp;Tutoring - Private Lessons</option>
                    <option value="42">&nbsp;&nbsp;Other Classes</option>
                    </optgroup>
                    <optgroup label="Real estate">
                    <option value="43">&nbsp;&nbsp;Houses - Apartments for Sale</option>
                    <option value="44">&nbsp;&nbsp;Houses - Apartments for Rent</option>
                    <option value="45">&nbsp;&nbsp;Rooms for Rent - Shared</option>
                    <option value="46">&nbsp;&nbsp;Housing Swap</option>
                    <option value="47">&nbsp;&nbsp;Vacation Rentals</option>
                    <option value="48">&nbsp;&nbsp;Parking Spots</option>
                    <option value="49">&nbsp;&nbsp;Land</option>
                    <option value="50">&nbsp;&nbsp;Office - Commercial Space</option>
                    <option value="51">&nbsp;&nbsp;Shops for Rent - Sale</option>
                    </optgroup>
                    <optgroup label="Services">
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
                    </optgroup>
                    <optgroup label="Community">
                    <option value="63">&nbsp;&nbsp;Carpool</option>
                    <option value="64">&nbsp;&nbsp;Community Activities</option>
                    <option value="65">&nbsp;&nbsp;Events</option>
                    <option value="66">&nbsp;&nbsp;Musicians - Artists - Bands</option>
                    <option value="67">&nbsp;&nbsp;Volunteers</option>
                    <option value="68">&nbsp;&nbsp;Lost And Found</option>
                    </optgroup>
                    <optgroup label="Personals">
                    <option value="69">&nbsp;&nbsp;Women looking for Men</option>
                    <option value="70">&nbsp;&nbsp;Men looking for Women</option>
                    <option value="71">&nbsp;&nbsp;Men looking for Men</option>
                    <option value="72">&nbsp;&nbsp;Women looking for Women</option>
                    <option value="73">&nbsp;&nbsp;Friendship - Activity Partners</option>
                    <option value="74">&nbsp;&nbsp;Missed Connections</option>
                    </optgroup>
                    <optgroup label="Jobs">
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
                    </optgroup>
                  </select>
                  <a href="#" class="select-box-trigger"><span class="select-box-label">Select a category</span><span class="select-box-icon">0</span></a></div>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="title[en_US]">Title</label>
              <div class="controls">
                <input id="titleen_US" type="text" name="title[en_US]" value="">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="description[en_US]">Description</label>
              <div class="controls">
                <textarea id="descriptionen_US" name="description[en_US]" rows="10"></textarea>
              </div>
            </div>
            <div class="control-group control-group-price">
              <label class="control-label" for="price">Price</label>
              <div class="controls">
                <input id="price" type="text" name="price" value="">
                <div class="select-box undefined">
                  <select name="currency" id="currency" style="opacity: 0;">
                    <option value="EUR">Euro €</option>
                    <option value="GBP">Pound £</option>
                    <option value="ISO">Rupee</option>
                    <option value="USD" selected="selected">Dollar US$</option>
                  </select>
                  <a href="#" class="select-box-trigger"><span class="select-box-label">Dollar US$</span><span class="select-box-icon">0</span></a></div>
              </div>
            </div>
            <div id="restricted-fine-uploader">
              <div class="qq-uploader">
                <div class="qq-upload-drop-area" style="display: none;"><span>Drop files here to upload</span></div>
                <div class="qq-upload-button" style="position: relative; overflow: hidden; direction: ltr;">
                  <div>Click or Drop for upload images</div>
                  <input multiple="multiple" type="file" name="qqfile" style="position: absolute; right: 0px; top: 0px; font-family: Arial; font-size: 118px; margin: 0px; padding: 0px; cursor: pointer; opacity: 0;">
                </div>
                <span class="qq-drop-processing"><span>Processing dropped files...</span><span class="qq-drop-processing-spinner"></span></span>
                <ul class="qq-upload-list">
                </ul>
              </div>
            </div>
            <div style="clear:both;"></div>
            <div style="clear:both;"></div>
            <script>
                $(document).ready(function() {

                    $('.qq-upload-delete').on('click', function(evt) {
                        evt.preventDefault();
                        var parent = $(this).parent()
                        var result = confirm('This action can\'t be undone. Are you sure you want to continue?');
                        var urlrequest = '';
                        if($(this).attr('ajaxfile')!=undefined) {
                            urlrequest = 'ajax_photo='+$(this).attr('ajaxfile');
                        } else {
                            urlrequest = 'id='+$(this).attr('photoid')+'&item='+$(this).attr('itemid')+'&code='+$(this).attr('photoname')+'&secret='+$(this).attr('photosecret');
                        }
                        if(result) {
                            $.ajax({
                                type: "POST",
                                url: 'http://localhost/os/index.php?page=ajax&action=delete_image&'+urlrequest,
                                dataType: 'json',
                                success: function(data){
                                    parent.remove();
                                }
                            });
                        }
                    });

                    $('#restricted-fine-uploader').on('click','.primary_image', function(event){
                        if(parseInt($("div.primary_image").index(this))>0){

                            var a_src   = $(this).parent().find('.ajax_preview_img img').attr('src');
                            var a_title = $(this).parent().find('.ajax_preview_img img').attr('alt');
                            var a_input = $(this).parent().find('input').attr('value');
                            // info
                            var a1 = $(this).parent().find('span.qq-upload-file').text();
                            var a2 = $(this).parent().find('span.qq-upload-size').text();

                            var li_first =  $('ul.qq-upload-list li').get(0);

                            var b_src   = $(li_first).find('.ajax_preview_img img').attr('src');
                            var b_title = $(li_first).find('.ajax_preview_img img').attr('alt');
                            var b_input = $(li_first).find('input').attr('value');
                            var b1      = $(li_first).find('span.qq-upload-file').text();
                            var b2      = $(li_first).find('span.qq-upload-size').text();

                            $(li_first).find('.ajax_preview_img img').attr('src', a_src);
                            $(li_first).find('.ajax_preview_img img').attr('alt', a_title);
                            $(li_first).find('input').attr('value', a_input);
                            $(li_first).find('span.qq-upload-file').text(a1);
                            $(li_first).find('span.qq-upload-size').text(a2);

                            $(this).parent().find('.ajax_preview_img img').attr('src', b_src);
                            $(this).parent().find('.ajax_preview_img img').attr('alt', b_title);
                            $(this).parent().find('input').attr('value', b_input);
                            $(this).parent().find('span.qq-upload-file').text(b1);
                            $(this).parent().find('span.qq-upload-file').text(b2);
                        }
                    });

                    $('#restricted-fine-uploader').on('click','.primary_image', function(event){
                        $(this).addClass('over primary');
                    });

                    $('#restricted-fine-uploader').on('mouseenter mouseleave','.primary_image', function(event){
                        if(event.type=='mouseenter') {
                            if(!$(this).hasClass('primary')) {
                                $(this).addClass('primary');
                            }
                        } else {
                            if(parseInt($("div.primary_image").index(this))>0){
                                $(this).removeClass('primary');
                            }
                        }
                    });


                    $('#restricted-fine-uploader').on('mouseenter mouseleave','li.qq-upload-success', function(event){
                        if(parseInt($("li.qq-upload-success").index(this))>0){

                            if(event.type=='mouseenter') {
                                $(this).find('div.primary_image').addClass('over');
                            } else {
                                $(this).find('div.primary_image').removeClass('over');
                            }
                        }
                    });

                    window.removed_images = 0;
                    $('#restricted-fine-uploader').on('click', 'a.qq-upload-delete', function(event) {
                        window.removed_images = window.removed_images+1;
                        $('#restricted-fine-uploader .flashmessage-error').remove();
                    });

                    $('#restricted-fine-uploader').fineUploader({
                        request: {
                            endpoint: 'http://localhost/os/index.php?page=ajax&action=ajax_upload'
                        },
                        multiple: true,
                        validation: {
                            allowedExtensions: ['png','gif','jpg','jpeg'],
                            sizeLimit: 2097152,
                            itemLimit: 4                        },
                        messages: {
                            tooManyItemsError: 'Too many items ({netItems}) would be uploaded. Item limit is {itemLimit}.',
                            onLeave: 'The files are being uploaded, if you leave now the upload will be cancelled.',
                            typeError: '{file} has an invalid extension. Valid extension(s): {extensions}.',
                            sizeError: '{file} is too large, maximum file size is {sizeLimit}.',
                            emptyError: '{file} is empty, please select files again without it.'
                        },
                        deleteFile: {
                            enabled: true,
                            method: "POST",
                            forceConfirm: false,
                            endpoint: 'http://localhost/os/index.php?page=ajax&action=delete_ajax_upload'
                        },
                        retry: {
                            showAutoRetryNote : true,
                            showButton: true
                        },
                        text: {
                            uploadButton: 'Click or Drop for upload images',
                            waitingForResponse: 'Processing...',
                            retryButton: 'Retry',
                            cancelButton: 'Cancel',
                            failUpload: 'Upload failed',
                            deleteButton: 'Delete',
                            deletingStatusText: 'Deleting...',
                            formatProgress: '{percent}% of {total_size}'
                        }
                    }).on('error', function (event, id, name, errorReason, xhrOrXdr) {
                            $('#restricted-fine-uploader .flashmessage-error').remove();
                            $('#restricted-fine-uploader').append('<div class="flashmessage flashmessage-error">' + errorReason + '<a class="close" onclick="javascript:$(\'.flashmessage-error\').remove();" >X</a></div>');
                    }).on('statusChange', function(event, id, old_status, new_status) {
                        $(".alert.alert-error").remove();
                    }).on('complete', function(event, id, fileName, responseJSON) {
                        if (responseJSON.success) {
                            var new_id = id - removed_images;
                            var li = $('.qq-upload-list li')[new_id];
                                                        if(parseInt(new_id)==0) {
                                $(li).append('<div class="primary_image primary"></div>');
                            } else {
                                $(li).append('<div class="primary_image"><a title="Make primary image"></a></div>');
                            }
                                                        $(li).append('<div class="ajax_preview_img"><img src="http://localhost/os/oc-content/uploads/temp/'+responseJSON.uploadName+'" alt="' + responseJSON.uploadName + '"></div>');
                            $(li).append('<input type="hidden" name="ajax_photos[]" value="'+responseJSON.uploadName+'"></input>');
                        }
                                        });
                                });

            </script>
            <div class="box location">
              <h2>Listing Location</h2>
              <div class="control-group">
                <label class="control-label" for="country">Country</label>
                <div class="controls">
                  <div class="select-box undefined">
                    <select name="countryId" id="countryId" style="opacity: 0;">
                      <option value="">Select a country...</option>
                      <option value="IN">India</option>
                      <option value="US">USA</option>
                    </select>
                    <a href="#" class="select-box-trigger"><span class="select-box-label">Select a country...</span><span class="select-box-icon">0</span></a></div>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="region">Region</label>
                <div class="controls">
                  <input id="region" type="text" name="region" value="" maxlength="" autocomplete="off">
                  <input id="regionId" type="hidden" name="regionId" value="">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="city">City</label>
                <div class="controls">
                  <input id="city" type="text" name="city" value="" maxlength="" autocomplete="off">
                  <input id="cityId" type="hidden" name="cityId" value="">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="cityArea">City Area</label>
                <div class="controls">
                  <input id="cityArea" type="text" name="cityArea" value="">
                  <input id="cityAreaId" type="hidden" name="cityAreaId" value="">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="address">Address</label>
                <div class="controls">
                  <input id="address" type="text" name="address" value="">
                </div>
              </div>
            </div>
            <!-- seller info --> 
            <script type="text/javascript">
	var catPriceEnabled = new Array();
	catPriceEnabled[1] = 1;catPriceEnabled[9] = 1;catPriceEnabled[31] = 1;catPriceEnabled[38] = 1;catPriceEnabled[43] = 1;catPriceEnabled[52] = 1;catPriceEnabled[63] = 1;catPriceEnabled[69] = 1;catPriceEnabled[75] = 1;catPriceEnabled[2] = 1;catPriceEnabled[10] = 1;catPriceEnabled[32] = 1;catPriceEnabled[39] = 1;catPriceEnabled[44] = 1;catPriceEnabled[53] = 1;catPriceEnabled[64] = 1;catPriceEnabled[70] = 1;catPriceEnabled[76] = 1;catPriceEnabled[3] = 1;catPriceEnabled[11] = 1;catPriceEnabled[33] = 1;catPriceEnabled[40] = 1;catPriceEnabled[45] = 1;catPriceEnabled[54] = 1;catPriceEnabled[65] = 1;catPriceEnabled[71] = 1;catPriceEnabled[77] = 1;catPriceEnabled[4] = 1;catPriceEnabled[12] = 1;catPriceEnabled[34] = 1;catPriceEnabled[41] = 1;catPriceEnabled[46] = 1;catPriceEnabled[55] = 1;catPriceEnabled[66] = 1;catPriceEnabled[72] = 1;catPriceEnabled[78] = 1;catPriceEnabled[5] = 1;catPriceEnabled[13] = 1;catPriceEnabled[35] = 1;catPriceEnabled[42] = 1;catPriceEnabled[47] = 1;catPriceEnabled[56] = 1;catPriceEnabled[67] = 1;catPriceEnabled[73] = 1;catPriceEnabled[79] = 1;catPriceEnabled[6] = 1;catPriceEnabled[14] = 1;catPriceEnabled[36] = 1;catPriceEnabled[48] = 1;catPriceEnabled[57] = 1;catPriceEnabled[68] = 1;catPriceEnabled[74] = 1;catPriceEnabled[80] = 1;catPriceEnabled[7] = 1;catPriceEnabled[15] = 1;catPriceEnabled[37] = 1;catPriceEnabled[49] = 1;catPriceEnabled[58] = 1;catPriceEnabled[81] = 1;catPriceEnabled[8] = 1;catPriceEnabled[16] = 1;catPriceEnabled[50] = 1;catPriceEnabled[59] = 1;catPriceEnabled[82] = 1;catPriceEnabled[17] = 1;catPriceEnabled[51] = 1;catPriceEnabled[60] = 1;catPriceEnabled[83] = 1;catPriceEnabled[18] = 1;catPriceEnabled[61] = 1;catPriceEnabled[84] = 1;catPriceEnabled[19] = 1;catPriceEnabled[62] = 1;catPriceEnabled[85] = 1;catPriceEnabled[20] = 1;catPriceEnabled[86] = 1;catPriceEnabled[21] = 1;catPriceEnabled[87] = 1;catPriceEnabled[22] = 1;catPriceEnabled[88] = 1;catPriceEnabled[23] = 1;catPriceEnabled[89] = 1;catPriceEnabled[24] = 1;catPriceEnabled[90] = 1;catPriceEnabled[25] = 1;catPriceEnabled[91] = 1;catPriceEnabled[26] = 1;catPriceEnabled[92] = 1;catPriceEnabled[27] = 1;catPriceEnabled[93] = 1;catPriceEnabled[28] = 1;catPriceEnabled[94] = 1;catPriceEnabled[29] = 1;catPriceEnabled[95] = 1;catPriceEnabled[30] = 1;    $("#catId").change(function(){
        var cat_id = $(this).val();
                var url = 'http://localhost/os/index.php';
                var result = '';

        if(cat_id != '') {
			if(catPriceEnabled[cat_id] == 1) {
				$("#price").closest("div").show();
                                // trigger show-price event
                                $('#price').trigger('show-price');
			} else {
				$("#price").closest("div").hide();
				$('#price').val('') ;
                                // trigger hide-price event
                                $('#price').trigger('hide-price');
			}

            $.ajax({
                type: "POST",
                url: url,
                data: 'page=ajax&action=runhook&hook=item_form&catId=' + cat_id,
                dataType: 'html',
                success: function(data){
                    $("#plugin-hook").html(data);
                }
            });
        }
    });
    $(document).ready(function(){
        var cat_id = $("#catId").val();
                var url = 'http://localhost/os/index.php';
                var result = '';

        if(cat_id != '') {
			if(catPriceEnabled[cat_id] == 1) {
				$("#price").closest("div").show();
			} else {
				$("#price").closest("div").hide();
				$('#price').val('') ;
			}

            $.ajax({
                type: "POST",
                url: url,
                data: 'page=ajax&action=runhook&hook=item_form&catId=' + cat_id,
                dataType: 'html',
                success: function(data){
                    $("#plugin-hook").html(data);
                }
            });
        }
    });
</script>
            <div id="plugin-hook"> </div>
            <div class="control-group">
              <div class="controls">
                <button type="submit" class="ui-button ui-button-middle ui-button-main">Publish</button>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
    <script type="text/javascript">
            $('#price').bind('hide-price', function(){
                $('.control-group-price').hide();
            });

            $('#price').bind('show-price', function(){
                $('.control-group-price').show();
            });

        $().ready(function(){
        $("#price").blur(function(event) {
            var price = $("#price").prop("value");
                                    var tmp = price.split('.');
            if(tmp.length>2) {
                price = tmp[0]+'.'+tmp[1];
            }
                        $("#price").prop("value", price);
        });
    });
    </script> 
  </div>
  <!-- content --> 
</div>
