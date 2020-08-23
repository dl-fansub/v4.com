<template>
  <b-row class="pl-2">
    <b-col>
      <header class="title">
        <span class="anim-wrapper"><h2><strong>Coming soon</strong></h2></span>
        <span class="anim-wrapper"><h3>Are you ready?</h3></span>
      </header>
      <div class="desc">
        <span class="anim-wrapper"><p>Would you like to be involved in system development or not? You too can get involved with us as well.</p></span>
      </div>
      <div>
        <b-button href="https://discord.gg/X8V32w" target="_blank">
          <fa :icon="['fab','discord']" /> join us with discord.
        </b-button>
      </div>
    </b-col>
  </b-row>
</template>

<style lang="scss" scoped>
.title {
  h2 {
    font-size: 4rem;
    margin-bottom: 8px;
  }

  h3 {
    font-size: 2rem;
    margin-bottom: 0.25em;
  }
}

.btn {
  color: white;
  background: #7289da;
  border-color: #7289da;
}
</style>
