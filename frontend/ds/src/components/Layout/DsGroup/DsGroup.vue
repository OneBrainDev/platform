<script setup lang="ts">
import { computed } from 'vue'
import { GroupProps } from '.'

const {
    type = 'stack',
    gap = 'xsmall',
    inline = 'start',
    block = 'start',
    wrap = false,
} = defineProps<GroupProps>()

const wrapper = computed(() => {
    return wrap ? 'wrapper' : ''
})
</script>

<template>
    <div :class="`ds-group ${type} inline-${inline} block-${block} gap-${gap} ${wrapper}`">
        <slot></slot>
    </div>
</template>

<style scoped>
@layer component {
    .ds-group {
        &.stack {
            display: flex;
            flex-direction: column;
            gap: var(--size-4);
            width: 100%;

            &.inline-start {
                align-items: flex-start;
            }
            &.inline-middle {
                align-items: center;
            }
            &.inline-end {
                align-items: flex-end;
            }

            &.block-start {
                justify-content: flex-start;
            }
            &.block-around {
                justify-content: space-around;
            }
            &.block-even {
                justify-content: space-evenly;
            }
            &.block-between {
                justify-content: space-between;
            }
            &.block-middle {
                justify-content: center;
            }
            &.block-end {
                justify-content: flex-end;
            }
        }

        &.cluster {
            display: flex;
            flex-wrap: nowrap;
            gap: var(--size-4);
            justify-content: flex-start;
            white-space: nowrap;
            width: 100%;

            &.inline-start {
                justify-content: flex-start;
            }
            &.inline-middle {
                justify-content: center;
            }
            &.inline-end {
                justify-content: flex-end;
            }
            &.inline-around {
                justify-content: space-around;
            }
            &.inline-between {
                justify-content: space-between;
            }

            &.block-start {
                align-items: flex-start;
            }
            &.block-middle {
                align-items: center;
            }
            &.block-end {
                align-items: flex-end;
            }
            &.block-full {
                align-items: stretch;
                height: 100%;
            }
            &.block-baseline {
                align-items: stretch;
                height: 100%;
            }
        }

        &.gap-none {
            gap: 0;
        }
        &.gap-xsmall {
            gap: var(--size-8);
        }
        &.gap-small {
            gap: var(--size-10);
        }
        &.gap-medium {
            gap: var(--size-14);
        }
        &.gap-large {
            gap: var(--size-16);
        }
        &.gap-xlarge {
            gap: var(--size-20);
        }
    }
}
</style>
