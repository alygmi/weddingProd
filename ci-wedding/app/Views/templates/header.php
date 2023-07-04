<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="robots" content="index, follow" />

  <?php if ($product) { ?>
    <meta name="description" content="<?= strip_tags(substr($product['description'], 0, 150)); ?>" />

    <meta property="og:type" content="product" />
    <meta property="og:title" content="<?= $product['title']; ?>" />
    <meta property="og:description" content="<?= strip_tags(substr($product['description'], 0, 150)); ?>" />
    <meta property="og:site_name" content="<?= $product['title']; ?>" />
    <meta property="og:image" content="<?= $product['ex_img'] == 1 ? $product['img'] : base_url() . 'assets/images/product/' . $product['img']; ?>" />
    <meta property="og:image:secure_url" content="<?= $product['ex_img'] == 1 ? $product['img'] : base_url() . 'assets/images/product/' . $product['img']; ?>" />

    <meta property="article:published_time" content="<?= $product['date_submit']; ?>" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="<?= $product['title']; ?>" />
    <meta name="twitter:description" content="<?= strip_tags(substr($product['description'], 0, 150)); ?>" />
    <meta name="twitter:image" content="<?= $product['ex_img'] == 1 ? $product['img'] : base_url() . 'assets/images/product/' . $product['img']; ?>" />
  <?php } else if ($page) { ?>
    <meta name="description" content="<?= strip_tags(substr($page['content'], 0, 150)); ?>" />

    <meta property="og:type" content="page" />
    <meta property="og:title" content="<?= $page['title']; ?>" />
    <meta property="og:description" content="<?= strip_tags(substr($page['content'], 0, 150)); ?>" />
    <meta property="og:site_name" content="<?= $page['title']; ?>" />
    <meta property="og:image" content="<?= base_url(); ?>assets/images/logo/<?= $this->Settings_model->general()['favicon']; ?>" />
    <meta property="og:image:secure_url" content="<?= base_url(); ?>assets/images/logo/<?= $this->Settings_model->general()['favicon']; ?>" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="<?= $page['title']; ?>" />
    <meta name="twitter:description" content="<?= strip_tags(substr($page['content'], 0, 150)); ?>" />
    <meta name="twitter:image" content="<?= base_url(); ?>assets/images/logo/<?= $this->Settings_model->general()['favicon']; ?>" />
  <?php } else if ($undangan && $invoice) { ?>
    <meta name="description" content="<?= $this->Settings_model->getSetting()['short_desc']; ?>" />

    <meta property="og:type" content="website" />
    <meta property="og:title" content="Undangan Pernikahan <?= $undangan['call_nama_pria'] . ' & ' . $undangan['call_nama_wanita'] ?>" />
    <meta property="og:description" content="Kami mengundang di acara pernikahan kami" />
    <meta property="og:url" content="<?= base_url() . $invoice['domain'] ?>" />
    <meta property="og:site_name" content="Undangan Pernikahan <?= $undangan['call_nama_pria'] . ' & ' . $undangan['call_nama_wanita'] ?>" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Undangan Pernikahan <?= $undangan['call_nama_pria'] . ' & ' . $undangan['call_nama_wanita'] ?>" />
    <meta name="twitter:description" content="<?= $this->Settings_model->getSetting()['short_desc']; ?>" />

    <?php if ($undangan['thumbnail_image']) { ?>
      <meta property="og:image" content="<?= base_url(); ?>assets/images/mempelai/<?= $undangan['thumbnail_image']; ?>" />
      <meta property="og:image:secure_url" content="<?= base_url(); ?>assets/images/mempelai/<?= $undangan['thumbnail_image']; ?>" />
      <meta name="twitter:image" content="<?= base_url(); ?>assets/images/mempelai/<?= $undangan['thumbnail_image']; ?>" />
    <?php } else { ?>
      <meta property="og:image" content="<?= base_url(); ?>assets/images/logo/<?= $this->Settings_model->general()['favicon']; ?>" />
      <meta property="og:image:secure_url" content="<?= base_url(); ?>assets/images/logo/<?= $this->Settings_model->general()['favicon']; ?>" />
      <meta name="twitter:image" content="<?= base_url(); ?>assets/images/logo/<?= $this->Settings_model->general()['favicon']; ?>" />
    <?php } ?>
  <?php } else { ?>
    <meta name="description" content="<?= $this->Settings_model->getSetting()['short_desc']; ?>" />

    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?= $this->Settings_model->general()['app_name']; ?>" />
    <meta property="og:description" content="<?= $this->Settings_model->getSetting()['short_desc']; ?>" />
    <meta property="og:url" content="<?= base_url(); ?>" />
    <meta property="og:site_name" content="<?= $this->Settings_model->general()['app_name']; ?>" />
    <meta property="og:image" content="<?= base_url(); ?>assets/images/logo/<?= $this->Settings_model->general()['favicon']; ?>" />
    <meta property="og:image:secure_url" content="<?= base_url(); ?>assets/images/logo/<?= $this->Settings_model->general()['favicon']; ?>" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="<?= $this->Settings_model->general()['app_name']; ?>" />
    <meta name="twitter:description" content="<?= $this->Settings_model->getSetting()['short_desc']; ?>" />
    <meta name="twitter:image" content="<?= base_url(); ?>assets/images/logo/<?= $this->Settings_model->general()['favicon']; ?>" />
  <?php } ?>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <?php $gaId = $this->Settings_model->getSetting()['ga_id']; ?>
  <script async src="https://www.googletagmanager.com/gtag/js?id=<?= $gaId; ?>"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', '<?= $gaId; ?>');
  </script>

  <?php $googleSearchConsole = str_replace("&lt;", "<", $this->Settings_model->getSetting()['gs_console']);
  $googleSearchConsole = str_replace("&gt;", ">", $googleSearchConsole); ?>
  <?= $googleSearchConsole; ?>

  <!-- Facebook Pixel Code -->
  <?php $fbPixel = $this->Settings_model->getSetting()['id_pixel']; ?>
  <script>
    ! function(f, b, e, v, n, t, s) {
      if (f.fbq) return;
      n = f.fbq = function() {
        n.callMethod ?
          n.callMethod.apply(n, arguments) : n.queue.push(arguments)
      };
      if (!f._fbq) f._fbq = n;
      n.push = n;
      n.loaded = !0;
      n.version = '2.0';
      n.queue = [];
      t = b.createElement(e);
      t.async = !0;
      t.src = v;
      s = b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
      'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '<?= $fbPixel ?>');
    fbq('track', 'PageView');
  </script>
  <!-- End Facebook Pixel Code -->

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/fonts.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/app.css?v=1">
  <link rel="stylesheet" type="text/css" href="<?= base_url();  ?>assets/css/app-responsive.css?v=1">
  <link rel="stylesheet" type="text/css" href="<?= base_url();  ?>assets/css/<?= $css;  ?>.css?v=1">
  <?php if ($responsive){ ?>
    <link rel="stylesheet" type="text/css" href="<?= base_url();  ?>assets/css/<?= $responsive; ?>.css?v=1">
  <?php } ?>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/starrr/dist/starrr.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap-datepicker3.min.css">

  <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/logo/<?= $this->Settings_model->general()['favicon']; ?>" type="image/x-icon" />

  <script src="https://kit.fontawesome.com/2baad1d54e.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="<?= base_url();  ?>assets/icofont/icofont.min.css">

  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/animate.css" />

  <?php $btncolor = $this->Settings_model->general()['btncolor']; ?>

  <style>
    .button-bottom-modal-cart-global button {
      border: 1px solid <?= $btncolor ?>;
      color: <?= $btncolor; ?>;
    }

    .button-bottom-modal-cart-global a button {
      background-color: <?= $btncolor; ?>
    }

    .button-bottom-modal-cart-global a button:hover {
      border: 1px solid #454545;
      background-color: #454545;
    }

    .button-bottom-modal-cart-global button:hover {
      border: 1px solid <?= $btncolor; ?>;
      color: #ffffff;
      background-color: <?= $btncolor; ?>;
    }
  </style>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

  <link rel="stylesheet" href="<?= base_url(); ?>assets/select2-4.0.6-rc.1/dist/css/select2.min.css">

  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/lightbox.css">

  <title><?= $title ?></title>

</head>

<body>

  <?php function getThumbnail($url)
  {
    preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $matches);
    return "https://img.youtube.com/vi/$matches[0]/0.jpg";
  } ?>

  <!-- model cart -->
  <div class="modal fade" id="modalCart" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Keranjang Belanja</h5>
          <button onclick="location.reload(true)" type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="modalCartBodyShow">
          <?php if ($this->cart->total_items() > 0) { ?>
            <?php foreach ($this->cart->contents() as $item) : ?>
              <div class="item-cart" id="modalCartBodyListItem-<?= $item['rowid']; ?>">
                <img src="<?= $item['img']; ?>" alt="img product" class="thumb-img">
                <div class="text">
                  <h4 class="product-name"><?= $item['name']; ?></h4>
                  <p class="information mb-0"><?= $item['variant'] ?></p>
                  <h5 class="price" id="modalCartPriceProduct-<?= $item['rowid']; ?>">Rp. <?= number_format($item['subtotal'], 0, ",", "."); ?></h5>
                </div>
                <div class="option">
                  <div></div>
                  <div class="qty">
                    <?php $productt = $this->Products_model->getProductBySlug($item['slug']); ?>
                    <button style="border-top-left-radius: 6px;border-bottom-left-radius: 6px;" onclick="minusProductCart('<?= $item['rowid']; ?>')">-</button>
                    <input disabled type="text" value="<?= $item['qty']; ?>" id="qtyProductCart-<?= $item['rowid']; ?>" class="valueJmlQty">
                    <button style="border-top-right-radius: 6px;border-bottom-right-radius: 6px;" onclick="plusProductCart('<?= $item['rowid']; ?>')">+</button>
                  </div>
                </div>
                <i class="fa fa-trash text-danger" onclick="deleteCartByRowid('<?= $item['rowid']; ?>')"></i>
              </div>
            <?php endforeach; ?>
            <div class="button-bottom-modal-cart-global">
              <button type="button" class="shopping-again" data-dismiss="modal" onclick="location.reload(true)">BELANJA LAGI</button>
              <a href="<?= base_url(); ?>checkout" class="checkout"><button>LANJUT CHECKOUT</button></a>
            </div>
          <?php } else { ?>
            <div class="alert alert-warning">Keranjang masih kosong, yuk belanja dulu.</div>
            <div class="button-bottom-modal-cart-global">
              <button type="button" class="shopping-again" data-dismiss="modal">BELANJA DULU</button>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>