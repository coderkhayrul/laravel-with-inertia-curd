<script setup>
import {router, useForm} from "@inertiajs/vue3";

defineProps({
    errors: Object,
});

const form = useForm({
    name: '',
    email: '',
    phone: '',
});
function submit() {
    router.post('/customers', form);
}
</script>

<template>
    <div class="card col-6 offset-3">
        <div class="card-header">
            Create A New Customer
        </div>
        <div class="card-body">
            <form @submit.prevent="submit">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" v-model="form.name" class="form-control" id="name" >
                    <div class="text-danger" v-if="errors.name"> {{ errors.name }}</div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input v-model="form.email" type="email" class="form-control" id="email">
                    <div class="text-danger" v-if="errors.email"> {{ errors.email }}</div>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input v-model="form.phone" type="number" class="form-control" id="phone">
                    <div class="text-danger" v-if="errors.phone"> {{ errors.phone }}</div>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</template>
