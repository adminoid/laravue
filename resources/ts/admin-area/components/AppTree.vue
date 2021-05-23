<template lang="pug">
.tree-wrapper
    pre {{ tree }}
    app-tree-list(
        :list="tree"
        data-parent="root"
    )
</template>

<script lang="ts">
import {defineComponent, onMounted, computed} from 'vue'
import AppTreeList from "./AppTreeList.vue"
import {useStore} from "vuex";

const AppTree = defineComponent({
    components: {AppTreeList},
    setup() {
        const store = useStore()
        const getTree = () => store.dispatch('tree/getTree')
        onMounted(() => {
            getTree()
        })
        return {
            getTree,
            tree: computed(() => store.state.tree['tree']),
        }
    },
})

export default AppTree
</script>

<style lang="sass">
.tree-wrapper
    padding-top: 0.5rem
</style>
