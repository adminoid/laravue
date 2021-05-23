import axios from 'axios'
import _ from 'lodash'
export default {
    async getTree({ commit }: { commit: Function }) {
        const response = await axios.get('/api/pages/')
        commit('setTree', response.data)
    },

    async move({commit}: {commit: Function}, payload: object) {
        // console.log(payload)
        // try {
            const response = await axios.post('/api/pages/move/',
                _.pick(payload, ['id', 'index', 'parent'])
            )
            console.info(response)
        return response
        // } catch (e) {
        //     console.warn(e)
        // }
    }

    // async getList(context: { commit: (arg0: string, data: any) => void }) {
    //     const response = await axios.get('/api/children/')
    // },
}
