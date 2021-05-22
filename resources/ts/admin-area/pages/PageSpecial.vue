<template lang="pug">

input-text(:value="page.name" :name="'name'")
input-text(:value="page.title" :name="'title'")

</template>

<script lang="ts">
import {defineComponent} from 'vue'
import InputText from 'a-cmp@/form/InputText.vue'

const PageSpecial = defineComponent({
    components: {
        InputText,
    },

    props: {
        page: Object,
    },

    setup() {
        return {}
    }
})

export default PageSpecial
</script>
