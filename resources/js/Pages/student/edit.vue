<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link,useForm } from "@inertiajs/vue3";
import { Inertia } from "@inertiajs/vue3";

const form = useForm({
  name: props.student.name,
  image: null,
  age: null,
  status: null,
})

const props =defineProps({
    student:Object,
    image:String,
    age:String,
    status:String
});

function update() {
    Inertia.post('/student/${props.student.id}',{
        _methode:'put',
        name:form.name,
        image:form.image,
        age:form.age,
        status:form.status
    })
}
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
                <h2>Student Registation</h2>
                <div>
                    <Link
                        href="/student/index"
                        class="px-4 py2 bg-indigo-600 text-white rounded"
                        >Back</Link
                    >
                </div>
                <div>
                    <form @submit.prevent="update">
                    <div class="form-group">
                        <label for="name" >Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            v-model="form.name"
                            placeholder="Name"
                        />
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input
                            type="text"
                            class="form-control"
                            id="age"
                            v-model="form.age"
                            placeholder="age"
                        />
                    </div>
                    <div class="form-group">
                        <label for="statu">Status</label>
                        <input
                            type="text"
                            class="form-control"
                            id="status"
                            v-model="form.status"
                            placeholder="status"
                        />
                    </div>
                    <div class="form-group">
                        <label for="image">image</label>
                        <input type="file" @input="form.image = $event.target.files[0]" id="image"  />
                        
                    </div>
                    
                    <Link href="/student/index" as="button" class="px-4 py2 bg-indigo-600 text-white rounded">update</Link>
                </form>
                </div>
                
            </div>
        </div>
    </AuthenticatedLayout>
</template>
