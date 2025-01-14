import { describe, it, expect } from 'vitest'

import { mount } from '@vue/test-utils'
import DsGroup from './DsGroup.vue'

describe('DSGroup', () => {
   it('renders a default stack', () => {
      const wrapper = mount(DsGroup, {})
      expect(wrapper.classes()).toContain('ds-group')
      expect(wrapper.classes()).toContain('stack')
   })

   it('renders a cluster', () => {
      const wrapper = mount(DsGroup, {
         props: {
            type: 'cluster'
         }
      })
      expect(wrapper.classes()).toContain('ds-group')
      expect(wrapper.classes()).toContain('cluster')
      expect(wrapper.classes()).not.toContain('stack')
   })
})
