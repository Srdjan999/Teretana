<template>
    <q-card class="my-card" style="width: 25%">
        <q-toolbar class="bg-primary text-white">
            <q-toolbar-title> Dodaj korisnika </q-toolbar-title>
            <q-btn icon="close" round flat v-close-popup></q-btn>
        </q-toolbar>
        <q-card-section>
        <div class="col-20">
            <q-form @submit.prevent.stop="save()" ref="addForm">
                <q-input
                    outlined
                    label="Ime"
                    v-model="korisnik.name"
                    :rules="rules"
                    clearable
                />
                <q-input
                    outlined
                    label="Prezime"
                    v-model="korisnik.surname"
                    :rules="rules"
                    clearable
                />
                <q-input
                    outlined
                    label="Clanarina"
                    v-model="korisnik.membership"
                    :rules="rules"
                    clearable
                />
                <q-input
                    outlined
                    label="Datum rodjenja"
                    v-model="korisnik.birthday"
                    :rules="rules"
                    clearable
                >
                    <template v-slot:append>
                    <q-icon name="event" color="primary" class="cursor-pointer">
                        <q-popup-proxy
                        ref="qDateProxy"
                        cover
                        transition-show="scale"
                        transition-hide="scale"
                        >
                        <q-date v-model="korisnik.birthday" mask="DD-MM-YYYY" title="Datum rodjenja">
                            <div class="row items-center justify-end">
                            <q-btn v-close-popup label="Close" color="primary" flat />
                            </div>
                        </q-date>
                        </q-popup-proxy>
                    </q-icon>
                    </template>
                </q-input>
                <q-btn
                    label="Sacuvaj"
                    @click="save()"
                    icon="save"
                    color="primary"
                    class="full-width"
                />
            </q-form>
        </div>
        </q-card-section>
    </q-card>
</template>

<script>

import { ref } from 'vue';

export default {
    setup() {

        const addForm = ref(null);
        const rules = [(val) => (val !== null && val !== "") || ""];

        const korisnik = {
            name: null,
            surname: null,
            membership: null,
            birthday: null
        };

        const save = function() {
            console.log("Cuvanje korisnika");
        }

        return {
            addForm,
            rules,
            korisnik,
            save
        }
    },
}
</script>