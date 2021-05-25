export default {
    setPage(state: any, payload: {data: object, id: number}) {
        state.pages[payload.id] = payload.data
    },

    // deletePage(state: any, id: number) {
    //
    // }
}
