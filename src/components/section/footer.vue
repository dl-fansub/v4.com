<template>
  <section class="linear-footer">
    <b-container>
      <div class="copyright px-1 pt-0">
        <div class="nav-bottom p-2">
          Copyright 2020, All rights reserved. DL-FS v{{ version }}
        </div>
      </div>
    </b-container>
  </section>
</template>
<script lang="ts" setup>
import { version } from "../../../package.json"
</script>

<style lang="scss" scoped>
.linear-footer {
  background-image: url("../../assets/header-bg/default.jpg");
  background-position: center bottom;
  background-repeat: no-repeat;

  .container {
    min-height: 60px;
  }

  .to-top {
    a {
      font-size: 0.95rem;
      font-weight: bold;
      line-height: 1.1rem;
      text-decoration: none;
      color: black;

      span.button {
        display: inline-block;
        width: 2.5em;
        height: 1em;
        border: none;
        background-color: #000;
        text-align: center;
      }

      &:hover {
        color: #0961af;

        span.button {
          background-color: #0961af;
        }
      }
    }
  }

  .copyright {
    > .nav-bottom {
      text-align: center;
      color: #bfbfbf;
      font-size: 0.7rem;
      border-radius: 0 0 6px 6px;
      box-shadow: 0 -2px 6px 0 #616161;
      background-color: #0f0f0f;
    }
  }
}
</style>
