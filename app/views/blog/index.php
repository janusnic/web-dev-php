<div class="container">
        <h2>Последние публикации</h2>


            <?php foreach($data['posts'] as $singleItem): ?>
            <li>
                <h3><?php echo $singleItem['title']?></h3>
                <p><?php echo $singleItem['description'];?></p>
                    <a href="/blog/<?php echo $singleItem['id']; ?>">Read More</a>
                    <a href="/blog/<?php echo $singleItem['slug']; ?>">Read More</a>
                    <h3><?php echo print_r($singleItem['slug']);?></h3>

            </li>

            <?php endforeach; ?>
    </ul> <!-- gallery-items -->
</div>
