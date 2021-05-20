<template lang="pug">
main
    h1(v-if="id") {{ id }}
    h2(v-else) &lt;-- выберите страницу для редактирования
</template>

<script lang="ts">
import {computed, defineComponent} from 'vue'
import {useRoute} from "vue-router"
const Page = defineComponent({
    setup() {
        const route = useRoute()
        return {
            id: computed(() => route.params.id),
        }
    }
})
export default Page
</script>
