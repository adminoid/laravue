<template lang="pug">
nav.navbar.navbar-dark.bg-light-blue
    .container-fluid
        ul.navbar-nav
            li.nav-item
                app-navbar-tree-toggle-btn
</template>

<script lang="ts">
import AppNavbarTreeToggleBtn from './AppNavbarTreeToggleBtn.vue'

export default {
    name: "AppNavbar",

    components: {
        AppNavbarTreeToggleBtn,
    }
}
</script>
