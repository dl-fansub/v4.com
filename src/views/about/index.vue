<template>
  <b-container>
    <b-row>
      <b-col xl="12" lg="12" md="12">
        <div id="animeCarousel" class="carousel carousel-dark slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
              <img src="/carousel/robin.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
              <img src="/carousel/nami.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="/carousel/noimage.png" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#animeCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#animeCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </b-col>
      <b-col xl="12" lg="12" md="12">
        <div id="mangaCarousel" class="carousel carousel-dark slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="/carousel/noimage.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="/carousel/noimage.png" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#mangaCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#mangaCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </b-col>
      <b-col>
        <div class="fb-page">
          <h6 class="border-bottom p-2 px-1">
            DL-Fansub FanPage
          </h6>
          <iframe
            src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FDL.Fansub%2F&width=280&layout=standard&action=like&size=large&share=true&height=35&appId=755065711974797"
            width="280"
            height="35"
            style="border: none; overflow: hidden;"
            scrolling="no"
            frameborder="0"
            allowTransparency="true"
            allow="encrypted-media"
          />
        </div>
        <div class="discord-page">
          <h6 class="border-bottom p-2 px-1">
            Join our communities
          </h6>
          <div class="text-center">
            <b-button href="#" target="_blank" class="mt-2" block>
              <fa :icon="['fab','discord']" /> Discord Community.
            </b-button>
          </div>
        </div>
      </b-col>
    </b-row>
  </b-container>
</template>

<script setup>

</script>
