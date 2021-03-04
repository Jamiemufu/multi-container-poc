<template>
  <v-row>
    <v-col class="text-center">
      <img
        src="/v.png"
        alt="Vuetify.js"
        class="mb-5"
      >
      <blockquote class="blockquote">
        {{ homepage }}
      </blockquote>
    </v-col>
  </v-row>
</template>

<script>
import Logo from '~/components/Logo.vue'
import VuetifyLogo from '~/components/VuetifyLogo.vue'
import axios from "axios";

export default {
  components: {
    Logo,
    VuetifyLogo,
  },
  data() {
    return {
      homepage: ''
    }
  },
  async asyncData({ $axios }) {
    const homepage = await $axios.$get('/api/homepages')
    return { homepage }
  }
}
</script>
