<?php
	$p->output .= '<div class="div_left_float">';
	
	for($i = 0; $i < 63;$i++)
	{
		$p->output .= '
		<div class="div_eventName">
			a
		</div>';
	}
	$p->output .= '</div>';

	$p->output .= 
		'<div class="div_right_float">';
		
	$p->output .= 
	'
		<div class="' .$p->bord_con_class['class']. '">
		
			<div >
				Chaitanya';
	$p->output	.= '</div>';
	
	if(isset($_SESSION['user']))
	{	
		$p->output .= '<div>
			<a href="'.$p->edit_nav_page['href'].'/'.$row['id'].'">
				<img class="'.$p->edit_img['class'].'"/>
			</a>
		</div>';
	}
	
	$p->output .= '
			<button name="toggle" type="button">Show/Hide</button> 
			<div>
				FavouriteSubject : Maths
				<div style="float:right;">
					FavouriteSport :Cricket
				</div>
			</div>';
			/*
				If the user login he can see edit button and delete button
			*/
	$p->output .= '
				<p class="'.$p->content['class'].'">
					President Trump and Chairman Kim Jong Un conducted a comprehensive, in-depth, and sincere exchange of opinions on the issues related to the establishment of new U.S.-DPRK relations and the building of a lasting and robust peace regime on the Korean Peninsula. President Trump committed to provide security guarantees to the DPRK, and Chairman Kim Jong Un reaffirmed his firm and unwavering commitment to complete denuclearization of the Korean Peninsula.
				</p>
				Hobbies : Playing, Reading, Watching TV.
			</div>
		</div>
		<div class="div_clear">
		</div>';
		
	$p->output .=
		'<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
		</script>
		<script>
			var eventNameStr = "onabort, onautocomplete, onautocompleteerror, onblur, oncancel, oncanplay, oncanplaythrough, onchange, onclick, onclose, oncontextmenu, oncuechange, ondblclick, ondrag, ondragend, ondragenter, ondragexit, ondragleave, ondragover, ondragstart, ondrop, ondurationchange, onemptied, onended, onerror, onfocus, oninput, oninvalid, onkeydown, onkeypress, onkeyup, onload, onloadeddata, onloadedmetadata, onloadstart, onmousedown, onmouseenter, onmouseleave, onmousemove, onmouseout, onmouseover, onmouseup, onmousewheel, onpause, onplay, onplaying, onprogress, onratechange, onreset, onresize, onscroll, onseeked, onseeking, onselect, onshow, onsort, onstalled, onsubmit, onsuspend, ontimeupdate, ontoggle, onvolumechange, onwaiting";
			
			var eventName = eventNameStr.split(",");
			
			var prevEvent = "";
			
			var prevElement = "";
			
			for(var i = 0; i < eventName.length; i++)
			{
				$(".div_eventName:eq("+i+")")
					.html(eventName[i]);
				
				$(".div_eventName:eq("+i+")")
					.on("click", function(){
						
						$(this).css("border", "3px solid black");
						
						var curEvent = $(this).html();
						
						curEvent = curEvent.slice(3);

						var curElement = $(this);
						
						var prevEvent = "";

						$(".div_border_on").attr(curEvent+"-event", "yes");
						
						if(prevEvent != curEvent)
						{
							$(":button")
								.off(prevEvent);
							
							if(prevElement != "")
							{
								prevElement
									.removeAttr("style");
							}
							
							$(":button")
								.on(curEvent, function(){
								
									$(this)
										.siblings(".content")
										.slideToggle(600);
									
								});
								
							if(prevEvent != "")
							{
								$(".div_border_on")
									.removeAttr(prevEvent + "-event");
							}
							prevEvent = curEvent;
							
							prevElement = curElement;
						}
						
					});
			}
		</script>';
?>