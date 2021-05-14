import Page from 'a-ts@/pages/Page.vue'
import NotFound from 'a-ts@/pages/NotFound.vue'


const routes = [
    { path: '/page/:id(\\d+)', component: Page },
    { path: '/:pathMatch(.*)*', component: NotFound },
]

export default routes
