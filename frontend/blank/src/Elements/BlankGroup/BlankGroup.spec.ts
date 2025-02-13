import { describe, it, expect } from 'vitest'

import { mount } from '@vue/test-utils'
import BlankGroup from './BlankGroup.vue'

describe('BlankGroup', () => {
   it('renders a default stack', () => {
      const wrapper = mount(BlankGroup, {
         props: {
            stack: true,
            cluster: false,
            gap: 'xsmall',
            inline: 'start',
            block: 'start',
            wrap: false,
         },
      })
      expect(wrapper.classes()).toContain('blank-group')
      expect(wrapper.classes()).toContain('stack')
   })

   it('renders the main slot', () => {
      const wrapper = mount(BlankGroup, {
         props: {
            stack: true,
            cluster: false,
            gap: 'xsmall',
            inline: 'start',
            block: 'start',
            wrap: false,
         },
         slots: {
            default: 'Main Content',
         },
      })

      expect(wrapper.html()).toContain('Main Content')
   })

   it('renders a cluster', () => {
      const wrapper = mount(BlankGroup, {
         props: {
            stack: false,
            cluster: true,
            gap: 'xsmall',
            inline: 'start',
            block: 'start',
            wrap: false,
         },
      })
      expect(wrapper.classes()).toContain('blank-group')
      expect(wrapper.classes()).toContain('cluster')
      expect(wrapper.classes()).not.toContain('stack')
   })
})
