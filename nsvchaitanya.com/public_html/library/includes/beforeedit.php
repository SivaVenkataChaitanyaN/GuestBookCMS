<?php
	include rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/library/includes/functions/display-functions.php';
	
	$dbToken =	mysqli_connect('127.0.0.1', 'chaitanya', 'Chaitanya');
	
	$numPerPage = 5;
	
	$query = '
		SELECT 
			COUNT(*)
		AS
			numberOfRecords 	
		FROM 
			chaitanya_useracoounts.books
		';
	
	$result = mysqli_query($dbToken, $query);
	
	if(!$result)
	{
		$errTxt = mysqli_error($dbToken);	
		
		print_r($errTxt);
	}
	else
	{
	}
	
	if($result)
	{
		$row = mysqli_fetch_assoc($result);
		
		$numberOfRecords = $row['numberOfRecords'];
		
		$numberOfPages = ceil($numberOfRecords/$numPerPage);
	}
	
	$startAt = $numPerPage * ($currentPage - 1);

	$query = "
		SELECT 
			* 
		FROM 
			chaitanya_useracoounts.books
		ORDER BY
			books.nameOfBooks ASC	
		LIMIT
			{$startAt}, 5	
		";
	
	$result = mysqli_query($dbToken, $query);
	
	if(!$result)
	{
		$errTxt = mysqli_error($dbToken);	
		
		print_r($errTxt);
	}
	else
	{
	}
	
	if($result)
	{
		$num_rows = mysqli_num_rows($result);
		
		if($num_rows > 0)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$output .=
				'<div class="div_border">
				' . $row['user'] .'
				<a href="/library/editComments?id=' . $row['id'] . '&action=' . $dAction . '" >
					<img class="img_delete"/>
				</a>
				<a href="/library/editComments?id=' . $row['id'] . '&action=' . $eAction . '">
					<img class="img_edit"/>
				</a>
					<p class="content">
						' . $row['nameOfBooks'] . '
					</p>
				</div>
				</div>';
			}
		}
		
	}
	
	$output .= '<div class="div_pag_nav">';
	
	$numlinks = 4;
	
	$output .= edit_page_nav($numlinks, $currentPage, $numberOfPages);
	
	$output .= '</div></main>';
?>