<?php  
function format($number){
	return  sprintf('%04d', $number);
}

function sorting($value,$type){
	$returnvalue = '';
	$array = array_map('intval',str_split($value));
	(($type==1)?sort($array):rsort($array));
	foreach ($array as $key => $value) {
		$returnvalue .=$value;
	}
	return $returnvalue;
}

function cal($numnew,$status=false){
	if(!$status){
		$numnew = format($numnew);
		$num = $numnew;
		$revnum = 0;
		while($num != 0){
			$revnum = $revnum * 10 + $num % 10;
			$num = (int)($num/10); 
		}
		$revnum = format($revnum);	
		$leftvalue = sorting($revnum,1);
		$sum = format($numnew-$leftvalue);
		echo "<table border=1><tr><td>$numnew</td><td>$leftvalue</td><td>$sum</td></tr></table>";
		$status = false;
		if($sum == 6174){
			$status = true;
		}
		$rightvalue = sorting($sum,0);
		cal($rightvalue,$status);
	}
}

cal(1001);
?>  
