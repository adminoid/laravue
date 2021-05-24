import axios from 'axios'
export default {
    async getTree({ commit }: { commit: Function }) {
        const response = await axios.get('/api/pages/')
        commit('setTree', response.data)
    },

    async move({commit}: {commit: Function}, payload: {
        id: number,
        index: number,
        parent: number
    }) {
        // id, index, parent
        return await axios.post('/api/pages/move/',
            payload,
        )
    }
}
