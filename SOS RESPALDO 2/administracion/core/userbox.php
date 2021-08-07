<div class="media user-media">
    <div class="user-media-toggleHover">
        <span class="fa fa-user"></span> 
    </div>
    <div class="user-wrapper">
        <a class="user-link" href="">
        <?php if ($arrUsuario['Direccion_img']=='') { ?>
        	<img class="media-object img-thumbnail user-img" alt="User Picture" src="img/usr.png">
        <?php }else{  ?>
        	<img class="media-object img-thumbnail user-img" alt="User Picture" src="<?php echo $arrUsuario['Direccion_img']; ?>">
        <?php }?>      
        </a> 
        <div class="media-body">
        <br/>
            <h5 class="media-heading"><?php echo $arrUsuario['Nombre'] ?></h5>
            <ul class="list-unstyled user-info">
                <li> <a href=""><?php echo $arrUsuario['tipo'] ?></a></li>
            </ul>
      </div>
  </div>
</div>