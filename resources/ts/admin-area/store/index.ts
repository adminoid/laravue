import { createStore } from 'vuex'
import layout from "./modules/layout"
import tree from "./modules/tree"
import page from "./modules/page"

export default createStore({
    modules: {
        layout,
        tree,
        page,
    }
})
