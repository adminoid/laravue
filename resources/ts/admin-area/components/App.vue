<template lang="pug">

app-navbar

.container-fluid

</template>

<script lang="ts">
import AppNavbar from './AppNavbar.vue'

import { defineComponent } from 'vue'

export default defineComponent({
    name: "App",

    components: {
        AppNavbar
    },
})
</script>
