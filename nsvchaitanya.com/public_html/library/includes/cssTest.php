<?php
	$p->stylElement .= 
		'
			img{
				// filter:blur(5px);
				clip-path:circle(40%);
				padding:10px;
				margin:10px;
				transition:all 0.5s ease-in-out;
				animation:ZoomInOut 5s ease-in-out infinite;
			}
		';
	$p->output .= 
		'
			<img src="/twitter.jpg"/>
		'
	;
?>