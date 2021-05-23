<template lang="pug">
ul(ref='ul')
    app-tree-list-item(v-for="page in list" :page="page" v-if="open")
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
        open: {
            type: Boolean,
            default: true,
        },
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
ul
    min-height: 3px
    padding-left: 0.7rem
</style>
