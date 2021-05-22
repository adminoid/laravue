<template lang="pug">
li
    a(href='' @click.prevent="toggle")
        img(:src="`/img/admin-area/icons/${icon}.svg`" alt='Свернуть')
    span.move
        img(src='/img/admin-area/icons/move.svg' alt='Переместить')
    router-link.link(:to="'/' + page.id") {{ page.name || page.title }}
    a.del(href='' @click.prevent="del")
        img(src='/img/admin-area/icons/del.svg' alt='Удалить')
    a.add(href='' @click.prevent="add")
        img(src='/img/admin-area/icons/add.svg' alt='Добавить дочернюю')

    app-tree-list(v-if="open" :list="page.children")
</template>

<script lang="ts">
import {
    defineComponent,
    computed,
    ref,
    defineAsyncComponent,
    PropType,
} from 'vue'

interface IItem {
    id: number
    _lft: number
    parent_id: number | null
    name?: string
    title: string
    folder: boolean
    children: object[]
}

const AppTreeListItem = defineComponent({
    components: {
        AppTreeList: defineAsyncComponent(() => import('./AppTreeList.vue') as any),
    },

    props: {
        page: {
            type: Object as PropType<IItem>
        },
    },

    setup(props: any) {

        let open = ref(false)
        const toggle = () => {
            open.value = !open.value
        }
        const del = () => {
            confirm('Удалить?')
        }
        const add = () => {
            confirm('Добавить?')
        }

        const icon = computed(() => {
            if (props.page.folder) {
                return (open.value) ? 'minus' : 'plus'
            }
            return 'empty'
        })

        return {
            toggle,
            del,
            add,
            icon,
            open,
        }

    },
})

export default AppTreeListItem
</script>

<style lang="sass" scoped>
.tree
    ul
        padding-left: 0.7rem
        > li
            padding: 0.3rem 0 0
            list-style-type: none
            a, span
                margin-right: .3rem
            span.move
                cursor: move

</style>
