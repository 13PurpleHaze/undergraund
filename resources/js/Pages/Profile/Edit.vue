<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import MainLayout from "@/Layouts/MainLayout.vue";
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import {Head} from '@inertiajs/inertia-vue3';

defineProps({
    mustVerifyEmail: Boolean,
    status: String,
    level: Object,
});
</script>


<template>
    <Head title="Profile"/>
    <MainLayout>
        <div class="flex-col w-full">
            <div class="text-white profile">
                <h3 class="level__title">Текущий уровень: <span :class="level.color">{{ level.title }}</span></h3>
            </div>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <h3 class="level__title">Редактировать профиль</h3>
                    <div class="p-4 sm:p-8 shadow sm:rounded-lg">
                        <UpdateProfileInformationForm
                            :must-verify-email="mustVerifyEmail"
                            :status="status"
                            class="max-w-xl"
                        />
                    </div>
                    <div class="p-4 sm:p-8 shadow sm:rounded-lg">
                        <UpdatePasswordForm class="max-w-xl"/>
                    </div>

                    <div class="p-4 sm:p-8 shadow sm:rounded-lg">
                        <DeleteUserForm class="max-w-xl"/>
                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>

<style scoped>
.level__title {
    font-family: Franklin;
    color: #fff;
    font-size: 24px;
}

.level__title .green {
    font-family: Candara;
    color: #00b8a3;
}

.level__title .yellow {
    font-family: Candara;
    color: #FFCC00;
}

.level__title .red {
    font-family: Candara;
    color: #FF375F;
}

.profile {
    border-bottom: 3px solid #FFCC00;
}
</style>
