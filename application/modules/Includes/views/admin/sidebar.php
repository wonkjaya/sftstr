<div class="row">
	<div class="col-md-12">
		
	</div>
	<div class="col-md-12"> <!--menu-->
	<?php 
	$menus=array(
		(object) array('title'=>'Dashboard','slug'=>'dashboard','href'=>'admin/dashboard'),
		(object) array('title'=>'Semua Produk','slug'=>'product_list','href'=>'admin/products_list','childs'=>
			(object) array(
						(object) array('title'=>'Aktif','href'=>'product_list?aktif'),
						(object) array('title'=>'Trash','href'=>'product_list?nonaktif')
					)
		),
		(object) array('title'=>'Daftar User','slug'=>'users','href'=>'admin/users','childs'=>
			(object) array(
						(object) array('title'=>'Aktif','href'=>'users?aktif'),
						(object) array('title'=>'Trash','href'=>'users?nonaktif')
					)),
		(object) array('title'=>'Daftar Pembayaran','slug'=>'invoice','href'=>'admin/invoice'),
	);
	?>
		<ul class="list-group">
		<?php
		$uri_slug=$this->uri->segment(1);
		foreach($menus as $menu){
			$dropdown=(isset($menu->childs))?'data-toggle="collapse" data-target="#collapse-'.$menu->slug.'" aria-expanded="false" aria-controls="collapseExample"':'';
			$active=($uri_slug==$menu->slug || (empty($uri_slug) && $menu->slug=='dashboard'))?'active':'';
			$caret='';//(isset($menu->childs))?'<span class="caret" style=""></span>':'';
			$menu_url=(isset($menu->childs))?'#':site_url($menu->slug);

			echo '<li class="dropdown list-group-item '.$active.'" '.$dropdown.'>';
			echo '<a href="'.$menu_url.'" style="text-decoration:none;color:#C0C0C0;">'.$menu->title.'</a>'.$caret;
			if(isset($menu->childs)){
				echo '<ul class="list-group collapse" id="collapse-'.$menu->slug.'" style="margin-top:20px">';
				foreach($menu->childs as $child){
					//print_r($child);
					echo '<li class="list-group-item ">'; 
					echo '<a href="'.site_url($child->href).'" style="text-decoration:none;color:#C0C0C0">'.$child->title.'</a>';
					echo '</li>';
				}
				echo '</ul>';
			}
			echo '</li>';
		}
		?>
			
		</ul>
	</div>
</div>