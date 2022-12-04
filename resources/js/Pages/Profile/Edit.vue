<template>
    <Head title="Profile"/>
    <AuthLayout>
        <div class="flex-col w-full">
            <transition name="fade-in-to-right">
                <div v-if="show" class="text-white profile">
                    <h3 class="level__title">Текущий уровень: <span :class="level.color">{{ level.title }}</span></h3>
                    <h3 class="level__title">Количество решенных стихов: <span :class="level.color">{{ poems }}</span>
                    </h3>
                </div>
            </transition>
            <transition name="fade-in-to-up">
                <div class="py-12" v-if="show">
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
            </transition>
        </div>
    </AuthLayout>
</template>

<script>
import AuthLayout from "@/Layouts/AuthLayout.vue";
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import {Head, Link} from '@inertiajs/inertia-vue3';

export default {
    name: "HomeComponent",
    components: {
        Link, AuthLayout, DeleteUserForm, UpdatePasswordForm, UpdateProfileInformationForm, Head,
    },
    data() {
        return {
            show: false,
        }
    },
    mounted() {
        this.show = true;
    },
    props: {
        mustVerifyEmail: 'Boolean',
        status: 'String',
        level: 'Object',
        poems: 'Number',
    }
}
</script>


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


/*animations*/

.fade-in-to-right-enter-active,
.fade-in-to-right-leave-active {
    transition: all 0.5s ease-out;
}

.fade-in-to-right-enter-from,
.fade-in-to-right-leave-to {
    transform: translateX(-100px);
    opacity: 0;
}

.fade-in-to-up-enter-active,
.fade-in-to-up-leave-active {
    transition: all 0.5s ease-out;
}

.fade-in-to-up-enter-from,
.fade-in-to-up-leave-to {
    transform: translateY(100px);
    opacity: 0;
}


/*animations*/


@media screen and (max-width: 768px) {
    .level__title {
        font-size: 18px;
    }
}
</style>
