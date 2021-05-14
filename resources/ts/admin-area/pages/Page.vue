<template lang="pug">
main
    h1 {{ $route.params.id }}

</template>

<script lang="ts">
import {defineComponent} from 'vue'

const Page = defineComponent({
    setup() {
        return {}
    }
})

export default Page
</script>
