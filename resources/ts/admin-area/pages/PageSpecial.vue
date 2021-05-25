<template lang="pug">

input-text(:value="page.name" :name="'name'")
textarea-simple(:value="page.pageable.spacial_text" :name="'special_text'")
input-text(:value="page.title" :name="'title'")
input-text(:value="page.slug" :name="'slug'")

</template>

<script lang="ts">
import {defineComponent, PropType} from 'vue'
import {IPage} from "./index";
import InputText from 'a-cmp@/form/InputText.vue'
import TextareaSimple from 'a-cmp@/form/TextareaSimple.vue'

const PageSpecial = defineComponent({
    components: {
        InputText,
        TextareaSimple,
    },

    props: {
        page: {
            type: Object as PropType<IPage>,
        },
    },

    setup() {
        return {}
    }
})

export default PageSpecial
</script>
