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
    computed,
    toRef,
} from 'vue'
import Sortable from 'sortablejs'
import {useStore} from "vuex";

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

    setup(props) {
        const ul = ref()
        let sortable = reactive({})

        const store = useStore()
        const tree = computed(() => store.state.tree['tree'])
        onMounted(() => {
            sortable = new Sortable(ul.value as HTMLElement, {
                group: 'tree',
                animation: 100,
                fallbackOnBody: true,
                handle: '.move',
                onEnd: function (e) {
                    const items = ref(props.list).value,
                        oldContainerId = e.from.getAttribute('data-parent'),
                        newContainerId = e.to.getAttribute('data-parent'),
                        //@ts-ignore
                        id = items[e.oldIndex].id,
                        oldIndex = e.oldIndex,
                        newIndex = e.newIndex

                    console.log('ocid:' + oldContainerId)
                    console.log('ncid:' + newContainerId)
                    console.log('oi:' + oldIndex)
                    console.log('ni:' + newIndex)
                    console.log('id:' + id)
                },
            })
        })

        onUnmounted(() => {
            (sortable as any).destroy()
        })

        return {
            ul,
            sortable,
            tree,
        }

    },
})

export default AppTreeList
</script>

<style lang="sass" scoped>
ul
    padding-left: 0.7rem
    min-height: 3px
</style>
