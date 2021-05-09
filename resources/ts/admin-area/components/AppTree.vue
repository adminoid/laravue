<template>
    <draggable
        class="dragArea"
        tag="ul"
        :list="tasks"
        :group="{ name: 'g1' }"
        item-key="name"
    >
        <template #item="{ element }">
            <li>
                <p>{{ element.name }}</p>
                <app-tree :tasks="element.tasks" />
            </li>
        </template>
    </draggable>
</template>

<script>
import draggable from 'vuedraggable'
import {defineComponent, reactive} from 'vue'

const AppTree = defineComponent({
    setup() {
        const tasks = reactive([
            {
                name: "task 1",
                tasks: [
                    {
                        name: "task 2",
                        tasks: []
                    }
                ]
            },
            {
                name: "task 3",
                tasks: [
                    {
                        name: "task 4",
                        tasks: []
                    }
                ]
            },
            {
                name: "task 5",
                tasks: []
            }
        ])

        return {
            tasks,
        }
    },

    components: {
        draggable
    },

})

export default AppTree
</script>

<style scoped>
.dragArea {
    min-height: 50px;
    outline: 1px dashed;
}
</style>
