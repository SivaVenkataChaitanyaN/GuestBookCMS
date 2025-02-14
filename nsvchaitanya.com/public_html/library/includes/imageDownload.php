<?php
	if(count($_FILES) > 0)
	{
		// print_r($_POST);
		// print_r($_SERVER);
		// print_r($_FILES);
		foreach($_FILES as $key=>$value)
		{
			if($_FILES[$key]['error'] != 0)
			{
				
			}
			else if($_FILES[$key]['size'] == 0)
			{
				
			}
			else
			{
				$filePath = $_FILES[$key]['tmp_name'];
				
				$filePath = str_replace('\\', '/', $filePath);
				
				$fileContent = file_get_contents($filePath);
				/*
				$img_info = getimagesizefromstring($fileContent);
				
				$resourcePointer = imagecreatefromstring($fileContent);
				
				header('Content-Type:'.$img_info['mime']);
				
				imagepng($resourcePointer);
				*/
				if(!$fileContent)
				{
					
				}
				else
				{
					//$fileNewPath = rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/test/images/2/f/';
					$int = strrpos(rtrim($_SERVER['DOCUMENT_ROOT'], '/'), '/');
					
					$fileNewPath = substr(rtrim($_SERVER['DOCUMENT_ROOT'], '/'), 0, $int). '/files/';
					
					$fileName = $_FILES[$key]['name'];
					
					$fileNewPath = $fileNewPath . $fileName;
					
					file_put_contents($fileNewPath, $fileContent);
				}
				
				$resourcePointer = imagecreatefromjpeg($fileNewPath);
				
				$newResourcePointer = imagecreatetruecolor("300", "300"); 
				
				imagecopyresampled($newResourcePointer, $resourcePointer, 0, 0, 56, 14, 300, 300, 191, 200);
				/*
				move_uploaded_file($_FILES[$key]['name'], $fileNewPath);
				
				$img_info = getimagesize($fileNewPath);
				
				print_r($img_info);
				
				$resourcePointer = imagecreatefromstring($fileContent);
				*/
				$img_info = getimagesize($fileNewPath);
				
				// $resourcePointer = imagecreatefrompng($fileNewPath);
				
				//$fileContent = file_get_contents($fileNewPath);
				
				$base64DecodedData = base64_encode($fileContent);
				// echo '<textarea>' . $base64DecodedData . '</textarea>';exit;
				// ob_start();
				
				header('Content-Type: '.$img_info['mime']);
				
				imagejpeg($newResourcePointer);
				// echo $fileContent;
				// echo '<textarea>'.ob_get_clean().'</textarea>';
				
				
				//$output .= '<img src="data:'.$img_info['mime'].';base64,'.$base64DecodedData.'"/>'; 
				
			}
		}
	}
	else
	{
		$p->output .= 
		'<html>
			<head>	
				<style>
					.file-upload
					{
						margin:auto;
						display:table;
						border:1px solid black;
						padding:10px 0px 10px 10px;
					}
					.input_upload
					{
						margin:5px 0px 5px 0px;
					}
				</style>
			</head>
			<body>
				<form class="file-upload" method="post" enctype="multipart/form-data">
					<input type="file" class="input_upload" name="i"><br>
					<input type="file" class="input_upload" name="f"><br>
					<button type="submit">
						Submit
					</button>
				</form>
			</body>
		</html>
		';
	}
?>