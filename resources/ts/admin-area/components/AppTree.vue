<template lang="pug">
.tree-wrapper(v-if="enabled")
    app-tree-list(
        :list="tree"
        data-parent="root"
    )
</template>

<script lang="ts">
import {
    defineComponent,
    onMounted,
    computed,
    watch,
    nextTick
} from 'vue'
import AppTreeList from "./AppTreeList.vue"
import {useStore} from "vuex";

const AppTree = defineComponent({
    components: {AppTreeList},
    setup() {
        const store = useStore()
        const getTree = () => store.dispatch('tree/getTree')

        const enabled = computed(() => store.state.tree['enabled']),
            setEnabled = (value: boolean) => store.commit('tree/setEnabled', value)

        watch(enabled, () => {
            // console.info(enabled.value)
            nextTick(() => {
                setEnabled(true)
            })
        })

        onMounted(() => {
            getTree()
        })
        return {
            getTree,
            tree: computed(() => store.state.tree['tree']),
            enabled,
        }
    },
})

export default AppTree
</script>

<style lang="sass">
.tree-wrapper
    padding-top: 0.5rem
</style>
