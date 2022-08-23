<template>
  <q-page padding style="min-height: 0px">
    <q-card class="bg-grey-1">
        <q-toolbar>
            <q-btn
            label="Dodaj"
            icon="add"
            color="primary"
            @click="dodaj=true"
            />
      </q-toolbar>
      <q-card-section>
        <q-table
          color="primary"
          :columns="columns"
          :rows="korisnici"
          class="shadow-1"
        >
          <template v-slot:body-cell-action="props">
            <q-td :props="props">
              <q-btn
                color="primary"
                icon="edit"
                no-caps
                flat
                dense
              />
              <q-btn
                color="negative"
                icon="delete"
                no-caps
                flat
                dense
              />
            </q-td>
          </template>
          <template v-slot:header-cell-birthday="props">
            <q-th :props="props">
              <q-icon name="event" size="1.5em" />
              {{ props.col.label }}
            </q-th>
          </template>
          <template #loading>
            <q-inner-loading showing color="black" />
          </template>
        </q-table>
        <q-dialog v-model="dodaj">
            <dodaj-korisnika></dodaj-korisnika>
        </q-dialog>
      </q-card-section>
    </q-card>
  </q-page>
</template>

<script>

import {ref, onMounted} from 'vue';
import axios from 'axios';
import DodajKorisnika from 'src/components/Korisnik/DodajKorisnika.vue';

export default {
  components: { DodajKorisnika },
  name: 'Korisnik',
  setup() {

    const dodaj= ref(null);
    const columns = [
            { name: "name", label: "Ime", field: "name", align: "left" },
            { name: "surname", label: "Prezime", field: "surname", align: "left" },
            { name: "birthday", label: "Datum rodjenja", field: "birthday", align: "left" },
            { name: "channel", label: "Clanarina", field: "channel", align: "left" },
            { name: "action", label: "Akcije", align: "center", field: "action" }
        ];

    const korisnici = [

    ];

    const getTest = function() {
      axios.get('http://localhost:8000/api/membership')
        .then(resp => {
          console.log(resp);
        }).catch(err => {
          console.log(err);
        })
    }

  onMounted(() => {
      console.log("TEST")
      getTest();
    })
    return {
        dodaj,
        columns,
        korisnici
    }
  }
}
</script>