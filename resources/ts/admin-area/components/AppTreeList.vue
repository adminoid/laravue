<template lang="pug">
.tree
    ul(ref='ul')
        app-tree-list-item(v-for="item in list" :item="item")
</template>

<script lang="ts">
import {
    defineComponent,
    defineAsyncComponent,
    reactive,
    ref,
    onMounted,
    onUnmounted,
} from 'vue'
import Sortable from 'sortablejs'

const AppTreeList = defineComponent({
    name: 'AppTreeList',

    components: {
        AppTreeListItem: defineAsyncComponent(() => import('./AppTreeListItem.vue') as any),
    },

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
                handle: '.move',
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

<style lang="sass" scoped>
.tree
    ul
        padding-left: 0.7rem
        > li
            padding: 0.3rem 0 0
            list-style-type: none
            a, span
                margin-right: .3rem
            span.move
                cursor: move

</style>
