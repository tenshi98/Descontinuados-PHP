<?php if (isset($arrUsuario['imgLogo'])&&$arrUsuario['imgLogo']!=''){?>
	<img src="upload/<?php echo $arrUsuario['imgLogo']; ?>" alt="">
<?php }else{?>
	<div class="logo_empresa">
		<div class="content_gearbox fleft">
			<div class="gearbox">
				<div class="overlay"></div>
				<div class="gear one">
					<div class="gear-inner">
						<div class="bar"></div>
						<div class="bar"></div>
						<div class="bar"></div>
					</div>
				</div>
				<div class="gear two">
					<div class="gear-inner">
						<div class="bar"></div>
						<div class="bar"></div>
						<div class="bar"></div>
					</div>
				</div>
							
				<div class="gear four large">
					<div class="gear-inner">
						<div class="bar"></div>
						<div class="bar"></div>
						<div class="bar"></div>
						<div class="bar"></div>
						<div class="bar"></div>
						<div class="bar"></div>
					</div>
				</div>
			</div>
							  
							  
		</div>
		<div class="texto fleft">
			<h1><?php if(isset($arrUsuario['RazonSocial'])&&$arrUsuario['RazonSocial']!=''){echo $arrUsuario['RazonSocial'];}?><br/>
			<span>Software de gestion - Planes de lubricacion TFM</span>
			</h1>
		</div>
	</div>
<?php } ?>
