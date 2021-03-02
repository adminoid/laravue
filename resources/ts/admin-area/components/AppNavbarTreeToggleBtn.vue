<template lang="pug">
a.btn.btn-outline-success(@click="clickHandler")
    img(src='/img/admin-area/icons/folding.svg')
    img.toggle(:src="imageUrl")
</template>

<script lang="ts">

import { defineComponent } from 'vue'
import { createNamespacedHelpers } from 'vuex'
const { mapState, mapMutations } = createNamespacedHelpers('layout')


export default defineComponent({
    name: "AppNavbarTreeToggleBtn",

    computed: {
        imageUrl (): string {
            let imageName = this.sidebarOpen! ? 'minus' : 'plus'
            return `/img/admin-area/icons/${imageName}.svg`
        },

        ...mapState({
            sidebarOpen: state => state.sidebarOpen,
        }),

    },

    methods: {
        clickHandler (): void {
            this.toggleSidebarStatus()
            console.log(this.sidebarOpen)
        },

        ...mapMutations([
            'toggleSidebarStatus',
        ])

    },

    mounted() {
        console.log(this.sidebarOpen)
    }
})

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
