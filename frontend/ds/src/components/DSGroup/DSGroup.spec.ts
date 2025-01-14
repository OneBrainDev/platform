import { describe, it, expect } from 'vitest'

import { mount } from '@vue/test-utils'
import DsGroup from './DsGroup.vue'

describe('DSGroup', () => {
   it('renders a default stack', () => {
      const wrapper = mount(DsGroup, {
         props: {
            type: 'stack',
            gap: 'xsmall',
            inline: 'start',
            block: 'start',
            wrap: false,
         }
      })
      expect(wrapper.classes()).toContain('ds-group')
      expect(wrapper.classes()).toContain('stack')
   })

   it('renders the main slot', () => {
      const wrapper = mount(DsGroup, {
         props: {
            type: 'stack',
            gap: 'xsmall',
            inline: 'start',
            block: 'start',
            wrap: false,
         },
         slots: {
            default: "Main Content"
         }
      })

      expect(wrapper.html()).toContain('Main Content')
   })

   it('renders a cluster', () => {
      const wrapper = mount(DsGroup, {
         props: {
            type: 'cluster',
            gap: 'xsmall',
            inline: 'start',
            block: 'start',
            wrap: false,
         }
      })
      expect(wrapper.classes()).toContain('ds-group')
      expect(wrapper.classes()).toContain('cluster')
      expect(wrapper.classes()).not.toContain('stack')
   })
})
