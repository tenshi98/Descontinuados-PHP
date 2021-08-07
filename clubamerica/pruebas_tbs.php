<?php session_start();
  
    // HEAD --->
        require_once('inc/head.php');         
     // HEAD --->


$rest = substr("nph1_marcelolopezb@gmail.com", 0,5); 

echo $rest;
	 ?>
<link rel="stylesheet" href="css/tabs2.css" TYPE="text/css" MEDIA="screen">
<BODY>

                 <div class="wrapper_b">
                 		<div class="wrapper_casting">
                                     <div class="video_talento">

                                     	<h3>Talento</h3>



                                        <ul>
                                        	<li class="active">
											<a href="">VIDEO 1</a></li>
                                        	<li><a href="">VIDEO 2</a></li>
                                        	<li><a href="">VIDEO 3</a></li>
                                        </ul>



<section class="tabs noti_hover noti_checked ">
       
       
        <input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" />
        <label for="tab-1" class="tab-label-1 "><i class="fa fa-inbox">VIDEO 1</i></label>
        
        <input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" />
        <label for="tab-2" class="tab-label-2 "><i class="fa fa-share-square-o">VIDEO 2</i></label>
        
        <input id="tab-3" type="radio" name="radio-set" class="tab-selector-3" />
        <label for="tab-3" class="tab-label-3 "><i class="fa fa-taxi">VIDEO 3</i></label>
        
    
        <div class="clear-shadow"></div>
        
        
        <div class="content ">
          
          <div class="content-1"> UNO</div>
          <div class="content-2"> DOS</div>
          <div class="content-3"> TRES</div>

          
        </div>
        
<div class=" clear"></div>        
</section>
</div></div>
</BODY>
</HTML>
