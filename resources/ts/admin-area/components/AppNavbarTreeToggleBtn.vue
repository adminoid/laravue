<template lang="pug">
a.btn.btn-outline-success(@click="toggleSidebarStatus")
    img(src='/img/admin-area/icons/folding.svg')
    img.toggle(:src="imageUrl")
</template>

<script lang="ts">

import {defineComponent, computed} from 'vue'
import { useStore } from 'vuex'

const AppNavbarTreeToggleBtn = defineComponent({
    setup() {
        const store = useStore()

        const imageUrl = computed(() => {
            let imageName = store.state.layout['sidebarOpen'] ? 'minus' : 'plus'
            return `/img/admin-area/icons/${imageName}.svg`
        })

        return {
            imageUrl,
            toggleSidebarStatus: () => store.commit('layout/toggleSidebarStatus'),
        }
    },
})

export default AppNavbarTreeToggleBtn

</script>

<style lang="sass" scoped>

.btn-outline-success
    background-color: #fff
    border-color: #a5e3e2
    &:hover
        background-color: #9cfffa
.toggle
    margin-left: .4em

</style>
