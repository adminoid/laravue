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
import {useStore} from "vuex";
import _ from 'lodash'

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
            // setTree = (payload: {}) => store.commit('tree/setTree', payload),
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

                    const backup = _.cloneDeep(store.state.tree.tree)
                    move({id, index, parent})
                        .then(res => {
                            console.warn(res)
                            // moveItem({oldParent, oldIndex, parent, index})
                        })
                        .catch(e => {

                            // [backup[0], backup[1]] = [backup[1], backup[0]]

                            // setTree(backup)
                            setEnabled(false)

                            console.log(e.message)
                            // restore tree
                            // moveItem({
                            //     oldParent: parent,
                            //     oldIndex: index,
                            //     parent: oldParent,
                            //     index: oldIndex,
                            // })



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
            // setTree,
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
