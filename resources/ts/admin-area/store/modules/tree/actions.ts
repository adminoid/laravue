import axios from 'axios'
export default {
    async getTree({ commit }: { commit: Function }) {
        const response = await axios.get('/api/pages/')
        commit('setTree', response.data)
    },

    // async getList(context: { commit: (arg0: string, data: any) => void }) {
    //     const response = await axios.get('/api/children/')
    // },
}
