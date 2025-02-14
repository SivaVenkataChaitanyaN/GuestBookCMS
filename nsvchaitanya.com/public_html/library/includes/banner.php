<?php
	$p->output .= '
		<div class="div_banner">

			<img class="img_banner" src="/library/images/watch.jpg">

		</div>
	';
	
	$p->bodyScripts[]['code'] = '
		$banner = {};
		$banner.execute = {
			"onload":"",
			"load":[],
			"onresize":"",
			"resize":[],
			"resizing":{
				"act":"",
				"id":null
			},
			"onready":"",
			"ready":[],
			"onscroll":"",
			"scroll":[]
		};
		$banner.execute.onload = function(){

			$.each($banner.execute.load, function(index, value){
					
				value();
			});
		};
		
		$(window).on("load", $banner.execute.onload);
		
		
		$banner.execute.resizing.act = function() {
			
			$.each($banner.execute.resize, function(index, value){

				value();
			});
		};
		
		$banner.execute.onresize = function(){
			
			clearTimeout($banner.execute.resizing.id);
			
			$banner.execute.resizing.id = setTimeout($banner.execute.resizing.act, 600);
		};
		
		$(window).on("resize", $banner.execute.onresize);
		
		
		$banner.execute.onscroll = function(){

			$.each($banner.execute.scroll, function(index, value){
					
				value();
			});
		};
		
		$(window).on("scroll", $banner.execute.onscroll);
		
		
		$banner.execute.onready = function(){

			$.each($banner.execute.ready, function(index, value){
					
				value();
			});
		};
		
		$(document).ready($banner.execute.onready);
		
		$banner.topBanner = {
			"adj":"",
			"img":{
				"id":null,
				"load":"",
				"list":[],
				"play":"",
				"change":"",
				"cur":-1
			},
			"txt":{
				"set":"",
				"list":[],
				"cur":-1
			},
			"vid":""
		};

		
		
		$banner.topBanner.adj = function() {
		
			var viewportWidth = $(window).width();
			
			var viewportHeight = $(window).height();
			
			var bannerHolder = $(".div_banner");
			
			var bannerHolderHeight = $(bannerHolder).height();
			
			var bannerHolderWidth = $(bannerHolder).width();
			
				/*
					bannerImage would be an array of matched 
					elements returned by the selector 
				*/
			var bannerImage = $(".img_banner");
				/*
					currentMedia would be either an image 
					based on document content
				*/
			var currentMedia = bannerImage.length > 0 ? bannerImage[0] : false;

			if(currentMedia)
			{
					/*
						viewportHeight > viewportWidth => portrait 
					*/
				if(viewportHeight >= viewportWidth)
				{
						/*
							if media height already set to 
							occupy complete viewportHeight 
							do nothing, otherwise 
						*/
					if($(currentMedia).css("height") != "100vh")
					{
							/*
								set media height to viewportHeight and 
								width to auto 
								
								width gets calculated based on original 
								media height width proportion
							*/
						$(currentMedia).css({"width":"auto","height":"100vh"});
					}
				}
				else 
				{
					if($(currentMedia).css("width") != "100vw")
					{
						$(currentMedia).css({"width":"100vw","height":"auto"});
					}
				}

				var currentMediaHeight = $(currentMedia).height();

				var currentMediaWidth = $(currentMedia).width();

				if(currentMediaHeight != bannerHolderHeight)
				{
					$(bannerHolder).css("height",parseInt(currentMediaHeight) + "px");
				}
				else 
				{
					if(currentMediaWidth < bannerHolderWidth)
						
						$(currentMedia).css({"width":"100vw","height":"auto"});
				}	
			}
		};

		$banner.execute.ready.push($banner.topBanner.adj);
		
		$banner.execute.load.push($banner.topBanner.adj);
		
		$banner.execute.resize.push($banner.topBanner.adj);
		
		/* END Adjust */	
		
		
		/* Image Slide Show */	
		
			/*
				preload and list images 
			*/
		$banner.topBanner.img.load = function(){
			
				/*
					value of data-images attribute holds the data 
					relating to the other images that can be used
					in the slide show
					
					OtherImages holds the string representing data 
					relating to other images
				*/
			var OtherImages = $(".img_banner").attr("data-images");
			
				/*
					Execute only if the other images are available

					undefined when the attribute is not present 
					and empty when its value is an empty string
				*/
			if(OtherImages != undefined && OtherImages != "")
			{
					/*
						split the string holding the other image data at ,
						data relating to each image is terminated by a ,
						
						OtherImages would now be an array, each element holding
						data relating to each image
					*/
				OtherImages = OtherImages.split(",");
				
					/*
						Iterate OtherImages 
					*/
				$(OtherImages).each(function(){
					
						/*
							If the value of the element in the 
							current iteratino is not empty 
						*/
					if(this != "")
					{
							/*
								Create an image object using the value 
								of the element in the current iteration 
								as the source
							*/
						(new Image()).src = this;
						
							/*
								Push that Src to the list of images
								used in the slide show
								
								this an object, is converted to a string 
							*/
						$banner.topBanner.img.list.push(String(this));
					}
				});
				
					/*
						Add the src value of the <img element displaying 
						the banner image, to the list at the end 
						
						this would be the default image whose data is not 
						included in the data-images value 
					*/
				$banner.topBanner.img.list.push($(".img_banner").attr("src"));
			}			
		};
		
			/*
				Add the img.load method to the list of 
				methods to be executed on document ready 
			*/
		$banner.execute.ready.push($banner.topBanner.img.load);
		
		
			/*
				list texts
			*/
		$banner.topBanner.txt.set = function(){
			
				/*
					value of data-texts attribute holds the data 
					relating to the other texts that can be used
					in the slide show
					
					OtherTexts holds the string representing data 
					relating to other texts 
				*/
			var OtherTexts = $(".h_banner_top").attr("data-texts");
			
				/*
					Execute only if the other texts are available
					
					undefined when the attribute is not present 
					and empty when its value is an empty string
				*/
			if(OtherTexts != undefined && OtherTexts != "")
			{
					/*
						split the string holding the other texts data at ,
						data relating to each title is terminated by a ,
						
						OtherTexts would now be an array, each element holding
						data relating to a single title text 
					*/
				OtherTexts = OtherTexts.split(",");
				
					/*
						Iterate OtherTexts 
					*/
				$(OtherTexts).each(function(){
					
						/*
							Push each title text the list of texts
							used in the slide show
							
							this an object, is converted to a string 
						*/
					$banner.topBanner.txt.list.push(String(this));
				});
				
					/*
						Add the inner html (text) of the <h2 element displaying 
						the banner title, to the list at the end 
						
						this would be the default title whose data is not 
						included in the data-texts value 
					*/
				$banner.topBanner.txt.list.push($(".h_banner_top").text());
			}
		};
		
			/*
				Add the txt.set method to the list of 
				methods to be executed on document ready 
			*/
		$banner.execute.ready.push($banner.topBanner.txt.set);
		
		
			/*
				Change Banner Image 
			*/
		$banner.topBanner.img.change = function(){
			
				/*
					Local variables for easier handling
				*/
			var imageList = $banner.topBanner.img.list;
			
			var currentImage = $banner.topBanner.img.cur;
			
				/*
					slide show is possible only 
					when there are multiple images 
					
					Thus, if the list has more than 1 images
				*/
			if(imageList.length > 1)
			{
					/*
						only if it is not there, thereby avoiding
						the class being added multiple time 
					*/
				if(!$(".div_banner").hasClass("blackenbg"))
					
						/*
							Set the holder background to something other than white 
							to avoid glare between image changes, by adding the class
							that specifies such background properties 
						*/
					$(".div_banner")
						.addClass("blackenbg");
				
					/*
						set the image that is going to be used 
						to the next in the list 
						
						currentImage being the numerical value representing 
						the subscript for the element in the image list array 
					*/
				currentImage++;
		
					/*
						If the image to be used surpasses 
						the last image in the list 
					*/
				if(currentImage == imageList.length)
					
						/*
							set the same to the 
							first in the list 
						*/
					currentImage = 0;
				
					/*
						set the object property 
						since we are using local variables 
					*/
				$banner.topBanner.img.cur = currentImage;
					
					/*
						fade out the existing image quickly 
					*/
				$(".img_banner")
					.fadeOut("fast", function(){
						
							/*
								Using call back, if there is banner text
							*/
						if($(".h_banner_top").length > 0)
							
								/*
									fade it out quickly
								*/
							$(".h_banner_top")
								.fadeOut("fast");

							/*
								banner image
							*/
						$(".img_banner")
								/*
									set the current image to the 
									banner src attribute 
								*/
							.attr("src",imageList[currentImage])
							
								/*
									fade in the image quickly so that 
									the image shows up with mimial gap 
									after the prior image is faded out 
								*/
							.fadeIn("fast", function(){
								
									/*
										using a call back, call the method 
										to change the banner text 
									*/
								$banner.topBanner.txt.change();
							});
					});
					
					/*
						adjust the banner so that it gets 
						adjusted based on the new image 
					*/
				$banner.topBanner.adj();	
			}
			
			return false;
		};
		
		$banner.topBanner.img.play = function(){
			
			clearInterval($banner.topBanner.img.id);
			
			$banner.topBanner.img.id = setInterval($banner.topBanner.img.change, 4000);
		};
		
		$banner.execute.load.push($banner.topBanner.img.play);
		
		
			/*
				Change Banner Text
			*/
		$banner.topBanner.txt.change = function(){
			
				/*
					Local variables for easier handling
				*/
			var textsList = $banner.topBanner.txt.list;
			
			var currentText = $banner.topBanner.txt.cur;
			
			if(textsList.length > 0)
			{
				currentText++;

				if(currentText == textsList.length)
					
					currentText = 0;
									
				$banner.topBanner.txt.cur = currentText;	

				$(".h_banner_top")
					.html(textsList[currentText])
					.fadeIn("fast");	
			}
			
			return false;
		};'
	;
?>