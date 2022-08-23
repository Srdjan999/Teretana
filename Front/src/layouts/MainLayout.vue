<template>
  <q-layout view="lHh Lpr lFf">
    <q-header elevated>
      <q-toolbar>
        <q-btn
          flat
          dense
          round
          icon="menu"
          aria-label="Menu"
          @click="leftDrawerOpen = !leftDrawerOpen"
        />

        <q-toolbar-title>
          Teretana
        </q-toolbar-title>

      </q-toolbar>
    </q-header>

    <q-drawer
      v-model="leftDrawerOpen"
      show-if-above
      bordered
      content-class="bg-grey-1"
    >
      <q-list>
        <q-item-label
          header
          class="text-grey-8"
        >
          Meni
        </q-item-label>
        <q-item :to="{ name: 'Korisnik'}" clickable v-ripple>
          <q-item-section avatar>
            <q-icon name="person" color="black"/>
          </q-item-section>
          <q-item-section>Korisnik</q-item-section>
        </q-item>
        <q-item :to="{ name: 'Clanstvo'}" clickable v-ripple>
          <q-item-section avatar>
            <q-icon name="local_activity" color="black"/>
          </q-item-section>
          <q-item-section>Clanstvo</q-item-section>
        </q-item>
        <q-item :to="{ name: 'Sala'}" clickable v-ripple>
          <q-item-section avatar>
            <q-icon name="stadium" color="black"/>
          </q-item-section>
          <q-item-section>Sala</q-item-section>
        </q-item>
      </q-list>
    </q-drawer>

    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script>
// import EssentialLink from 'components/EssentialLink.vue'



export default {
  name: 'MainLayout',
  data () {
    return {
      leftDrawerOpen: false
    }
  }
}
</script>
