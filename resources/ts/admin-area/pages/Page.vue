<template lang="pug">
main
    .page(v-if="id")
        component(v-if="componentName" :is="componentName")
    h2(v-else) &lt;-- выберите страницу для редактирования
</template>

<script lang="ts">
import {
    computed,
    defineComponent,
    watchEffect,
    ComputedRef,
    defineAsyncComponent,
} from 'vue'
import {useRoute} from "vue-router"
import {useStore} from "vuex";

interface IPage {
    page_type: {
        model: string
    }
}

const Page = defineComponent({
    components: {
        PageStandard: defineAsyncComponent(() => import('./PageStandard.vue') as any),
        PageSpecial: defineAsyncComponent(() => import('./PageSpecial.vue') as any),
    },

    setup() {
        const route = useRoute()
        const store = useStore()
        const id: any = computed(() => route.params.id)
        const getPage = () => store.dispatch('page/getPage', id.value)
        watchEffect(() => getPage())

        const page = computed(() => store.state.page['pages'])
        const componentName = computed(() => {
            const pageData : IPage = page.value[id.value]
            return (pageData) ? pageData.page_type.model : false
        })

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
