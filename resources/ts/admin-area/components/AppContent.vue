<template lang="pug">
div(:class="containerClass")
    main
        h1 Content
</template>

<script lang="ts">
import {computed, defineComponent} from 'vue'
import {useStore} from "vuex"

const AppContent = defineComponent({
    setup() {
        const store = useStore()
        const containerClass = computed(
            _ =>
                (store.state.layout.sidebarOpen) ?
                    'col-8' : 'col-12'
        )
        return {
            containerClass,
        }
    }
})

export default AppContent
</script>
