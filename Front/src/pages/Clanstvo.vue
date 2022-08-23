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
          :rows="clanstva"
          class="shadow-1"
          :loading = loading
        >
          <!-- <template v-slot:body-cell-action="props">
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
           -->
          <template #loading>
            <q-inner-loading showing color="black" />
          </template>
        </q-table>
        <!-- <q-dialog v-model="dodaj">
            <dodaj-korisnika></dodaj-korisnika>
        </q-dialog> -->
      </q-card-section>
    </q-card>
    <div> {{clanstva}}</div>
  </q-page>
</template>

<script>

import {ref, onMounted} from 'vue';
import axios from 'axios';
// import DodajKorisnika from 'src/components/Korisnik/DodajKorisnika.vue';

export default {
//   components: { DodajKorisnika },
  name: 'Clanstvo',
  setup() {

    const dodaj= ref(null);
    const columns = [
            { name: "type", label: "Tip", field: "type", align: "left" },
            { name: "action", label: "Akcije", align: "center", field: "action" }
        ];

    let clanstva = [
        {
            type: 'mjesecno'
        }
    ];

    let loading = false;

    const getTest = function() {
        loading = true;
        axios.get('http://localhost:8000/api/membership')
            .then(resp => {
                clanstva = resp.data;
            }).catch(err => {
                console.log(err);
            })
            loading = false;
    }
    
    onMounted(() => {
        getTest();
    })

    return {
        dodaj,
        columns,
        clanstva,
        loading
    }
  }
}
</script>