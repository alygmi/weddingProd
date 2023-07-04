<?php include 'templates/star.php' ?>

<style>
    div.category-menu div.main-category div.item:hover {
    background-color: <?= $this->Settings_model->general()['btncolor'] ?>;
  }

  div.category-menu div.main-category div.item-active {
    background-color: <?= $this->Settings_model->general()['btncolor'] ?>;
  }
</style>

<?php if($banner_popup) { ?>
    <div class="modal fade" id="modalBannerPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <i class="fa fa-times" class="close" data-dismiss="modal" aria-label="Close"></i>
        <img class="rounded" style="width: 100%" onclick="window.location.href='<?= $banner_popup['url'] ?>'" src="<?= base_url(); ?>assets/images/banner/<?= $banner_popup['img'] ?>" alt="banner popup">
      </div>
    </div>
  </div>

<?php } ?>    
<div class="category-menu">
  <div class="main-category">
    <div class="item item-active item-category-menu-0" onclick="changeCategoryProductsActive('0')">
      <p class="mb-0">All</p>
    </div>
    <?php foreach ($categories->result_array() as $c) : ?>
      <div class="item item-category-menu-<?= $c['id']; ?>" onclick="changeCategoryProductsActive('<?= $c['id']; ?>')">
        <p class="mb-0"><?= $c['name']; ?></p>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<div class="product-wrapper best-product">
  <div class="main-product">
    <div id="bodyForShowProductHome">
      <?php foreach ($recent->result_array() as $p) : ?>
        <a href="<?= base_url(); ?>p/<?= $p['slug']; ?>">
          <div class="item-product">
            <img alt="<?= $p['title']; ?>" src="<?= $p['ex_img'] == 1 ? $p['img'] : base_url() . 'assets/images/product/' . $p['img']; ?>" class="card-img-top">
            <?php if ($p['label_status']) { ?>
              <p class="label-product" style="background-color: <?= $p['label_color']; ?>;">
                <?= $p['label_text']; ?>
              </p>
            <?php } ?>
            <div class="card-body">
              <?php if ($p['discount'] == 0) { ?>
                <p class="card-text line-3 mb-0"><?= $p['title']; ?></p>
                <p class="newPrice">Rp. <?= str_replace(",", ".", number_format($p['price'])); ?></p>
              <?php } else { ?>
                <p class="card-text mb-0"><?= $p['title']; ?></p>
                <p class="oldPrice mb-0">Rp. <span><?= str_replace(",", ".", number_format($p['price'])); ?></span> <small class="badge badge-danger"><?= $p['discount']; ?>%</small></p>
                <?php $diskonnya = ($p['price'] * $p['discount']) / 100 ?>
                <p class="newPrice">Rp. <?= str_replace(",", ".", number_format($p['price'] - $diskonnya)); ?></p>
              <?php } ?>
              <div class="stars-rating">
                <?php $starsRating = $this->Products_model->rowRatingByProduct($p['id']); ?>
                <?= rattingStars(round($starsRating, 1)) ?>
              </div>
            </div>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
    <div class="clearfix"></div>
  </div>
  <img src="<?= base_url(); ?>assets/images/icon/loading-v1.gif" alt="loading.." class="loading-animation-load-more">
  <?php $btncolor = $this->Settings_model->general()['btncolor']; ?>
  <button style="border: 2px solid <?= $btncolor; ?>; color: <?= $btncolor; ?>" class="more" id="btnClickLoadMoreProductHome">LIHAT SEMUA</button>
</div>

<?php if ($this->Settings_model->general()['social_proof_status'] == 1) { ?>
  <?php $noooo = 1;
  foreach ($invoice->result_array() as $in) : ?>
    <input type="hidden" id="numberOfInvoiceTotalHomePage" value="<?= $invoice->num_rows(); ?>">
    <div class="social-proof" id="socialProofId-<?= $noooo; ?>">
      <div class="main">
        <?php $product_buy = $this->db->get_where('product_order', ['invoice_id' => $in['id']])->row_array(); ?>
        <?php if ($product_buy['img'] != "") { ?>
          <img alt="<?= $product_buy['title']; ?>" src="<?= $product_buy['ex_img'] == 1 ? $product_buy['img'] : base_url() . 'assets/images/product/' . $product_buy['img']; ?>">
        <?php } ?>
        <div class="text">
          <p><span class="font-bold"><?= strlen($in['name']) > 15 ? substr($in['name'], 0, 15) . '..' : $in['name']; ?></span> membeli
          <p class="font-bold product_name"><?= $product_buy['title'] ?></p>
          </p>
          <span class="verified"><img src="<?= base_url(); ?>assets/images/icon/verified.png" alt="verified icon"> Verified by <span class="app_name"><?= $this->Settings_model->general()['app_name']; ?></span></span>
        </div>
      </div>
    </div>
  <?php $noooo++;
  endforeach; ?>
<?php } ?>