<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="page-content-wrapper">
    <div class="container">
        <!-- Profile Wrapper-->
        <div class="profile-wrapper-area py-3">
            <!-- User Information-->
            <div class="card user-info-card">
                <div class="card-body p-4 d-flex align-items-center">
                    <div class="user-profile me-3"><img src="<?php echo get_user_image(); ?>" alt="<?php echo get_user_name(); ?>">
                    </div>
                    <div class="user-info">
                        <h5 class="mb-0"><?php echo get_user_name(); ?></h5>                        
                        <p class="mb-0 text-dark">@<?php echo $user->username; ?></p>
                    </div>
                </div>
            </div>
            <!-- User Meta Data-->
            <div class="card user-data-card">
                <div class="card-body">                    
                    <?php echo form_open('customer/profile/edit_account', array('autocomplete' => 'off')); ?>
                        <div class="mb-3">
                            <div class="title mb-2"><i class="lni lni-user"></i><span>Username</span></div>
                            <input class="form-control" type="text" id="inputName" name="username" value="<?php echo set_value('username', $user->username); ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <div class="title mb-2"><i class="lni lni-key"></i><span>Password</span></div>
                            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Masukkan password baru untuk mengganti.">
                        </div>
                        <button class="btn btn-success w-100" type="submit">Ganti Password</button>
                        <?php if ($flash) : ?>
                          <p class="text-center text-success"><?php echo $flash; ?></p>
                      <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>