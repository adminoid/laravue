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
} from "vue"
import Sortable from "sortablejs"
import {useStore} from "vuex"

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
        let sortable = reactive({})

        const ul = ref(),
            store = useStore(),
            move = (payload: {}) => store.dispatch('tree/move', payload),
            moveItem = (payload: {}) => store.commit('tree/moveItem', payload),
            setEnabled = (value: boolean) => store.commit('tree/setEnabled', value)

        onMounted(() => {
            sortable = new Sortable(ul.value as HTMLElement, {
                group: 'tree',
                animation: 100,
                fallbackOnBody: true,
                handle: '.move',
                onEnd: function (e) {
                    const items = ref(props.list).value,
                        oldParent = e.from.getAttribute('data-parent'),
                        parent = e.to.getAttribute('data-parent'),
                        //@ts-ignore
                        id = items[e.oldIndex].id,
                        oldIndex = e.oldIndex,
                        index = e.newIndex

                    move({id, index, parent})
                        .then(_ => {
                            // todo: set actual parent_id
                            moveItem({oldParent, oldIndex, parent, index})
                        })
                        .catch(_ => {
                            setEnabled(false)
                        })
                },
            })
        })

        onUnmounted(() => {
            (sortable as any).destroy()
        })

        return {
            ul,
            sortable,
            move,
            moveItem,
            setEnabled,
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
