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

        const store = useStore(),
            move = (payload: object) => store.dispatch('tree/move', payload)

        const tree = computed(() => store.state.tree['tree'])
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

                    move({id, index, parent, oldParent, oldIndex})
                        .then(res => console.info(res))
                        .catch(err => {
                            console.info(err)

                            

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
            tree,
            move,
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
