import axios from 'axios'
import VuexORM from '@vuex-orm/core'
import VuexORMAxios from '@vuex-orm/plugin-axios'
import DasboardUpdated from '~/models/dashboard-updated.js'

VuexORM.use(VuexORMAxios, { axios })

// Create a new database instance.
const database = new VuexORM.Database()

// Register Models to the database.
database.register(DasboardUpdated)

export const plugins = [
  VuexORM.install(database)
]

export const state = () => ({
  loading: false,
  inviteDiscord: 'https://discord.gg/5xa3EXp'
})

export const mutations = {
  loading (state, value) {
    state.wait = value || false
  }
}
