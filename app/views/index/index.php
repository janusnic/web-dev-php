<h1>Welcome To HOME PAGE</h1>
<div class="container">
        <h2>Последние товары</h2>
        <!--main content-->
        <ul id="gallery-items" class="container">
            <!--single item-->
            <?php foreach($data['products'] as $singleItem): ?>
            <li><figure class="product">
                    <img width="268px" height="249px" alt="" src="<?php echo Product::getImage($singleItem['id']); ?>" />
                    <div class="button">
                         <div class="prices"><?php echo $singleItem['price'] ?>&nbspгрн</div>
                         <a class="addtocart">
                         <div class="add">Add to Cart</div>
                         <div class="added">Added!</div>
                         </a>
                     </div>
                     <figcaption>
                         <h3><?php echo $singleItem['name']?></h3>
                         <p><?php echo $singleItem['description'];?></p>
                         <div class="price">
                           <s><?php echo $singleItem['price'] ?>&nbspгрн</s><?php echo $singleItem['price'] ?>&nbspгрн
                         </div>
                   </figcaption>
                   <a href="#"><i class="add"><span class="fa fa-shopping-cart"></span></i></a>
            </figure></li>
            <?php endforeach; ?>
    </ul> <!-- gallery-items -->
</div>
