// import VuexORM from '@vuex-orm/core'
// import MainMenu from '~/models/mainmenu'
// import Post from './Post'

// Create a new database instance.
// const database = new VuexORM.Database()

// Register Models to the database.
// database.register(MainMenu)

export const plugins = [
  // VuexORM.install(database)
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
