<script setup>
import {router, useForm} from "@inertiajs/vue3";

const props = defineProps({
    customer: Object,
    errors: Object,
});

const form = useForm({
    name: props.customer.name,
    email: props.customer.email,
    phone: props.customer.phone,
});

function update(id)
{
    router.put(`/customers/${id}`, form);
}

</script>

<template>
    <div class="card col-6 offset-3">
        <div class="card-header">
            Edit A New Customer
        </div>
        <div class="card-body">
            <form @submit.prevent="update(props.customer.id)">
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
                    <input v-model="form.phone" type="tel" class="form-control" id="phone">
                    <div class="text-danger" v-if="errors.phone"> {{ errors.phone }}</div>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</template>
