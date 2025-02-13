<script setup lang="ts">
import { BlankControl } from '@/Components/BlankControl'
import { TextProps } from './types'
import { computed } from 'vue'

const { label, error, note } = defineProps<TextProps>()

const hasErrorClass = computed(() => {
    return error ? 'has-error' : ''
})
</script>

<template>
    <blank-control :label :error :note :class="hasErrorClass" stack>
        <input v-bind="$attrs" />
    </blank-control>
</template>

<style scoped>
@layer component {
}
</style>
