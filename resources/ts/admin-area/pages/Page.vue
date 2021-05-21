<template lang="pug">
main
    .page(v-if="id")
        pre {{ page[id] }}
    h2(v-else) &lt;-- выберите страницу для редактирования
</template>

<script lang="ts">
import {computed, defineComponent, watchEffect} from 'vue'
import {useRoute} from "vue-router"
import {useStore} from "vuex";
const Page = defineComponent({
    setup() {
        const route = useRoute()
        const store = useStore()
        const id = computed(() => route.params.id)
        const getPage = () => store.dispatch('page/getPage', id.value)
        watchEffect(() => getPage())
        return {
            id,
            getPage,
            page: computed(() => store.state.page['pages']),
        }
    }
})
export default Page
</script>
