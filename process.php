<?php
		$origin=$_POST['p'];
		$des=$_POST['d'];
		$type=$_POST['c'];
		$luggage=$_POST['l'];
		
	 $distance=array('Charbagh'=>0,
					 'Indra Nagar'=> 10,
					 'BBD'=> 30,
					 'Barabanki'=>60,
					 'Basti'=>150,
					 'Faizabad'=>100,
					 'Gorakhpur'=> 210);
	 $f=$distance[$origin];
	 $s=$distance[$des];
	 if($f==$s){
	 	$text="Pick Up and Drop Point must be different!!!";
	 	echo json_encode($text);
	 }else{
	 $price=0;
	 $total_distance=abs($f-$s);
	 if($type=="CedMicro"){
	 	if($total_distance<=10){
	 		$price=($total_distance* 13.50)+50;
	 	}elseif($total_distance>10 && $total_distance<=60){
	 		$price=(10*13.50)+(($total_distance-10)* 12.00)+50;
	 	}elseif($total_distance>60 && $total_distance<=160){
	 		$price=(10*13.50)+(50*12.00)+(($total_distance-60)* 10.20)+50;
	 	}elseif($total_distance>160){
	 		$price=(10*13.50)+(50*12.00)+(100*10.20)+(($total_distance-160)* 8.50)+50;
	 	}
	 }
	 if($type=="CedMini"){
	 	if($total_distance<=10){
	 		$price=($total_distance* 14.50)+150;
	 	}elseif($total_distance>10 && $total_distance<=60){
	 		$price=(10*14.50)+(($total_distance-10)* 13.00)+150;
	 	}elseif($total_distance>60 && $total_distance<=160){
	 		$price=(10*14.50)+(50*13.00)+(($total_distance-60)* 11.20)+150;
	 	}elseif($total_distance>160){
	 		$price=(10*14.50)+(50*13.00)+(100*11.20)+(($total_distance-160)* 9.50)+150;
	 	}
	 	if($luggage<=10){
	 		$price=$price+50;
	 	}elseif(10<$luggage && $luggage<=20){
	 		$price=$price+100;
	 	}elseif($luggage>20){
	 		$price=$price+200;
	 	}
	 }
	 if($type=="CedRoyal"){
	 	if($total_distance<=10){
	 		$price=($total_distance* 15.50)+200;
	 	}elseif($total_distance>10 && $total_distance<=60){
	 		$price=(10*15.50)+(($total_distance-10)* 14.00)+200;
	 	}elseif($total_distance>60 && $total_distance<=160){
	 		$price=(10*15.50)+(50*14.00)+(($total_distance-60)* 12.20)+200;
	 	}elseif($total_distance>160){
	 		$price=(10*15.50)+(50*14.00)+(100*12.20)+(($total_distance-160)* 10.50)+200;
	 	}
	 	if($luggage<=10){
	 		$price=$price+50;
	 	}elseif(10<$luggage && $luggage<=20){
	 		$price=$price+100;
	 	}elseif($luggage>20){
	 		$price=$price+200;
	 	}
	 }
	 if($type=="CedSUV"){
	 	if($total_distance<=10){
	 		$price=($total_distance* 16.50)+250;
	 	}elseif($total_distance>10 && $total_distance<=60){
	 		$price=(10*16.50)+(($total_distance-10)* 15.00)+250;
	 	}elseif($total_distance>60 && $total_distance<=160){
	 		$price=(10*16.50)+(50*15.00)+(($total_distance-60)*  13.20)+250;
	 	}elseif($total_distance>160){
	 		$price=(10*16.50)+(50*15.00)+(100* 13.20)+(($total_distance-160)* 11.50)+250;
	 	}
	 	if($luggage<=10){
	 		$price=$price+100;
	 	}elseif(10<$luggage && $luggage<=20){
	 		$price=$price+200;
	 	}elseif($luggage>20){
	 		$price=$price+400;
	 	}
	 }
	 echo json_encode($price);
	 $origin="";
	 $des="";
	 $type="";
	 $luggage=0;
	}
	 
?>