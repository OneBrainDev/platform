import { describe, it, expect } from 'vitest'

import { mount } from '@vue/test-utils'
import DSGroup from './DSGroup.vue'

describe('DSGroup', () => {
   it('renders properly', () => {
      const wrapper = mount(DSGroup, {})
      // expect(wrapper.text()).toContain('Hello Vitest')
   })
})
