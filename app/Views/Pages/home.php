<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<h1 class="title mt-3">Favorite place to read comic</h1>
<p class="subtitle">
  Welcome to our immersive world where stories unfold beyond words and leap
  off the pages <br />Enter the realm of visual narratives
</p>

<div class="btn_genre mt-5">
  <ul>
    <li class="btn_genre_default">New</li>
    <li>Hot</li>
    <li>Action</li>
    <li>Romance</li>
    <li>Fantasy</li>
    <li>School</li>
    <li><i class="bi bi-sliders"></i></li>
  </ul>
</div>

<div class="container_comic">
  <div class="comic_card">
    <div class="comic_img">
      <div class="icon">
        <i class="bi bi-heart fav_icon"></i>
      </div>
      <img src="/img/demon-slayer.jpg" alt="" />
      <div class="icon_second">
        <p class="icon_category mb-0">New</p>
      </div>
    </div>
    <div class="comic_content">
      <h3 class="comic_title">Demon Slayer Kimetsu no Yaiba <i class="bi bi-star-fill small_icon"></i>
        <p class="rating">4.8</p>
      </h3>
      <h4 class="chapter">Chapter 43</h4>
      <div class="btn_genre_card">
        <ul>
          <li>Action</li>
          <li>Isekai</li>
          <li>Fantasy</li>
        </ul>
      </div>
      <h3 class="comic_author">By Koyoharu Gotouge</h3>
    </div>
  </div>

  <div class="comic_card">
    <div class="comic_img">
      <div class="icon">
        <i class="bi bi-heart fav_icon"></i>
      </div>
      <img src="/img/gintama-comic.jpg" alt="" />
      <div class="icon_second">
        <p class="icon_category mb-0">New</p>
      </div>
    </div>
    <div class="comic_content">
      <h3 class="comic_title">Gintama <i class="bi bi-star-fill small_icon"></i>
        <p class="rating">4.8</p>
      </h3>
      <h4 class="chapter">Chapter 168</h4>
      <div class="btn_genre_card">
        <ul>
          <li>Action</li>
          <li>Comedy</li>
          <li>Fantasy</li>
        </ul>
      </div>
      <h3 class="comic_author">By Hideaki Sorachi</h3>
    </div>
  </div>

  <div class="comic_card">
    <div class="comic_img">
      <div class="icon">
        <i class="bi bi-heart fav_icon"></i>
      </div>
      <img src="/img/staticImg/crayon-shincan.webp" alt="" />
      <div class="icon_second">
        <p class="icon_category mb-0">New</p>
      </div>
    </div>
    <div class="comic_content">
      <h3 class="comic_title">Crayon Shincan <i class="bi bi-star-fill small_icon"></i>
        <p class="rating">4.8</p>
      </h3>
      <h4 class="chapter">Chapter 73</h4>
      <div class="btn_genre_card">
        <ul>
          <li>Comedy</li>
          <li>Family</li>
        </ul>
      </div>
      <h3 class="comic_author">By Yoshito Usui</h3>
    </div>
  </div>

  <div class="comic_card">
    <div class="comic_img">
      <div class="icon">
        <i class="bi bi-heart fav_icon"></i>
      </div>
      <img src="/img/staticImg/tate-no-yuusha.jpg" alt="" />
      <div class="icon_second">
        <p class="icon_category mb-0">New</p>
      </div>
    </div>
    <div class="comic_content">
      <h3 class="comic_title">Tate no yuusha <i class="bi bi-star-fill small_icon"></i>
        <p class="rating">4.8</p>
      </h3>
      <h4 class="chapter">Chapter 94</h4>
      <div class="btn_genre_card">
        <ul>
          <li>Action</li>
          <li>Isekai</li>
          <li>Fantasy</li>
        </ul>
      </div>
      <h3 class="comic_author">By Aneko Yusagi</h3>
    </div>
  </div>
</div>

<div id="carouselExampleDark" class="carousel slide mt-5">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" class="active"></button>
    <button type="button" data-bs-target="#carouselExampleDark" class="inactive"></button>
    <button type="button" data-bs-target="#carouselExampleDark" class="inactive"></button>
  </div>
</div>

<?= $this->endSection(); ?>