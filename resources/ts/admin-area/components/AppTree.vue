<template lang="pug">
app-tree-list(
    :list="tree"
)
</template>

<script lang="ts">
import {defineComponent, reactive} from 'vue'
import AppTreeList from "./AppTreeList.vue"
import {useStore} from "vuex";

const AppTree = defineComponent({
    components: {AppTreeList},
    setup() {
        const store = useStore()

        // const tree = reactive()

        return {
            tree: store.state.tree['tree'],
        }
    },

})

export default AppTree
</script>
