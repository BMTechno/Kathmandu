function seeAllSubcategories(id){
			var className=".seeAll_"+id;
			var nextClass=".hideAll_"+id;
			var hrefClass=".href_"+id;
			var hidehrefClass=".hidehref_"+id;
			//$(className).fadeIn();
			$(hrefClass).css('height','auto');
			$(hrefClass).css({opacity: 0.0, overflow: "visible"}).animate({opacity: 1.0},1500);
			$(nextClass).css('display','block');
			$(className).css('display','none');
			return false;
			}
		function hideAllSubcategories(id){
			var className=".hideAll_"+id;
			var nextClass=".seeAll_"+id;
			var hrefClass=".href_"+id;
			//$(className).fadeIn();
			$(hrefClass).css('height','2.7em');
			$(hrefClass).css({opacity: 0.0, overflow: "hidden"}).animate({opacity: 1.0},1500);
			$(nextClass).css('display','block');
			$(className).css('display','none');
			return false;
			}

$(document).ready(function() {

    var row = 1; //track user click on "load more" button, righ now it is 0 click

    $("#show-more-main").click(function (e) { //user clicks on button
        $(this).hide(); //hide load more button on click
        $('.show-animation').show(); //show loading image
        var site_url =  $('input[name=site_url]').val();
          $.ajax({  	
  				type: "POST",
 				  url: site_url+"oc-content/themes/classified/popular-categories-loadmore.php",
  				data: "row="+row,
  				success: function(msg){
        			$("#show-more-main").show(); //bring back load more button
               
                	$("#popular-categories").append(msg); //append data received from server
                	//scroll page smoothly to button id
                	//$("html, body").animate({scrollTop: $("#show-more").offset().top}, 500);
               		$("html, body").animate({ scrollTop: $('#show-more-main').offset().top -300}, 1000);
                	//hide loading image
                	$('.show-animation').hide(); //hide loading image once data is received
                  $(this).show();
                	row++; //user click increment on load button
  				},
  				error: function(XMLHttpRequest, textStatus, errorThrown) {
     				     alert(errorThrown+textStatus); //alert with HTTP error
                	$("#show-more").show(); //bring back load more button
                	$('.show-animation').hide(); //hide loading image once data is rece
  				}
			});
    });
$("#footer-subscribe").click(function (e) {
   $("html, body").addClass("loading");
   //Check if already subscribed
   var FormData = {
            'submit_type'               :'subscribe_user',
            'subs_email'              : $('input[name=subscription_email]').val(),
          };
    $.ajax({
              
          type: "POST",
           url: "oc-content/themes/classified/ajax-subscribe.php",
          data: FormData,
          success: function(msg){
              $('.forcemessages-inline').html(msg);
              $('.forcemessages-inline').addClass('flashmessage-ok');
              $('.forcemessages-inline').addClass('flashmessage');
              $('input[name=subscription_email]').val('');  
             $("html,body").removeClass("loading");
             $("html, body").animate({ scrollTop: 0 }, "slow");
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown+textStatus); //alert with HTTP error
            $("html,body").removeClass("loading");
          }
        });
});
/*FOR MODAL BOXES LOGIN REGISTER RECOVER*/
  $("#register_button").click(function (e) {
    $('#login').modal('hide');
  });

  $("#recover_button").click(function (e) {
    $('#login').modal('hide');
  });
  $("#register_login_button").click(function (e) {
    $('#register').modal('hide');
  });

});
