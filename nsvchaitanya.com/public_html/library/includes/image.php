<?php
	/*
	$fileTypes = array(
					1=>'image/png',
					2=>'image/jpeg',
					3=>'image/gif'
				);
	
	if(count($_FILES) > 0)
	{
		// print_r($_POST);
		// print_r($_SERVER);
		// print_r($_FILES);exit;
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
				
				if(!$fileContent)
				{
					
				}
				else
				{
					$int = strrpos(rtrim($_SERVER['DOCUMENT_ROOT'], '/'), '/');
					
					$fileNewPath = substr(rtrim($_SERVER['DOCUMENT_ROOT'], '/'), 0, $int). '/files/';
					
					$fileName = $_FILES[$key]['name'];
					
					$fileNewPath = $fileNewPath . $fileName;
					
					file_put_contents($fileNewPath, $fileContent);
				
					$fileContent = mysqli_real_escape_string($p->dbToken, $fileContent);
					
					$int = strpos($fileName, ".");
					
					$fileName = substr($fileName, 0, $int);
					
					if(in_array($_FILES[$key]['type'], $fileTypes))
					{
						$img_info = getimagesize($fileNewPath);
						
						$query = "
							INSERT
							INTO
								`chaitanya_useraccounts`.`filestorage`(
									`file_number`,
									`content`,
									`name`,
									`width`,
									`height`,
									`type`,
									`size`
							)
							VALUES(
								(SELECT MAX(p.file_number)+1 FROM `chaitanya_useraccounts`.`filestorage` p),
								'$fileContent',
								'$fileName',
								'{$img_info[0]}',
								'{$img_info[1]}',
								'{$_FILES[$key]['type']}',
								'{$_FILES[$key]['size']}'
							)
						;";
					}
					else
					{
						$query = "
							INSERT
							INTO
								`chaitanya_useraccounts`.`filestorage`(
									`file_number`,
									`content`,
									`name`,
									`width`,
									`height`,
									`type`,
									`size`
							)
							VALUES(
								(SELECT MAX(p.file_number)+1 FROM `chaitanya_useraccounts`.`filestorage` p),
								'$fileContent',
								'$fileName',
								'0',
								'0',
								'{$_FILES[$key]['type']}',
								'{$_FILES[$key]['size']}'
							)
						;";
					}
					$result = mysqli_query($p->dbToken, $query);
					
					if(!$result)
					{
						$errTxt = mysqli_error($p->dbToken);	
						
						print_r($errTxt);
						
						error_submission($query, $p->dbToken, __LINE__, __FILE__);
					}
					else
					{
					}
					
					$query = "
						SELECT 
							file_number 
						FROM 
							`filestorage` 
						WHERE 
							file_number 
						IN 
							(
								SELECT 
									MAX(file_number) 
								FROM 
									`filestorage`
							);
					";
					$result = mysqli_query($p->dbToken, $query);
					
					if(!$result)
					{
						$errTxt = mysqli_error($p->dbToken);	
						
						print_r($errTxt);
						
						error_submission($query, $p->dbToken, __LINE__, __FILE__);
					}
					else
					{
					}
					
					$row = mysqli_fetch_assoc($result);
					
					/*
					$retrieveFileContent = $row['content'];
					
					$base64EncodedData = base64_encode($retrieveFileContent);
					
					$p->output .= 
					'
						<img src="data:'.$img_info['mime'].';base64,'.$base64EncodedData.'"/>
					'; 
					*/
					/*
					header('Location: http://' . $_SERVER['HTTP_HOST'] . '/library/displayfile/'.$row['file_number']);
				}
				
			}	
		}
	}
	else
	{*/
		$p->stylElement .= 
		'
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
			.outsideBox{
				border: 1px solid black;
				margin: auto;
				width:100px;
			}
			.insideBox{
				width:0px;
				background: green;
				height:16px;
			}

		';
		/*<input type="file" class="input_upload" name="f"><br>*/
		$p->output .=
		'
			<form class="file-upload" method="post" enctype="multipart/form-data">
				<input type="file" class="input_upload" name="i"><br>
				
				<button type="button">
					Submit
				</button>
				
				<div class="outsideBox">
				
				<div class="insideBox">
					
				</div>
			</div>
				
			</form>
			
		';
		
		$p->bodyScripts[]['code'] = '
			
			$(":button").on("click", onFileSubmit);
			
			function onFileSubmit(){
				
				var formElement = document.getElementsByClassName("file-upload")[0];
				
				var formdata = new FormData(formElement);
				
				var request = new XMLHttpRequest();

				request.onreadystatechange = (...a)=>{console.log("readyState" , request, a)};
				
				request.loadstart = (...a)=>{console.log("loadstart" , request, a)};
				request.onprogress = (...a)=>{console.log("progress" , request, a)};
				request.onabort = (...a)=>{console.log("abort" , request, a)};
				request.onerror = (...a)=>{console.log("error" , request, a)};
				request.onload = (...a)=>{console.log("load" , request, a)};
				request.ontimeout = (...a)=>{console.log("timeout" , request, a)};
				request.onloadend = (...a)=>{console.log("loadend" , request, a)};

				request.upload.loadstart = (...a)=>{console.log("file loadstart" , request, a)};
				request.upload.onprogress = (...a)=>{
					console.log("file progress" , request, a);
					var percent = a[0].loaded/a[0].total;
					percent = Math.round(percent*100);
					document.getElementsByClassName("insideBox")[0].style.width = ""+percent+"px";
				};
				request.upload.onabort = (...a)=>{console.log("file abort" , request, a)};
				request.upload.onerror = (...a)=>{console.log("file error" , request, a)};
				request.upload.onload = (...a)=>{console.log("file load" , request, a)};
				request.upload.ontimeout = (...a)=>{console.log("file timeout" , request, a)};
				request.upload.onloadend = (...a)=>{console.log("file loadend" , request, a)};

				request.open("POST", "");
				request.setRequestHeader("enctype","multipart/form-data");
				request.send(formdata);
			}
		';
	//}
?>

