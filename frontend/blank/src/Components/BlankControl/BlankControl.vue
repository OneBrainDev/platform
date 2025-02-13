<script setup lang="ts">
import { BlankGroup } from '@/Elements/BlankGroup'
import { type ControlProps } from './types'

const { label, stack = true, cluster = false, error, note } = defineProps<ControlProps>()
</script>

<template>
    <label class="blank-control">
        <blank-group :stack="stack" :cluster="cluster">
            <span> {{ label }} </span>
            <slot></slot>
            <div class="error" v-if="error">{{ error }}</div>
            <div class="note" v-if="note">{{ note }}</div>
        </blank-group>
    </label>
</template>

<style scoped>
@layer component {
}
</style>
