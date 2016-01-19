<?php
function getOption($key,$aset){
		$length = count($aset);
		for($i=0;$i<$length ;$i++ ){
			if($key == $i){
				return $aset[$i];
			}
		}
	}
	//echo getOption(1,array("大学","硕士","博士"));
	function getOptions($keys,$aset){
		$length1 = count($keys);
		$length2 = count($aset);
		$list = array();
		for($j=0;$j<$length1 ;$j++ ){
			for($i=0;$i<$length2 ;$i++ ){
				if($keys[$j] == $i){
					array_push($list,$aset[$i]);
				}
		    }
		}
		return $list;
		
	}

	//var_dump(getOptions(array("0","1"),array("大学","硕士","博士")));


	function print_array($list){
		for($i = 0;$i<count($list);$i++){
				if($i==count($list)){
					echo $list[$i];
				}
				else{
					echo $list[$i]." ";
				}
			  }
		
	}
?>