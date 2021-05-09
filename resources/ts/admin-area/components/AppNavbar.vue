<template lang="pug">
nav.navbar.navbar-dark
    .container-fluid
        ul.navbar-nav
            li.nav-item
                app-navbar-tree-toggle-btn
</template>

<script lang="ts">
import AppNavbarTreeToggleBtn from './AppNavbarTreeToggleBtn.vue'
import { defineComponent } from 'vue'

export default defineComponent({
    name: "AppNavbar",

    components: {
        AppNavbarTreeToggleBtn,
    }
})
</script>
