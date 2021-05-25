<template lang="pug">

input-text(:value="page.name" :name="'name'")
input-text(:value="page.title" :name="'title'")
input-text(:value="page.slug" :name="'slug'")
textarea-editor(:value="page.pageable.standard_text" :name="'standard_text'")

</template>

<script lang="ts">
import {defineComponent, PropType} from 'vue'
import {IPage} from "./index";
import InputText from 'a-cmp@/form/InputText.vue'
import TextareaEditor from "../components/form/TextareaEditor.vue";

const PageStandard = defineComponent({
    components: {
        InputText,
        TextareaEditor,
    },

    props: {
        page: Object as PropType<IPage>,
    },

    setup() {
        return {}
    }
})

export default PageStandard
</script>
