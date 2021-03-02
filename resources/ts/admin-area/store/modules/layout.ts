export default {
    namespaced: true,

    state: () => ({
        sidebarOpen: true,
    }),

    mutations: {
        toggleSidebarStatus (state: { sidebarOpen: boolean }) {
            state.sidebarOpen = !state.sidebarOpen
        },
    },
}
