<template lang="pug">
.col-xxl-3.col-xl-3.col-lg-4.col-md-5.col-sm-6
    .sidebar
        app-tree
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import AppTree from './AppTree'

export default defineComponent({
    name: "AppSidebar",

    components: {
        AppTree,
    },
})
</script>


