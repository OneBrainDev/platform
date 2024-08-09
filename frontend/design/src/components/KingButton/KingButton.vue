<script setup lang="ts">
  import type { ButtonType } from './types'
  import { computed } from 'vue'

  defineOptions({
    inheritAttrs: false,
  })

  const props = withDefaults(defineProps<ButtonType>(), {
    size: 'medium',
    theme: 'light',
    variant: 'primary',
    full: false,
  })

  const getThemeClass = computed(() => {
    return `${props.theme}`
  })

  const getWidthClass = computed(() => {
    return props.full ? 'full-width' : 'max-content'
  })

  const getVariantClass = computed(() => {
    return `variant-${props.variant}`
  })

  const getSizeClass = computed(() => {
    return `size-${props.size}`
  })
</script>

<template>
  <button :class="`button ${getThemeClass} ${getVariantClass} ${getSizeClass} ${getWidthClass}`" v-bind="$attrs">
    <slot></slot>
  </button>
</template>

<style scoped>
  @layer components {
    .button {
      align-items: center;
      border-radius: var(--size-40);
      border-style: solid;
      border-width: var(--size-1);
      cursor: pointer;
      display: inline-flex;
      justify-content: center;
      margin: 0;
      min-width: min-content;
      overflow: hidden;
      place-items: center;
      position: relative;

      @layer themes.typography {
        text-align: center;
        text-decoration: none;
        font-family: var(--font-family-filson);
        line-height: va(--size-16);
      }
      @layer themes.color {
        &.dark {
          --button-primary--background: var(--dark-button-primary--background);
          --button-primary--content: var(--dark-button-primary--content);
          --button-secondary--background: var(--dark-button-secondary--background);
          --button-secondary--content: var(--dark-button-secondary--content);
          --button-outline--background: var(--dark-button-outline--background);
          --button-outline--content: var(--dark-button-outline--content);
          --button-disabled--background: var(--dark-button-disabled--background);
          --button-disabled--content: var(--dark-button-disabled--content);
        }

        &.light {
          --button-primary--background: var(--light-button-primary--background);
          --button-primary--content: var(--light-button-primary--content);
          --button-secondary--background: var(--light-button-secondary--background);
          --button-secondary--content: var(--light-button-secondary--content);
          --button-outline--background: var(--light-button-outline--background);
          --button-outline--content: var(--light-button-outline--content);
          --button-disabled--background: var(--light-button-disabled--background);
          --button-disabled--content: var(--light-button-disabled--content);
        }
      }

      &.size-small {
        padding: var(--size-8) var(--size-12);

        @layer themes.typography {
          font-size: var(--size-14);
        }
      }

      &.size-medium {
        padding: var(--size-12) var(--size-16);

        @layer themes.typography {
          font-size: var(--size-16);
        }
      }

      &.size-large {
        padding: var(--size-15) var(--size-20);

        @layer themes.typography {
          font-size: var(--size-18);
          font-weight: 700;
        }
      }

      &.full-width {
        width: 100%;
      }

      &.max-content {
        width: max-content;
      }

      &.variant-primary {
        @layer themes.color {
          background-color: var(--button-primary--background);
          border-color: var(--button-primary--background);
          color: var(--button-primary--content);
        }
      }

      &.variant-secondary {
        @layer themes.color {
          background-color: var(--button-secondary--background);
          border-color: var(--button-secondary--background);
          color: var(--button-secondary--content);
        }
      }

      &.variant-outline {
        @layer themes.color {
          background-color: transparent;
          border-color: var(--button-outline--background);
          color: var(--button-outline--content);
        }
      }

      &.variant-text-only {
        border: 0;

        @layer themes.color {
          background-color: transparent;
          color: var(--button-primary--background);
        }
      }

      &.variant-circular {
        border-radius: 50%;
        padding: var(--size-8);
        width: max-content;
        height: max-content;

        @layer themes.color {
          background-color: var(--button-secondary--background);
          border-color: var(--button-secondary--background);
          color: var(--button-secondary--content);
        }
      }

      &.variant-circular-primary {
        border-radius: 50%;
        padding: var(--size-8);
        width: auto;
        height: min-content;

        @layer themes.color {
          background-color: var(--button-primary--background);
          border-color: var(--button-primary--background);
          color: var(--button-primary--content);
        }
      }
    }
  }
</style>
