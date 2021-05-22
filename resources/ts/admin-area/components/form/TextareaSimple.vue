<template lang="pug">
.mt-3.row

label.form-label(:for="name + '-field'") {{ name }}
textarea.form-control(
    rows="3"
    :id="name + '-field'"
) {{ value }}

</template>

<script lang="ts">
import {defineComponent} from 'vue'

const TextareaSimple = defineComponent({
    props: {
        value: String,
        name: String,
    },

    setup() {
        return {}
    }
})

export default TextareaSimple
</script>
