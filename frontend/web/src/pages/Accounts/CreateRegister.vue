<script setup lang="ts">
import { DsGroup, DsInput } from '@platform/blank'
</script>

<template>
    <ds-group>
        <ds-input type="email" label="Enter email address:" error="Error Message Here" />
        <ds-input type="password" label="Enter your password dawg" />

        <button type="submit">Hello there</button>
    </ds-group>
</template>

<style scoped></style>
