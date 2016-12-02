<div id="faded">
	<!--ul class="slides">
		<li><img src="<?=base_url('assets/main-page/images/slide-title1.gif')?>"><a href="#"><span><span>Pesan Sekarang</span></span></a></li>
		<li><img src="<?=base_url('assets/main-page/images/slide-title4.gif')?>"><a href="#"><span><span>Lihat Penawaran</span></span></a></li>
		<li><img src="<?=base_url('assets/main-page/images/slide-title3.gif')?>"><a href="#"><span><span>Selengkapnya</span></span></a></li>
		<li><img src="<?=base_url('assets/main-page/images/slide-title2.gif')?>"><a href="#"><span><span>Selengkapnya</span></span></a></li>
	</ul-->
	<ul class="slides">
		<li>
			<span class="promo">
				<ul>
					<li class="color-black">Pembuatan</li>
					<li class="color-white">Website</li>
					<li class="color-black">Diskon Up</li>
					<li class="color-white">20%</li>
				</ul>
			</span>
			<a href="#">
				<span>
					<span>Pesan Sekarang</span>
				</span>
			</a>
		</li>
		<li>
			<span class="promo">
				<ul>
					<li class="color-black">Pembuatan</li>
					<li class="color-white">Software</li>
					<li class="color-black">Mulai Dari</li>
					<li class="color-white">IRD 499 rb</li>
				</ul>
			</span>
				<a href="#">
					<span>
						<span>Lihat Penawaran</span>
					</span>
				</a>
		</li>
		<li>
			<span class="promo">
				<ul>
					<li class="color-black">Tersedia</li>
					<li class="color-white">Paket</li>
					<li class="color-white" style="text-indent:30px">Komputer</li>
					<li class="color-black">Diskon<span class="color-white">5%</span></li>
				</ul>
			</span>
				<a href="#">
					<span>
						<span>Selengkapnya</span>
					</span>
				</a>
		</li>
		<li>
			<span class="promo">
				<ul>
					<li class="color-black">Pasang</li>
					<li class="color-white" style="text-indent:30px">Jaringan</li>
					<li class="color-black">Mudah Dan</li>
					<li class="color-white">Nyaman</li>
				</ul>
			</span>
				<a href="#">
					<span>
						<span>Selengkapnya</span>
					</span>
				</a>
		</li>
	</ul>
	<ul class="pagination">
		<li><a href="#" rel="0"><span>Website</span><small>Informasi Lebih Lanjut</small></a></li>
		<li><a href="#" rel="1"><span>Software</span><small>Informasi Lebih Lanjut</small></a></li>
		<li><a href="#" rel="2"><span>Paket Komputer</span><small>Informasi Lebih Lanjut</small></a></li>
		<li><a href="#" rel="3"><span>Networking</span><small>Informasi Lebih Lanjut</small></a></li>
	</ul>
</div>
<script type="text/javascript">
	$(function(){
		$("#faded").faded({
			speed: 500,
			crossfade: true,
			autoplay: 10000,
			autopagination:false
		});
		
		$('#domain-form').jqTransform({imgPath:'jqtransformplugin/img/'});
	});
</script>