<?php
	$query = "
		SELECT
			*
		FROM
			users
		";
	$result = mysqli_query($p->dbToken, $query);
	
	if(!$result)
	{
		$errTxt = mysqli_error($p->dbToken);	
		
		print_r($errTxt);exit;
	}
	/*
		It displays a table to edit the selected user
	*/
	$p->output .=
		'
		<table class="table_style">
			<tr>
				<th>
					Name
				</th>
				<th>
					Email-Id
				</th>
				<th>
					Password
				</th>
				<th>
					Edit
				</th>
			</tr>';
	/*
		Admin can see the table of users for the edit
	*/		
	if($result)
	{
		while($row = mysqli_fetch_assoc($result))
		{
			$p->output .= '
				<tr>
					<td>
						' . $row['name'] . '
					</td>
					<td>
						' . $row['email-id'] . '
					</td>
					<td>
						' . $row['password'] . '
					</td>
					<td>
						<a href="/library/users/manage/edit/' .$row['id']. '" style="color:black;">
							Edit
						</a>
					</td>
				</tr>
				';
		}
	}
	
	$p->output .= '</table>';
?>