<?php
$data=(object) array('mode'=>'view','title'=>'Home');
		get_head($data);

menu($this->uri->segment(3));

function menu($segment){
	$array=array(
		array('title'=>'hello1','link'=>'hello1'),
		array('title'=>'hello2','link'=>'hello2'),
		array('title'=>'hello3','link'=>'hello3'),
		array('title'=>'hello4','link'=>'hello4')
	);
	echo '<div class="list-group">';
		  foreach($array as $a){
		  	$active=($a['link']==$segment)?'disabled':'';
		  	echo '<a href="'.$a['link'].'" class="list-group-item '.$active.'">'.$a['title'].'</a>';
		  }
	echo '</div>';
}

?>