import axios from 'axios'
export default {
    async getTree (context: { commit: (arg0: string, data: any) => void }) {
        const response = await axios.get('/api/pages/')
        context.commit('setTree', response.data)
    },
}
