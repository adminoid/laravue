<template lang="pug">

app-navbar
.container-fluid
    .row
        app-sidebar(v-if="sidebarOpen")
        app-content

</template>

<script lang="ts">
import AppNavbar from './AppNavbar.vue'
import AppSidebar from './AppSidebar.vue'
import AppContent from './AppContent.vue'
import {computed, defineComponent} from 'vue'
import {useStore} from "vuex"

const App = defineComponent({
    setup() {
        const store = useStore()
        return {
            sidebarOpen: computed(_ => store.state.layout.sidebarOpen)
        }
    },

    components: {
        AppContent,
        AppNavbar,
        AppSidebar,
    },
})

export default App
</script>
