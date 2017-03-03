<section>
        <!--left sidebar-->
        <div class="sidebar">
            <h2>Категории</h2>
            <ul class="left_sidebar">
                <?php foreach ($data['categories'] as $catItem): ?>
                    <li><a href="/category/<?php echo $catItem['id']?>">
                            <?php echo $catItem['name']?>
                        </a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <!--main content-->
        <div class="content">
            <!--main content-->
            <ul id="gallery-items" class="container">
                <h2>Последние товары</h2>
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

            <div class="pagination middle">
                <?php echo $data['pagination']->get();?>
            </div>
    </div>
</section>
