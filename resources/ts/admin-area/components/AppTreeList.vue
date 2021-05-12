<template lang="pug">
ul(ref='ul')
    li(v-for="item in list") {{ item.title }}
        app-tree-list(:list="item.children")
</template>

<script lang="ts">
import {
    defineComponent,
    reactive,
    ref,
    onMounted,
    onUnmounted
} from 'vue'
import Sortable from 'sortablejs'

const AppTreeList = defineComponent({
    props: {
        list: Array,
    },

    setup() {
        const ul = ref()
        let sortable = reactive({})
        onMounted(() => {
            sortable = new Sortable(ul.value as HTMLElement, {
                group: 'tree',
                animation: 150,
                fallbackOnBody: true,
                swapThreshold: 0.65,
            })
        })

        onUnmounted(() => {
            (sortable as any).destroy()
        })

        return {
            ul,
            sortable,
        }

    },
})

export default AppTreeList
</script>
