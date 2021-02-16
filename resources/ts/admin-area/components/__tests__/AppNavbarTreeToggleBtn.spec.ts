import { shallowMount } from '@vue/test-utils'
import AppNavbarTreeToggleBtn from '../AppNavbarTreeToggleBtn.vue'

describe('AppNavbarTreeToggleBtn.vue', () => {
    it('test img src plus/minus', async () => {
        const wrapper = shallowMount(AppNavbarTreeToggleBtn)
        const button = wrapper.find('.btn-outline-success')

        let image = wrapper.find('img.toggle')
        let src = image.attributes('src')
        let file = src.substring(src.lastIndexOf('/')+1)

        expect(file).toMatch(/plus/);

        await button.trigger('click')

        src = image.attributes('src')
        file = src.substring(src.lastIndexOf('/')+1)

        expect(file).toMatch(/minus/);

    })
})
