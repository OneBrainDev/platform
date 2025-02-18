import { describe, it, expect } from 'vitest'

import { mount } from '@vue/test-utils'
import BlankText from './BlankText.vue'

describe('BlankText', () => {
   it('renders properly with label', () => {
      const wrapper = mount(BlankText, {
         props: {
            label: 'Test Label',
         },
      })

      expect(wrapper.findComponent({ name: 'blank-control' }).exists()).toBe(true)
      expect(wrapper.findComponent({ name: 'blank-control' }).props('label')).toBe('Test Label')
   })

   it('renders input element', () => {
      const wrapper = mount(BlankText)
      expect(wrapper.find('input').exists()).toBe(true)
   })

   it('adds error class when error prop is provided', () => {
      const wrapper = mount(BlankText, {
         props: {
            error: 'Error message',
         },
      })

      expect(wrapper.findComponent({ name: 'blank-control' }).classes()).toContain('has-error')
   })

   it('does not add error class when no error prop', () => {
      const wrapper = mount(BlankText)
      expect(wrapper.findComponent({ name: 'blank-control' }).classes()).not.toContain('has-error')
   })

   it('passes note prop to blank-control', () => {
      const wrapper = mount(BlankText, {
         props: {
            note: 'Helper text',
         },
      })

      expect(wrapper.findComponent({ name: 'blank-control' }).props('note')).toBe('Helper text')
   })

   it('forwards attributes to input element', () => {
      const wrapper = mount(BlankText, {
         attrs: {
            placeholder: 'Enter text',
            type: 'email',
         },
      })

      const input = wrapper.find('input')
      expect(input.attributes('placeholder')).toBe('Enter text')
      expect(input.attributes('type')).toBe('email')
   })
})
