<article class='main'>
                <h2><?php echo $data['post']['title'];?></h2>
                    <div>
                        <p>
                            <?php echo $data['post']['content'];?></div>
                        </p>
                    <div class="comment">
                    <?php
                    /*
                    /	Output the comments one by one:
                    */
                    echo "<h2>All Comments</h2><p>";

                    //print_r($data['comments']);
                    foreach($data['comments'] as $c){
                        echo $c->markup();
                    }

                    ?>
                    </p>
                    <?php if(!User::isGuest()):?>
                    <div id="addCommentContainer">
                        <p>
                            Hello <?php echo User::getName();?>!
                        </p>
                    	<p>Add a Comment</p>
                    	<form id="addCommentForm" method="post" action="">
                        	<div>

                            	<input type="hidden" name="post_id" id="post_id" value="<?php echo $data['post']['id'];?>"/>

                                <input type="hidden" name="user_id" id="user_id" value="<?php echo Session::get('userId');?>" />

                                <label for="body">Comment Body</label>
                                <textarea name="body" id="body" cols="20" rows="5"></textarea>

                                <input type="submit" id="submit" value="Submit" />
                            </div>
                        </form>
                    </div>
                    <?php endif;?>

                </div>
</article>
