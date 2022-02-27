<template>
    <draggable class="todo-list" tag="ul" :options="{animation: 200}">
        <li v-for="item in items" :key="item.id">
            <span class="handle"><i class="fas fa-bars"></i></span>
            <span class="text">{{ item.name }}</span>
            <input type="hidden" name="sort[]" :value="item.id">
        </li>
    </draggable>
</template>

<script>
import draggable from 'vuedraggable';

export default {
    name: "DraggableListComponent",
    components: {
        draggable
    },
    props: ['items']
}
</script>

<style scoped>

</style>
