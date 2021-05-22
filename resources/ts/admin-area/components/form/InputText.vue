<template lang="pug">
.mt-3.row
    label.col-2.col-sm-3.col-form-label(:for="name + '-field'") {{ name }}
    .col-10.col-sm-9
        input.form-control(
            type='text'
            :value="value"
            :id="name + '-field'"
        )
</template>

<script lang="ts">
import {defineComponent} from 'vue'

const InputText = defineComponent({
    props: {
        value: String,
        name: String,
    },

    setup() {
        return {}
    }
})

export default InputText
</script>
