export default {
    getTasks() {
        return this.$axios.$get('tasks');
    },
    addTask(_ctx, data) {
        return this.$axios.$post('task', data) 
    },
    updateTask(_ctx, {id, data}) {
        return this.$axios.$patch(`task/${id}`, data)
    },
    updateTaskOrderCategory(_ctx, {id, data} ) {
        const { category, order } = data;
        return this.$axios.$post(`task-order/${id}`, {
            category,
            order
        })

    }
}