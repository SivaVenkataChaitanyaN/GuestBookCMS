<?php
	
	if(isset($_POST['submit']))
	{
		$mail_to = $_POST['to'];
		
		$mail_from = $_POST['from'];
		
		$subject = $_POST['subject'];

		$message = $_POST['message'];
		
		$headers .= 'From:' . $mail_from . '<no-reply@' . $mail_from . '>' . " \r\n";
		
		$confirm = @mail($mail_to, $subject, $message, $headers);

		if($confirm)
		{
			echo 'Thank You';
		}
		else
		{
			echo 'Sorry';
		}
		
	}
	else
	{
		$p->output .= 
			'<form action="/library/formTest" method="post" style="background:blue">
				<div>
					To
				</div>
				<div>
					<input name="to" value="" type="text" id="id" class="input_style" placeholder="To:"/>
				</div>
				<div>
					From
				</div>
				<div>
					<input name="from" value="" type="text" id="id" class="input_style" placeholder="From"/>
				</div>
				<div>
					Subject
				</div>
				<div>
					<input name="subject" value="" type="text" id="id" class="input_style" placeholder="Subject"/>
				</div>
				<div>
					Message
				</div>
				<div>
					<textarea name="message" id="booksTaken" placeholder="Message" class="textarea_dim"></textarea>
				</div>
				<div>
					<button type="submit" name="submit" id="btn">
						Submit
					</button>
				</div>
			</form>
		';
	}
?>