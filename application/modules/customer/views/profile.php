<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Main Start -->
<main class="main-wrap setting-page mb-xxl">
    <div class="user-panel">
    <div class="media">
        <div class="avatar-wrap">
        <a href="javascript:void(0)"> <img src="<?php echo get_user_image(); ?>" alt="<?php echo get_user_name(); ?>"></a>
        </div>
        <div class="media-body">
        <h2 class="title-color"><?php echo get_user_name(); ?></h2>
      <!--  <span class="content-color font-md">Batas Kredit : <?php echo get_user_max_credit(); ?></span> -->
        </div>
    </div>
    </div>

    <!-- Form Section Start -->
    <?php echo form_open_multipart('customer/profile/edit_name', 'class="custom-form"'); ?>
    <div class="input-box">
        <i data-feather="at-sign"></i>
        <input class="form-control" type="text" id="inputName" name="name" value="<?php echo set_value('name', $user->name); ?>">
    </div>
    <div class="input-box">
        <i class="iconly-Call icli"></i>
        <input class="form-control" type="text" id="inputHP" name="phone_number" value="<?php echo set_value('name', $user->phone_number); ?>">
    </div>
    <div class="input-box">
        <i data-feather="at-sign"></i>
        <input class="form-control" type="email" id="inputEmail" value="<?php echo set_value('name', $user->email); ?>" disabled>
    </div>
    <div class="input-box">
        <div class="title mb-2"><i class="lni lni-map-marker"></i><span class="badge bg-danger">Alamat Rumah</span></div>
        <input class="form-control" type="text" id="inputAddr" name="address" value="<?php echo set_value('name', $user->address); ?>">
    </div>
    <div class="input-box">
        <div class="title mb-2"><i class="lni lni-map-marker"></i><span class="badge bg-danger">Nama Toko</span></div>
        <input class="form-control" type="text" id="inputAddr" name="shop_name" value="<?php echo set_value('name', $user->shop_name); ?>">
    </div>
    <div class="input-box">
        <div class="title mb-2"><i class="lni lni-map-marker"></i><span class="badge bg-danger">Alamat Toko / Alamat pengiriman</span></div>
        <input class="form-control" type="text" id="inputAddr" name="shop_address" value="<?php echo set_value('name', $user->shop_address); ?>">
    </div>
    <div class="input-box">
        <div class="title mb-2"><i class="lni lni-user"></i><span>Foto Profil</span></div>
        <input type="file" class="form-control" id="inputFoto" name="file">
    </div>
    <button class="btn btn-success w-100" type="submit">Simpan Perubahan</button>
    <?php if ($flash) : ?>
        <p class="text-center text-success"><?php echo $flash; ?></p>
    <?php endif; ?>
    </form>
    <!-- Form Section End -->
</main>
<!-- Main End -->
