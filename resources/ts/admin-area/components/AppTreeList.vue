<template lang="pug">
.tree
    ul(ref='ul')
        li(v-for="item in list")
            a(href='' @click.prevent="toggle")
                img(src='/img/admin-area/icons/minus.svg' alt='Свернуть')
            span.move
                img(src='/img/admin-area/icons/move.svg' alt='Переместить')
            router-link.link(:to="'/page/' + item.id") {{ item.title }}
            a.del(href='' @click.prevent="del")
                img(src='/img/admin-area/icons/del.svg' alt='Удалить')
            a.add(href='' @click.prevent="add")
                img(src='/img/admin-area/icons/add.svg' alt='Добавить дочернюю')

            app-tree-list(:list="item.children")
</template>

<script lang="ts">
import {
    defineComponent,
    reactive,
    ref,
    onMounted,
    onUnmounted
} from 'vue'
import Sortable from 'sortablejs'

const AppTreeList = defineComponent({
    props: {
        list: Array,
    },

    setup() {
        const ul = ref()
        let sortable = reactive({})
        onMounted(() => {
            sortable = new Sortable(ul.value as HTMLElement, {
                group: 'tree',
                animation: 150,
                fallbackOnBody: true,
                swapThreshold: 0.65,
                handle: '.move',
            })
        })

        onUnmounted(() => {
            (sortable as any).destroy()
        })

        const toggle = () => {
            console.info('toggle')
        }
        const del = () => {
            confirm('Удалить?')
        }
        const add = () => {
            confirm('Добавить?')
        }

        return {
            ul,
            sortable,
            toggle,
            del,
            add,
        }

    },
})

export default AppTreeList
</script>

<style lang="sass" scoped>
.tree
    ul > li
        list-style-type: none
        a, span
            margin-right: .3rem
        span.move
            cursor: move

</style>
