<script setup lang="ts">
import { useForm } from '@inertiajs/vue3'
import { BlankGroup, BlankText } from '@platform/blank'

const form = useForm({
    email: null,
    password: null,
    password_check: null,
})
</script>

<template>
    <form @submit.prevent="form.post(route('accounts.store'))">
        <blank-group stack>
            <blank-text type="email" label="Email Address" v-model="form.email" />
            <blank-text type="password" label="Password" v-model="form.password" />
            <blank-text
                type="password"
                label="Enter Password Again"
                v-model="form.password_check"
            />
            <button>Log In</button>
        </blank-group>
    </form>
</template>

<style scoped></style>
