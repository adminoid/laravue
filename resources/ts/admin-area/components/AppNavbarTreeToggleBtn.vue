<template lang="pug">
    a.btn.btn-outline-success(@click="clickHandler")
        img(src='/img/admin-area/icons/folding.svg')
        img.toggle(:src="imageUrl")
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
    name: "AppNavbarTreeToggleBtn",

    data () {
        return {
            open: false
        }
    },

    computed: {
        imageUrl (): string {
            let imageName = this.open ? 'minus' : 'plus'
            return `/img/admin-area/icons/${imageName}.svg`
        }
    },

    methods: {
        clickHandler (): void {
            this.open = !this.open
        }
    },
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
