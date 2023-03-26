<script setup>
import { ref } from "vue";
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { watch } from "vue";
import Pagination from "@/Components/Pagination.vue";

const props = defineProps({
    albums: {
        type: Object,
        default: () => ({}),
    },
    filters: {
        type: Object,
        default: () => ({}),
    },
});

let search = ref(props.filters.search);
watch(search, (value) => {
    Inertia.get(
        "/albums",
        { search: value },
        {
            preserveState: true,
            replace: true,
        }
    );
});
</script>

<template>
    <Head title="Albums" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Image Gallery:Albums
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-2">
                            <input
                                type="text"
                                v-model="search"
                                placeholder="Search..."
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 p-2.5"
                            />
                        </div>
                        <div
                            class="relative overflow-x-auto shadow-md sm:rounded-lg"
                        >
                            <table
                                class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
                            >
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                                >
                                    <tr>
                                        <th scope="col" class="px-6 py-3">#</th>
                                        <th scope="col" class="px-6 py-3">
                                            Object
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            City
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="album in albums.data"
                                        :key="album.id"
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                                    >
                                        <th
                                            scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap"
                                        >
                                            {{ album.id }}
                                        </th>
                                        <th
                                            scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap"
                                        >
                                            {{ album.object }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ album.city }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

       <div class="container">
    
        <div class="starter-template">
      
        <div class="row">
            <tbody>
             <tr
            v-for="album in albums.data"
            :key="album.id"
            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            {{ album.id }}
            <th
            scope="row"
             class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap" >
             {{ album.id }}
              </th>
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
              <div class="col-lg-3">
              <div class="thumbnail" style="min-height: 514px;">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
              {{ album.object }}
              </th>
               <td class="px-6 py-4">
               {{ album.city }}
                </td>
                <img alt="{{$album-title}}" src="/albums/{{$album->}}">
                <div class="caption">
                <p>{{$album->description}}</p>
                </div>
              </div>
            </div>
        </div>
      </div>
<Pagination :data="albums" />
</div>
</div>
</div>
</div>
</BreezeAuthenticatedLayout>
</template>
