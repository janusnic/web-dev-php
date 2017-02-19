<?php
include (ROOT. '/app/views/parts/header.php');
?>
<main>
    <?php if($this->result):?>
        <h4 id="reg_thanks">Спасибо за регистрацию!</h4>
        <h3 id="reg_main">Вернуться на <a href="/" id="reg_main_a">Главную</a></h3>
    <?php else: ?>
        <?php if (isset($this->errors) && is_array($this->errors)):?>
            <ul class="errors">
                <?php foreach($this->errors as $error):?>
                    <li> - <?php echo $error;?></li>
                <?php endforeach;?>
            </ul>
        <?php endif;?>
            <div class="form">
                    <div id="signup">
                      <h1>Sign Up for Free</h1>

                      <form method="post">

                      <div class="top-row">
                        <div class="field-wrap">
                          <label>
                            First Name<span class="req">*</span>
                          </label>
                          <input type="text" name="name" value="<?php echo $this->name;?>" required autocomplete="off" />
                        </div>

                        <div class="field-wrap">
                          <label>
                            Last Name<span class="req">*</span>
                          </label>
                          <input type="text" name="lname" value="<?php echo $this->lname;?>" required autocomplete="off"/>
                        </div>
                      </div>

                      <div class="field-wrap">
                        <label>
                          Email Address<span class="req">*</span>
                        </label>
                        <input type="email" name="email" value="<?php echo $this->email;?>" required autocomplete="off"/>
                      </div>

                      <div class="field-wrap">
                        <label>
                          Set A Password<span class="req">*</span>
                        </label>
                        <input type="password" name="password" value="<?php echo $this->password;?>" required autocomplete="off"/>
                      </div>

                      <input type="submit" class="button button-block" value="Get Started" />
                      </form>

                    </div>
            </div> <!-- /form -->
            <?php endif;?>
    </main>

<?php
include (ROOT . '/app/views/parts/cart.php');
include (ROOT . '/app/views/parts/footer.php');
?>
