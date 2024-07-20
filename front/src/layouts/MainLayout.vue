<template>
  <q-layout view="lhh Lpr lFf" class="bg-grey-2">
    <q-header
      style="border-radius:  0 0 0 20px;"
    >
<!--      <q-toolbar>-->
<!--        <q-btn-->
<!--          flat-->
<!--          dense-->
<!--          round-->
<!--          icon="menu"-->
<!--          aria-label="Menu"-->
<!--          @click="toggleLeftDrawer"-->
<!--        />-->

<!--        <q-toolbar-title>-->
<!--          Quasar App-->
<!--        </q-toolbar-title>-->

<!--        <div>Quasar v{{ $q.version }}</div>-->
<!--      </q-toolbar>-->
      <div class="row">
        <div class="col-12 col-md-1"></div>
        <div class="col-12 col-md-10 row items-center">
          <q-avatar size="50px" class="q-ma-xs">
            <q-img src="logo.png"/>
          </q-avatar>
          <q-space/>
<!--          3 botone s megusta nuscar menu-->
          <q-btn-group flat >
            <q-btn
              flat
              round
              icon="fa-solid fa-heart"
              aria-label="Like"
            />
            <q-btn
              flat
              round
              icon="fa-solid fa-search"
              aria-label="Search"
            />
            <q-btn
              flat
              round
              icon="menu"
              aria-label="Menu"
              @click="toggleLeftDrawer"
            />
          </q-btn-group>
        </div>
        <div class="col-12 col-md-1"></div>
      </div>
    </q-header>

<!--    <q-drawer-->
<!--      v-model="leftDrawerOpen"-->
<!--      show-if-above-->
<!--      bordered-->
<!--    >-->
<!--      <q-list>-->
<!--        <q-item-label-->
<!--          header-->
<!--        >-->
<!--          Essential Links-->
<!--        </q-item-label>-->

<!--        <EssentialLink-->
<!--          v-for="link in linksList"-->
<!--          :key="link.title"-->
<!--          v-bind="link"-->
<!--        />-->
<!--      </q-list>-->
<!--    </q-drawer>-->

    <q-page-container>
      <div style="position: relative;">
        <div style="position: absolute;height: 40px;width: 100%" class="bg-primary">
          <div style="position: absolute; top: 0; left: 0; width: 100%; height: 40px; border-radius: 0 20px 0 0" class="bg-grey-2">
          </div>
        </div>
      </div>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script setup>
import { ref } from 'vue'
import EssentialLink from 'components/EssentialLink.vue'

defineOptions({
  name: 'MainLayout'
})

const linksList = [
  {
    title: 'Docs',
    caption: 'quasar.dev',
    icon: 'school',
    link: 'https://quasar.dev'
  },
  {
    title: 'Github',
    caption: 'github.com/quasarframework',
    icon: 'code',
    link: 'https://github.com/quasarframework'
  },
  {
    title: 'Discord Chat Channel',
    caption: 'chat.quasar.dev',
    icon: 'chat',
    link: 'https://chat.quasar.dev'
  },
  {
    title: 'Forum',
    caption: 'forum.quasar.dev',
    icon: 'record_voice_over',
    link: 'https://forum.quasar.dev'
  },
  {
    title: 'Twitter',
    caption: '@quasarframework',
    icon: 'rss_feed',
    link: 'https://twitter.quasar.dev'
  },
  {
    title: 'Facebook',
    caption: '@QuasarFramework',
    icon: 'public',
    link: 'https://facebook.quasar.dev'
  },
  {
    title: 'Quasar Awesome',
    caption: 'Community Quasar projects',
    icon: 'favorite',
    link: 'https://awesome.quasar.dev'
  }
]

const leftDrawerOpen = ref(false)

function toggleLeftDrawer () {
  leftDrawerOpen.value = !leftDrawerOpen.value
}
</script>
