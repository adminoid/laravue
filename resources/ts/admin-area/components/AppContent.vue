<template lang="pug">
div(:class="containerClass")
    .container-fluid.content-container
        pre {{ tree }}
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
                    'col-8 col-sm-7' : 'col-12'
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
