import {applyToListByParent} from "./helpers"

export default {
    setTree(state: any, data: {}) {
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
        // remove oldIndex, oldParent and get item returned
        applyToListByParent(state.tree, oldParent, (list: []) => {
            let movedItem = list.splice(oldIndex, 1)[0]
            // insert item to parent, index,
            applyToListByParent(state.tree, parent, (list: []) => {
                let parentId = (parent == 'root') ? null : Number(parent)
                //@ts-ignore
                movedItem.parent_id = parentId
                //@ts-ignore
                list.splice(index, 0, movedItem)
                state.enabled = false
            })
        })
    },
}
