<template lang="pug">
.container
    .row.justify-content-center
        .col-md-12
            .card
                .card-header Admin
                .card-body {{ for_test }}
</template>

<script lang="ts">
export default {
    name: "App",

    data() {
        return {
            for_test: 'Vue and TDD'
        }
    },

    mounted() {
        console.log('Component mounted.')
    }
}
</script>
