import axios from 'axios'
export default {
    async getPage({ commit }: { commit: Function }, id: string) {
        const response = await axios.get('/api/pages/' + id)
        commit('setPage', {id, data: response.data})
    },

    // async delete({commit}: {commit: Function}, id: string) {
    //     axios.delete('/api/pages/' + id).then(resp => {
    //
    //     })
    // }
}
