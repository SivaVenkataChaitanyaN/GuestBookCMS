<?php
	$result = file_get_contents($_SERVER['DOCUMENT_ROOT']."/library/images/test.csv");
	
	$row = explode("\n", $result);
	
	array_shift($row);
	
	foreach($row as $k=>$v)
	{
		if($v)
		{
			$col = explode(",", $v);
			
			$query = "INSERT INTO `domain`(
						`GlobalRank`,
						`TldRank`,
						`Domain`,
						`TLD`,
						`RefSubNets`,
						`RefIPs`,
						`IDN_Domain`,
						`IDN_TLD`,
						`PrevGlobalRank`,
						`PrevTldRank`,
						`PrevRefSubNets`,
						`PrevRefIPs`
						)
						VALUES (
						'{$col[0]}',
						'{$col[1]}',
						'{$col[2]}',
						'{$col[3]}',
						'{$col[4]}',
						'{$col[5]}',
						'{$col[6]}',
						'{$col[7]}',
						'{$col[8]}',
						'{$col[9]}',
						'{$col[10]}',
						'{$col[11]}'
						);";
			$result = mysqli_query($p->dbToken, $query);
			
			$errText = mysqli_error($p->dbToken);
			
			print_r($errText);
		}
	}
?>