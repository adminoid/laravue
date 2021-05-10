<template lang="pug">
ul
    li(v-for="(item, i) in list" :ref="el => { if (el) elements[i] = el }") {{ item.name }}
        app-tree-list(:list="item.children")
</template>

<script lang="ts">
import {defineComponent, onMounted, reactive} from 'vue'
import Sortable from 'sortablejs'

const AppTreeList = defineComponent({
    props: {
        list: Array,
    },

    setup(props) {
        const elements = reactive([])
        onMounted(() => {
            const length = props.list?.length
            if (length) {
                for (let i = 0; i < length; i++) {
                    if (elements) {
                        new Sortable(elements[i], {
                            group: 'nested',
                            animation: 150,
                            fallbackOnBody: true,
                            swapThreshold: 0.65
                        })
                    }
                }
            }
        })

        return {
            elements,
        }

    },
})

export default AppTreeList
</script>
