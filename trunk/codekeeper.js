	$(document).ready(function (){
    		 //  $("#test").click(function () {
      		//		$("p").toggle();
			 //   });
				
		    var flip = 0;
		/*	$("#test").click(function () {
				$("p.descr").toggle( 1000 );
			});

				$("p.name").click(function(){
					$(this).find("p:last").toggle();
				});
		*/		
	
		
			  $('div#movie:eq(0)> div').hide();  
					  $('div#movie:eq(0)> h3').click(function() {
					    $(this).next().slideToggle('slow');
					  });
		
		
					
				/* Swap valuse */
				
				 swapValues = [];
					$(".swap_value").each(function(i){
						swapValues[i] = $(this).val();
							$(this).focus(function(){
								if ($(this).val() == swapValues[i]) {
									$(this).val("");
								}
								}).blur(function(){
									if ($.trim($(this).val()) == "") {
										$(this).val(swapValues[i]);
									}
								 });
								 });
								 
								  /*
		Characters Remaining Countdown
 */

						 var countdown = {
							init: function() {
								countdown.remaining = countdown.max - $(countdown.obj).val().length;
									if (countdown.remaining > countdown.max) {
										$(countdown.obj).val($(countdown.obj).val().substring(0,countdown.max));
						 }
									$(countdown.obj).siblings(".remaining").html(countdown.remaining + " characters remaining.");
						 },
									max: null,
									remaining: null,
									obj: null
										};
											$(".countdown").each(function() {
										$(this).focus(function() {
											var c = $(this).attr("class");
												countdown.max = parseInt(c.match(/limit_[0-9]{1,}_/)[0].match(/[0-9]{1,}/)[0]);
									countdown.obj = this;
										iCount = setInterval(countdown.init,1000);
											}).blur(function() {
												countdown.init();
													clearInterval(iCount);
											});
										});
										
									//	   $(document).bind("contextmenu",function(e){
									//			return false;
									//	});

								 
    	});