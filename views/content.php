<?php 
$produk = mysqli_query($db, "SELECT * FROM line_hight ORDER BY id DESC");
?>
<div id="product">
<div class="container">
  <div class="row">
    <div class="cold-md-12">
    <div uk-slider="center: true" uk-height-viewport= "min-height: 300; max-height: 600">
    <div class="uk-position-relative uk-visible-toggle uk-light">

        <ul class="uk-slider-items uk-child-width-1-2@s uk-grid">
         <?php if(mysqli_num_rows($produk)>1){?>
            <?php while($product = mysqli_fetch_assoc($produk)){?>
            <li>
                <div class="uk-card uk-card-default">
                    <div class="uk-card-media-top">
                        <img src="img/<?=$product['image'];?>" alt="">
                    </div>
                    <div class="uk-card-body">
                        <h4 class="uk-card-title"><?=$product['judul'];?></h4>
                        <span>Genre: <?=$product['genre'];?></span><br/>
                        <span>Type: <?=$product['tipe'];?></span>
                        <p><?=$product['konten'];?></p>
                    </div>
                </div> 
            </li>
               <?php }?>
                <?php }?>
        </ul>

        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

    </div>

    <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>


</div>
    </div>
  </div>
</div>
</div>
    