import { mount } from '@vue/test-utils'
import AppNavbarTreeToggleBtn from 'a-cmp@/AppNavbarTreeToggleBtn.vue'
// @ts-ignore
import store from 'a-ts@/store'

describe('AppNavbarTreeToggleBtn.vue', () => {
    it('test img src plus/minus', async () => {

        const wrapper = mount(AppNavbarTreeToggleBtn, {
            global: {
                plugins: [store]
            }
        })

        const button = wrapper.find('.btn-outline-success')

        let image = wrapper.find('img.toggle')
        let src = image.attributes('src')
        let file = src.substring(src.lastIndexOf('/')+1)

        expect(file).toMatch(/minus/);

        await button.trigger('click')

        src = image.attributes('src')
        file = src.substring(src.lastIndexOf('/')+1)

        expect(file).toMatch(/plus/);

    })
})
