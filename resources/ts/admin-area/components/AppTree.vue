<template lang="pug">
app-tree-list(
    :list="tree"
)
</template>

<script lang="ts">
import {defineComponent, onMounted} from 'vue'
import AppTreeList from "./AppTreeList.vue"
import {useStore} from "vuex";

const AppTree = defineComponent({
    components: {AppTreeList},
    setup() {
        const getTree = () => store.dispatch('tree/getTree')

        onMounted(() => {
            getTree()
        })

        const store = useStore()
        return {
            tree: store.state.tree['tree'],
            getTree,
        }
    },
})

export default AppTree
</script>
