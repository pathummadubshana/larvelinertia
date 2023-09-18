<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

const props =defineProps({
    students:Array
})
</script>

<template>
    <Head title="student" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                student
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <Link
                    href="/student/register"
                    class="px-4 py2 bg-indigo-600 text-white rounded"
                    >Register</Link
                >
                <table class="border-collapse border border-slate-500 ...">
                    <thead>
                        <tr>
                            <th class="border border-slate-600 ...">ID</th>
                            <th class="border border-slate-600 ...">
                                Student Name
                            </th>
                            <th class="border border-slate-600 ...">Image</th>
                            <th class="border border-slate-600 ...">Age</th>
                            <th class="border border-slate-600 ...">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="student in students" :key="students.id">
                            <td class="border border-slate-700 ...">
                                {{ student.id }}
                            </td>
                            <td class="border border-slate-700 ...">
                                {{ student.name }}
                            </td>
                            <td class="border border-slate-700 ...">
                                {{ student.image }}
                            </td>
                            <td class="border border-slate-700 ...">
                                {{ student.status }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div>
                    <Link
                    href="/student/${students.id}/edit"
                    class="px-4 py2 bg-indigo-600 text-white rounded"
                    >Edit</Link
                >
                </div>
                <div>
                    <Link
                    href="/student/${students.id}/edit"
                    method="delete" as="button" type="button"
                    class="px-4 py2 bg-red-600 text-white rounded"
                    >Delete</Link
                >
                </div>
                
            </div>
        </div>
    </AuthenticatedLayout>
</template>
