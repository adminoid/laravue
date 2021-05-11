import { createStore } from 'vuex'
import layout from "./modules/layout"
import tree from "./modules/tree"

export default createStore({
    modules: {
        layout,
        tree,
    }
})
