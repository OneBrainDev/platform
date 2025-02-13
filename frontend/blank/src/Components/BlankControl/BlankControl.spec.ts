import { describe, it, expect } from 'vitest'

import { mount } from '@vue/test-utils'
import BlankControl from './BlankControl.vue'

describe('BlankControl', () => {
   it('renders a default stack', () => {
      const wrapper = mount(BlankControl, {
         props: {},
      })
      expect(wrapper.classes()).toContain('blank-group')
      expect(wrapper.classes()).toContain('stack')
   })
})
