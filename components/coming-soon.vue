<template>
  <b-row class="pl-2">
    <b-col>
      <header class="title">
        <span v-if="develop === 1" class="font-thai">
          <h2><strong>อยู่ระหว่างพัฒนา!</strong></h2>
          <h3>กำลังทำอยู่ ไม่รู้จะเสร็จเมื่อไหร่!</h3>
        </span>
        <span v-else class="font-thai">
          <h2><strong>เร็วๆ นี้</strong></h2>
          <h3>คุณพร้อมหรือยัง?</h3>
        </span>
      </header>
      <div class="desc">
        <span class="font-thai"><p>หรืออยากมีส่วนร่วมในการพัฒนาระบบนี้? คุณเองก็สามารถมีส่วนร่วมกับเราในโปรเจคนี้ได้เช่นกัน!</p></span>
      </div>
      <div>
        <b-button :href="$store.state.inviteDiscord" target="_blank" class="font-thai">
          <fa :icon="['fab','discord']" /> เข้าร่วมกับเราที่ discord.
        </b-button>
      </div>
    </b-col>
  </b-row>
</template>
<script>
export default {
  props: {
    develop: {
      type: Number,
      default: 1
    }
  }
}
</script>

<style lang="scss" scoped>
.title {
  h2 {
    font-size: 5rem;
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
  line-height: 0.7rem;
}
</style>
