<template lang="pug">
ul
    li(v-for="item in list") {{ item.name }}
        app-tree-list(
            v-if="item.hasOwnProperty('children')"
            :list="item.children"
        )
</template>

<script lang="ts">
import {defineComponent} from 'vue'

const AppTreeList = defineComponent({
    props: {
        list: Array,
    },
})

export default AppTreeList
</script>
