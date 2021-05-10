<template lang="pug">
app-tree-list(
    :list="tree"
)
</template>

<script lang="ts">
import {defineComponent, reactive} from 'vue'
import AppTreeList from "./AppTreeList.vue";

const AppTree = defineComponent({
    components: {AppTreeList},
    setup() {
        const tree = reactive([
            {
                id: 1,
                name: "task 1",
                children: [
                    {
                        id: 2,
                        name: "task 2",
                        children: []
                    }
                ]
            },
            {
                id: 3,
                name: "task 3",
                children: [
                    {
                        id: 4,
                        name: "task 4",
                        children: [
                            {
                                id: 6,
                                name: "task 6",
                                children: []
                            }
                        ]
                    }
                ]
            },
            {
                id: 5,
                name: "task 5",
            }
        ])

        return {
            tree,
        }
    },

})

export default AppTree
</script>
