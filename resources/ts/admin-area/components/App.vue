<template lang="pug">

app-navbar
.container-fluid
    .row
        app-sidebar
        app-content

</template>

<script lang="ts">
import AppNavbar from './AppNavbar.vue'
import AppSidebar from './AppSidebar.vue'

import { defineComponent } from 'vue'
import AppContent from "./AppContent.vue";

export default defineComponent({
    name: "App",

    components: {
        AppContent,
        AppNavbar,
        AppSidebar,
    },
})
</script>
