<template lang="pug">
.mb-3.row
    label.col-sm-2.col-form-label(for='name-field') Пункт меню
    .col-sm-10
        input#name-field.form-control-plaintext(type='text')
</template>

<script lang="ts">
import {defineComponent} from 'vue'

const PageStandard = defineComponent({
    props: {
        page: Object,
    },

    setup() {
        return {}
    }
})

export default PageStandard
</script>
