import Page from 'a-ts@/pages/Page.vue'
import Page404 from 'a-ts@/pages/Page404.vue'


const routes = [
    { path: '/:id(\\d+)?', component: Page },
    { path: '/:pathMatch(.*)*', component: Page404 },
]

export default routes
