import {applyToListByParent} from './helpers'

export default {
    setTree(state: any, data: {}) {

        console.log(data)

        state.tree = data
    },

    setEnabled(state: any, value: boolean) {
        state.enabled = value
    },

    moveItem(state: any, payload: {
        oldParent: string,
        oldIndex: number,
        parent: string,
        index: number,
    }) {
        const {oldParent, oldIndex, parent, index} = payload
        console.log(payload)

        // remove oldIndex, oldParent and get item returned
        let movedItem = applyToListByParent(state.tree, oldParent, (list: []) => {
            return list.splice(oldIndex, 1)
        })

        // insert item to parent, index,
        applyToListByParent(state.tree, parent, (list: []) => {
            console.log(parent)
            console.log(list)
            //@ts-ignore
            list.splice(index, 0, {...movedItem[0]})
        })

    },
}
