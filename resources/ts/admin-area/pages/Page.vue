<template lang="pug">
main
    .page(v-if="id && page")
        h1 {{ page.title }}
        component(v-if="componentName" :is="componentName" :page="page")
    h2(v-else) Загрузка...
</template>

<script lang="ts">
import {
    computed,
    defineComponent,
    watchEffect,
    defineAsyncComponent,
} from 'vue'
import {useRoute} from "vue-router"
import {useStore} from "vuex";

// todo: add error handler

interface IPage {
    page_type: {
        model: string
    }
    title: string
}

const Page = defineComponent({
    components: {
        PageStandard: defineAsyncComponent(() => import('./PageStandard.vue') as any),
        PageSpecial: defineAsyncComponent(() => import('./PageSpecial.vue') as any),
    },

    setup() {
        const route = useRoute(),
            store = useStore(),
            id: any = computed(() => route.params.id),
            getPage = () => store.dispatch('page/getPage', id.value),
            page = computed((): IPage => {
                return store.state.page['pages'][id.value]
            }),
            componentName = computed(() => {
                return (page.value) ? page.value.page_type.model : false
            })

        watchEffect(() => getPage())

        return {
            id,
            getPage,
            page,
            componentName,
        }
    }
})
export default Page
</script>
