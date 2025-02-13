import { describe, it, expect } from 'vitest'

import { mount } from '@vue/test-utils'
import BlankText from './BlankText.vue'

describe('BlankText', () => {
   it('renders a default stack', () => {
      const wrapper = mount(BlankText, {
         props: {},
      })
      expect(wrapper.classes()).toContain('blank-group')
      expect(wrapper.classes()).toContain('stack')
   })
})
