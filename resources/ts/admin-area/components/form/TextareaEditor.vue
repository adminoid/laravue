<template lang="pug">
.field.mt-3
    label.form-label(:for="name + '-field'") {{ name }}
    textarea.form-control(
        ref='editor'
        rows="7"
       :id="name + '-field'"
    ) {{ value }}
</template>

<script lang="ts">
import {defineComponent, onMounted, ref} from 'vue'

const TextareaEditor = defineComponent({

    props: {
        value: String,
        name: String,
    },

    setup() {
        const editor = ref()
        onMounted(() => {
            console.log(editor.value)
        })

        return {
            editor,
        }
    }
})

export default TextareaEditor
</script>
