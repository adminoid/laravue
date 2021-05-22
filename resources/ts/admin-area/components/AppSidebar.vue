<template lang="pug">
.sidebar.col-3.col-sm-5
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


