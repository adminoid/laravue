<template lang="pug">
div(:class="containerClass")
    .container-fluid.content-container
        router-view
</template>

<script lang="ts">
import {computed, defineComponent, onMounted} from 'vue'
import {useStore} from "vuex"
import Page from 'a-ts@/pages/Page.vue'

const AppContent = defineComponent({
    setup() {
        const store = useStore()
        const containerClass = computed(
            _ =>
                (store.state.layout.sidebarOpen) ?
                    'col-xxl-9 col-xl-9 col-lg-8 col-md-7 col-sm-6' : 'col-12'
        )

        return {
            containerClass,
            tree: computed(() => store.state.tree['tree']),
        }
    },

    components: { Page }
})

export default AppContent
</script>
