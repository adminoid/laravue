import { mount } from '@vue/test-utils'
import App from '../App.vue'

describe('App.vue', () => {
    it('test message for_test', () => {
        const wrapper = mount(App)
        expect(wrapper.html().includes("Vue and TDD")).toBe(true)
    })
})
